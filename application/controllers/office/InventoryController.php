<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InventoryController extends CI_Controller {
    public function __construct()
    {
	    parent::__construct();
	    $this->load->library('form_validation');
        $this->load->model(['OfficeModel','ActivityModel']);
        $this->load->library('ion_auth');
        $this->load->helper('language');
        $this->lang->load('auth');

        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
            //user role checing start
           $userId = $this->ion_auth->get_user_id();
           $user_info = $this->db->query("SELECT * FROm users WHERE `id` LIKE $userId")->row();
           
        	if ($user_info->p_inventory == 0){
        		 redirect('dashboard', 'refresh');
        	}
    }
    //index method 
    public function index(){
        $data=array();
        $data['inventory_list']=$this->db->query("SELECT *  FROM inventory_lists WHERE `delete_flag`=0 ORDER BY `name` ASC")->result();
        $data['content']=$this->load->view('front-end/office/inventory',$data,true);
        $this->load->view('front-end/master', $data);
    }
    //get data 
    public function get_data(){
        if(isset($_POST['list_id'])){  
            $list_id = $_POST['list_id'];
        } else{
            $inventory = $this->db->query("SELECT *  FROM inventory_lists WHERE `delete_flag`=0 ORDER BY `name` ASC LIMIT 1")->row();
            $list_id = $inventory->id;
            echo  $list_id;
        }
      

         $inventory = $this->db->select('*')->where('list_id', $list_id)->order_by('title', 'asc')->get('inventory_items')->result();
        

         $total_inventory = $this->db->query("SELECT sum(inventory) as inv FROM inventory_items WHERE `list_id`=$list_id")->row();

        

        $show_inv = count($inventory);
        $total_inv = $total_inventory->inv;
        $html2 = '<strong>'.$show_inv.'</strong> Items – <strong>'.$total_inv.'</strong> Units';
        
        $html = '';
        $i = 0;
          foreach($inventory as $value) {
              $i=$i+1 ;
                    $html .= '<tr>';
                    $html .= '<th>'.$i.'</th>';
                    $html .= '<td class="text-left">'.$value->title.'</td>';
                    $html .= '<td>'.$value->last_update.'</td>';

                    $html .= '<td>';
                     $html .= '<input type="hidden" name="list_id" value="'.$list_id.'"><input type="number" name="'.$value->id.'" value="'.$value->inventory.'" style="text-align:center;height:50px;width: 50px;"></td>';
                    $html .= '<td>';
                    $html .= '<div class="btn-group" role="group" >';
                    $html .= '<button type="button" class="btn btn-info editBtn" data-id="'.$value->id.'"><i class="fa fa-edit "></i></button>';
                    $html .= '<button type="button" class="btn btn-danger deleteBtn" data-id="'.$value->id.'"><i class="fa fa-trash "></i></button>';
                    $html .= '</div></td>';
                    $html .= '</tr>';
          }

        echo json_encode(['html' => $html,'html2' =>$html2]);
    }    
    
    //get_edit_data method 
    public function get_edit_data(){
        $id = $_POST['id'];
        $data = $this->db->query("SELECT * FROM directory WHERE `id` = $id")->row();
        echo json_encode($data);
    }
    //save method 
    public function save_directory(){
        
        $this->form_validation->set_rules('title', 'Name', 'required');
        $this->form_validation->set_rules('content', 'Contact inforamtion', 'required');

        $response = array(
            'success'=> false,
            'error'=> false,
            'msg'=>''
        );

        if ($this->form_validation->run() === true) {

            $activity_data=array();
            $activity_data['title']      = $this->input->post('title',true);
            $activity_data['content']      = $this->input->post('content',true);

            $activity_id = $this->ActivityModel->InsertData('directory ',$activity_data);

            $response['error']=false;
            $response['success']=true;
            $response['msg']="Directory  Successfully Added";
        }else
        {
            $response['error']=true;
            $response['error_list']=$this->form_validation->error_array();
        }
        echo json_encode($response);
    } 

    //update_directory method 
    public function update_directory(){
        
        $this->form_validation->set_rules('title', 'Name', 'required');
        $this->form_validation->set_rules('content', 'Contact inforamtion', 'required');

        $response = array(
            'success'=> false,
            'error'=> false,
            'msg'=>''
        );

        if ($this->form_validation->run() === true) {

            $activity_data=array();
      
            $this->db->set('title',$this->input->post('title',true));
            $this->db->set('content',$this->input->post('content',true));
            $this->db->where('id',$this->input->post('id',true));
            $this->db->update('directory');
           

            $response['error']=false;
            $response['success']=true;
            $response['msg']="Directory  Successfully Updated!";
        }
        else
        {
            $response['error']=true;
            $response['error_list']=$this->form_validation->error_array();
        }
        echo json_encode($response);
    }

    //delete_directory method 
    public function delete_directory(){
        $id = $_POST['id'];
        $this->db->set('delete_flag',1)->where('id',$id)->update('directory');
        echo json_encode('success');
    }


    public function add_inventory(){
        $data=array();
        $data['title']=$_POST['title'];
        $data['inventory']=$_POST['inventory'];
        $data['list_id']=$_POST['list_id'];
        $this->db->insert('inventory_items', $data);
        print_r($data);
        echo "string";
        
    }

    public function update_inventory(){
        $list_id= $_POST['list_id'];
        $res=$this->db->select('id')->where('list_id', $list_id)->get('inventory_items')->result();

        foreach ($res as $value) {
            if(isset($_POST[$value->id])){
                $this->db->set('inventory', $_POST[$value->id])->where('id', $value->id)->update('inventory_items');
            }
        }
        
    }

    public function update_one_inventory(){
        $data=array();
        $data['title']=$_POST['title'];
        $data['checked_out']=$_POST['checked_out'];
        $this->db->where('id', $_POST['id'])->update('inventory_items',$data);
        echo "success";
    }

    public function get_inventory(){
       $data= $this->db->where('id', $_POST['id'])->get('inventory_items')->row();
        echo json_encode($data);
    }

    public function delete_inventory(){
        $this->db->where('id', $_POST['id'])->delete('inventory_items');
        echo "success";
    }

    public function manage_inventory_list(){
        $data=array();
        $data['all_list']=$this->db->get('inventory_lists')->result();
        $data['content']=$this->load->view('front-end/office/manage_inventory_list',$data,true);
        $this->load->view('front-end/master', $data);
    }

    public function add_inventory_list(){
        $data=array();
        $data['name']=$_POST['name'];
        $data['description']=$_POST['description'];

       $this->db->insert('inventory_lists', $data);
       echo "success";
    }

    public function get_list(){
        $res=$this->db->where('id', $_POST['id'])->get('inventory_lists')->row();
        echo json_encode($res);
    }

    public function update_list(){
        $data=array();
        $data['name']=$_POST['name'];
        $data['description']=$_POST['description'];

        $this->db->where('id', $_POST['id'])->update('inventory_lists', $data);
        echo "success";
    }

    public function delete_list(){

        $this->db->where('id', $_POST['id'])->delete('inventory_lists');
        echo "success";
    }
}