<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WorkController extends CI_Controller {
   
    public function __construct()
    {
	    parent::__construct();
	    $this->load->library('form_validation');
        $this->load->model(['ActivityModel']);
        $this->load->library('ion_auth');
        $this->load->helper('language');
        $this->lang->load('auth');

        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
    }
    
    public function index(){
        $data = array();
        $data['content']=$this->load->view('front-end/work/work',$data,true);
        $this->load->view('front-end/master', $data);
    } 


    public function assignments(){
        $data = array();
        $this_day = $this->db->query('select `date` from work_crews order by `date` desc limit 1')->row();


        $data['location']=$this->db->query('select column_id from work_crews where `date` >= date_sub(curdate(), interval 30 day) and column_id != "resources" and column_id != "unplaced" and column_id not in (select column_id from work_crews where `date`= "'.$this_day->date.'" group by column_id) group by column_id order by column_id asc')->result();

        $data['past_assignment']=$this->db->query('select `date` from work_crews where `date` <= date_sub(curdate(), interval 1 day) and `date` >= date_sub(curdate(), interval 180 day) and column_id != "unplaced" and column_id != "resources" group by `date` order by `date` desc')->result(); 
        
       
        
        $data['content']=$this->load->view('front-end/work/assignments',$data,true);
        $this->load->view('front-end/master', $data);
    }


    public function resources(){
        $data = array();
        $data['resources']=$this->db->order_by('id', 'desc')->get('work_resources')->result();
        $data['content']=$this->load->view('front-end/work/resources',$data,true);
        $this->load->view('front-end/master', $data);
    }

    public function create_resource(){
        $data=array();
        $data['resource_name']=$this->input->post('name', true);
        $data['resource_type']=$this->input->post('type', true);
        print_r($data);
        $this->db->insert('work_resources', $data);

        echo "success";
    }

    public function update_resource(){
        $data=array();
        $id=$this->input->post('id', true);

        $data['resource_name']=$this->input->post('name', true);
        $data['resource_type']=$this->input->post('type', true);
        $this->db->where('id', $id)->update('work_resources', $data);
        
        if($_FILES['userfile']){

            $config['upload_path']          = FCPATH . 'assets\images\resources';
            $config['allowed_types']        = '*';
            $config['max_size']             = 32000;
            $config['file_name']             = $id.".png";
            $this->load->library('upload', $config);
           
            if(file_exists('assets/images/resources/'.$id.'.png')){
                unlink('assets/images/resources/'.$id.'.png');
            }
            
            if ($this->upload->do_upload('userfile')){
                $upload = array('upload_data' => $this->upload->data());
                $img =  $upload['upload_data']['file_name'];
            }
        }
        
        $data = $this->db->where('id', $id)->get('work_resources')->row();
        
        echo json_encode(['data'=>$data]);
        //echo json_encode(['data'=>$data, 'img'=>$img]);
    }

    public function delete_resource(){
        $id=$this->input->post('id', true);
        unlink('assets/images/resources/'.$id.'.png');
        $this->db->where('id', $id)->delete('work_resources');
        echo "success";
    }

    public function get_past_assignments(){
        $date=$this->input->post('date', true);

        $column_id=$this->db->query('select column_id from work_crews where `date`= "'.$date.'" and column_id != "resources" and column_id != "unplaced" group by column_id order by column_id asc')->result();                   
        
        $h = '';
        foreach ($column_id as $key => $value) {
            $h .= '<div class="col">';
             $h .= '<p>'.$value->column_id.'</p>';
             
           
            
            $resource=$this->db->select('work_resources.id as resource_id,work_resources.resource_name')
                                ->where(['column_id'=>$value->column_id, 'date' => $date])
                                ->from('work_crews')
                                ->join('work_resources', 'work_resources.id = work_crews.resource_id')
                                ->get()
                                ->result();
            

             $h .= '<ul style="list-style-type:none">';

             foreach ($resource as $key => $resource) { 
               $h .='<li><img src = "'.base_url('assets/images/resources/').$resource->resource_id.'.png">'.$resource->resource_name.'</li>';
             }
             
             $h .='<li>_____</li>';

             $block_id=$this->db->select('work_crews.block_id,personnel.fname, personnel.lname')
                ->where(['column_id'=>$value->column_id, 'date' => $date, 'block_id>'=>0])
                ->from('work_crews')
                ->join('personnel', 'personnel.id = work_crews.block_id')
                ->get()
                ->result(); 
             
             foreach ($block_id as $key => $value) { 
               $h .='<li><img src = "'.base_url('assets/images/personnel/').$value->block_id.'_small.jpg">'.$value->fname." ".$value->lname.'</li>';
             }
             

             $h .='</ul>';
            $h .= '</div>';
        }
                   
        echo $h;

    }


    public function repeat_last_day(){
        
        $copy_to=$_POST['copy_to'];

        if($copy_to == date('Y-m-d', strtotime('today')) ){
            $res=$this->db->query('select `date` from work_crews where `date`<\''.$copy_to.'\' order by `date` desc limit 1')->row();
            $copy_from=$res->date;

            $copy_from_data = $this->db->query('select block_id,column_id,order_id from work_crews where `date`= "'.$copy_from.'" ')->result();
            
            foreach ($copy_from_data as $key => $value) {
               $data=array();
               $data['column_id'] = $value->column_id;
               $data['order_id'] = $value->order_id;

               $this->db->where(['date'=>$copy_to, 'block_id'=> $value->block_id])->update('work_crews', $data);

            }
        }

        if($copy_to == date('Y-m-d', strtotime('tomorrow'))){
            $res=$this->db->query('select `date` from work_crews where `date`<\''.$copy_to.'\' order by `date` desc limit 1')->row();
            $copy_from=$res->date;

            $copy_from_data = $this->db->query('select * from work_crews where `date`= "'.$copy_from.'" ')->result();
            
            foreach ($copy_from_data as $key => $value) {
               $data=array();
               $data['date'] = $copy_to;
               $data['column_id'] = $value->column_id;
               $data['order_id'] = $value->order_id;
               $data['block_id'] = $value->block_id;
               $data['resource_id'] = $value->resource_id;

               $this->db->insert('work_crews', $data);
            }
        }
        
        
        echo "success";
    }
    ////////////////////////////////////////////////////////
    function get_new_data(){

        $this_day = str_replace(' ', '', $_POST['this_date']);
//   insert new data
        $result = $this->db->query("select * from work_crews where date = '".$this_day."' limit 1")->row();
        if (empty($result)){ // set up new day!
            //$new_blocks = mysql_query("select id from personnel WHERE status = 'active' and rank!='counselor' order by fname asc"); //add the workers
            $new_blocks =  $this->db->query("select id from personnel WHERE status = 'active' order by rank desc, fname asc")->result(); //add the workers ***** changed to include counselors under work crews
            $order = 0;
            foreach ($new_blocks as $new_block){
                $this->db->query("INSERT INTO work_crews (block_id,`date`,order_id) VALUES(".$new_block->id.",'".$this_day."',".$order.")");
                $order++;
            }
            $new_blocks =  $this->db->query("select id from work_resources where delete_flag='0'")->result(); //add the resources
            foreach($new_blocks as $new_block){
                $this->db->query("INSERT INTO work_crews (block_id,column_id,`date`,resource_id) VALUES('-".$new_block->id."','resources','".$this_day."',".$new_block->id.")");
            }
        }
//        get notes
         $notes = $this->db->query("select note from work_notes where `date` = '".$this_day."' limit 1")->row();
        if(isset($notes->note)){
            $note = $notes->note;
        }else{
            $note= '';
        }
        
        
        $result = $this->db->query("select `column_id` from work_crews where `date`LIKE '%$this_day%' and column_id != 'resources' and column_id != 'unplaced' group by column_id order by column_id asc")->result();
        $last_location = '';
        foreach ($result as $row) {
           
        	if ($row->column_id == 'Standby'){ // stick Standby at the end
        
        	 $last_location .= '<div class="col-md-4 col-content">';
             $last_location .= '<div class="item_col">';
             $last_location .= '<h6 class="location_header">Standby</h6>';
             $last_location .= '<div class="list" id="Standby">'; 
             $last_location .= '</div>';
             $last_location .= '</div>';
             $last_location .= '</div>';
        	}else{
        	     $last_location .= '<div class="col-md-4 col-content">';
             $last_location .= '<div class="item_col">';
             $last_location .= '<h6 class="location_header">'.$row->column_id.'</h6>';
             $last_location .= '<div class="list" id="'.str_replace(' ', '', $row->column_id).'">'; 
             $last_location .= '</div>';
             $last_location .= '</div>';
             $last_location .= '</div>';
        	}
        }

//dynamic column section start


  //dynamic column section end	
     $columns = array();
//------------------------------------------------------------------------------------------------------------------------------------------------------------
	
		$blocks = $this->db->query("SELECT * FROM work_crews, work_resources where resource_id=work_resources.id and work_crews.date = '".$this_day."' ORDER BY order_id ASC")->result(); // get block information

	foreach($blocks as $block)
	{
       
		$columns[$block->column_id][] = $block;
	}

//------------------------------------------------------------------------------------------------------------------------------------------------------------	
	
	$blocks = $this->db->query("SELECT * FROM work_crews, personnel where personnel.id = work_crews.block_id and work_crews.date = '".$this_day."' ORDER BY order_id ASC")->result();

	
    foreach($blocks as $block)
	{
       
		$columns[$block->column_id][] = $block;
	}

	/* create settings array in javascript style */
	$settings = array();
	
	$block_data = array();
        
        $block_id = [];
    $html1 = array();
 
	foreach ($columns as $column_name => $blocks)
	{
	    
	  
        $block_id[] = $column_name;
		$block_to_settings = array();
					
		foreach ($blocks as $block)
		{		
            
            $block_to_settings[$column_name][] = $block;

		}
		  $html = '';
        foreach($block_to_settings[$column_name] as  $value){
         
                $column_name =  $value->column_id;
 
                  if(empty($value->resource_id)){
                    
                  $html .= '<div class="item  text-left" data-id="'.$value->block_id.'" id="block_'.$value->block_id.'">';
                   $src_path = FCPATH.'assets/images/personnel/'.$value->block_id.'.jpg';
                  $src = base_url('assets/images/personnel/'.$value->block_id).'.jpg';
                
                  if (file_exists($src_path)) {
                      $html .='<img src="'.$src.'" height="30px" width="30px">';
                  }
                  if ($value->rank == 'counselor') {$value->fname = $value->nickname; $value->lname = '';}// use formal name for counselors

                  $html .= '<span>'.$value->fname.' '.$value->lname.'</span>';
                  $html .= '</div>';
                }else{
                    $html .= '<div class="item  text-left" data-id="'.$value->block_id.'" id="block_'.$value->block_id.'">';
                       $src_path = FCPATH.'assets/images/resources/'.$value->resource_id.'.png';
                      $src =  base_url('assets/images/resources/'.$value->resource_id).'.png';
                    
                      if (file_exists($src_path)) {
                          $html .='<img src="'.$src.'" style="max-width:50px">';
                      }
                   
                    $html .= '<span>'.$value->resource_name.'</span>';
                    $html .= '</div>';
                 
                }
      
        }
          $html1[] =array(
	        'column_name' =>$column_name,
	        'html' => $html
	    );
       
            
	 
	}


                                      
        ################ get location option ########################
         $locations =$this->db->query('select column_id from work_crews where `date` >= date_sub(curdate(), interval 30 day) and column_id != "resources" and column_id != "unplaced" and column_id not in (select column_id from work_crews where `date`= "'.$this_day.'" group by column_id) group by column_id order by column_id asc')->result();
   
            $location_option = '<option >-- Select Recent Location -- </option>';
            foreach ($locations as $key => $value){
                $location_option .= '<option value="'.$value->column_id.'">'.$value->column_id.'</option>';

            }

        
        echo json_encode(array('block_id' => $block_id ,'html1'=>$html1, 'note' => $note,'last_location' => $last_location));
    }
    
//    create_location method
    public function update_column(){
    
     $this_day = str_replace(' ', '', $_POST['this_date']);
        $block_id = str_replace('block_', '', $_POST['block']);
        $new_column_id = $_POST['to_column'];
        $old_column_id = $_POST['from_column'];
        $order_id = 0;
        $block_exists = $this->db->query("SELECT * FROM work_crews WHERE block_id = '".$block_id."' and `date`='".$this_day."'")->result();
        
     /* if not, we insert it */
		if (empty($block_exists)) 
		{
		
			
			echo $this->db->query("INSERT INTO work_crews (block_id, column_id, order_id, date) VALUES ('".$block_id.", ".$new_column_id.", ".$order_id.", ".$this_day."')");
			
		}
		/* or else we update it */
		else 
		{
			
			echo $this->db->query("UPDATE work_crews SET block_id = '".$block_id."', column_id = '".$new_column_id."', order_id ='".$order_id."' WHERE `date`='".$this_day."' and block_id = '".$block_id."'  and column_id = '".$old_column_id."'");
       
		
		}
        
    }
    
    //update order 
    public function update_order(){
    
         $this_day = str_replace(' ', '', $_POST['this_date']);
        $order = $_POST['order'];
         foreach($order as $key => $value){
            echo $this->db->query("UPDATE work_crews SET order_id = '".$key."' WHERE `date`='".$this_day."' and block_id = '".$value."' ");
   
         }
    }   
    //add_new_note
    public function add_new_note(){
        $edit_data = $_POST['edit_data'];
         $this_day = str_replace(' ', '', $_POST['this_date']);
        $note_exists = $this->db->query("SELECT * FROM work_notes WHERE `date`='".$this_day."'")->row();
        
     /* if not, we insert it */
		if (empty($note_exists)) 
		{
			echo $this->db->query("INSERT INTO work_notes (note, date) VALUES ('".$edit_data.", ".$this_day."')");
			
		}
		/* or else we update it */
		else 
		{
            echo $this->db->query("UPDATE work_notes SET note = '".$edit_data."'  WHERE `date`='".$this_day."' ");
  
		}
    }

}    