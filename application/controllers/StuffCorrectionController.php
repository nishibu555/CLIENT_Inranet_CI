<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StuffCorrectionController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model(['CrudModel']);
		$this->load->library('ion_auth');
		$this->load->helper('language');
		$this->lang->load('auth');

		if (!$this->ion_auth->logged_in()) {
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
	}
   

   public function manually_add_staff(){
   	  $data=array();
   	  $data['fname']=$_POST['fname'];
   	  $data['lname']=$_POST['lname'];
   	  $data['status']='active';
   	  $data['rank']='staff';
   	  $this->db->insert('personnel', $data);
      echo "success";
   }
   

   public function get_staff(){
   	$data= $this->db->where('id', $_POST['id'])->get('personnel')->row();
   	
     echo json_encode($data);
   }

   public function update_satff(){
	   	$data=array();
	   	$data['fname']=$_POST['first_name'];
	   	$data['lname']=$_POST['last_name'];
	   	$data['image']=1;
	   	$this->db->where('id', $_POST['id'])->update('personnel', $data);

	   //	if($_FILES['userfile']){

    //         $config['upload_path']          = FCPATH . 'assets\images\personnel';
    //         $config['allowed_types']        = '*';
    //         $config['max_size']             = 32000;
    //         $config['file_name']             = $_POST['id'].".jpg";
    //         $this->load->library('upload', $config);
           
    //         if(file_exists('assets/images/personnel/'.$_POST['id'].'.jpg')){
    //             unlink('assets/images/personnel/'.$_POST['id'].'.jpg');
    //             unlink('assets/images/personnel/'.$_POST['id'].'small_.jpg');
    //         }
            
    //         if ($this->upload->do_upload('userfile')){
    //             $upload = array('upload_data' => $this->upload->data());
    //             $img =  $upload['upload_data']['file_name'];
    //         }
    //     }

	   	echo "success";
   }

    public function staff_manager(){
    	$data = array();
    	$data['active_staff'] = $this->db->where(['rank!='=>'student',  'status'=>'active'])->get('personnel')->result();
    	$data['content'] = $this->load->view('front-end/record/staff_manager', $data, true);
		$this->load->view('front-end/master', $data);
    }

    public function update_staff_member(){
    	$id=$_POST['id'];
    	echo $id;
    }

    public function delete_staff_member(){
    	$id=$_POST['id'];
    	$this->db->where('id', $id)->delete('personnel');
    	echo "success";
    }
    
	public function index()
	{
		$data = array();


		$data['pending_stuff'] = $this->db->query('select staff_correction.`id`, staff_correction.date_submit, personnel.fname, personnel.lname from staff_correction,personnel where staff_correction.staff_id=personnel.`id` and (date_process="0000-00-00" or date_process is null) and personnel.status="active" and personnel.rank!="student" and staff_correction.delete_flag=0 order by personnel.lname asc,`id` asc')->result();

		$data['resolved_stuff']  = $this->db->query('select staff_correction.`id`, staff_correction.date_submit, personnel.fname, personnel.lname from staff_correction,personnel where staff_correction.staff_id=personnel.`id` and staff_correction.status="Resolved" and personnel.status="active" and personnel.rank!="student" and staff_correction.delete_flag=0 order by personnel.lname asc,`id` asc')->result();
        
		
		$data['correction_staff'] = $this->db->query('select personnel.image, personnel.lname, personnel.fname, staff_correction.`id`, staff_correction.staff_id, staff_correction.status, staff_correction.date_process, staff_correction.date_due, staff_correction.correction from (staff_correction left join personnel on (staff_correction.staff_id=personnel.id)) where personnel.rank!="student" and personnel.status="active" and staff_correction.status!="Resolved" and staff_correction.delete_flag=0 order by lname asc, fname asc, `id` asc')->result();


		$data['content'] = $this->load->view('front-end/record/stuff_correction', $data, true);
		$this->load->view('front-end/master', $data);
	}



	public function new_write_up()
	{

		$new_write_up_list = $this->db->select('staff_correction.*, 
        	                                   personnel.fname, 
        	                                   personnel.lname')
			->where([
				'personnel.rank !=' => 'student'
			])
			->from('staff_correction')
			->join('personnel', 'personnel.id = staff_correction.staff_id')
			->group_by('staff_correction.staff_id')
			->get()
			->result();

		$data = array();
		$data['new_write_up_list'] = $new_write_up_list;
		$data['content'] = $this->load->view('front-end/record/new_write_up', $data, true);
		$this->load->view('front-end/master', $data);
	}


	public function save_new_write_up(){
      $data=array();
      $data['infraction']=$this->input->post('infraction', true);
      $data['status']="pending";
      $data['staff_id']=$this->input->post('staff_id', true);
      $data['date_submit']=date("m-d-Y");

      $this->db->insert('staff_correction', $data);
      $last_id=$this->db->insert_id();
        $staff_id= $this->db->query("SELECT * FROM staff_correction WHERE `id`=$last_id ")->row();
      redirect('staff_detail/'.$staff_id->staff_id);

	}


	public function staff_detail($staff_cor_id)
	{   
	    $data=array();
        $data['staff_id'] = $this->db->select('staff_id')->where('id', $staff_cor_id)->get('staff_correction')->row()->staff_id;

        
        $data['staff_detail']=$this->db->query('select staff_correction.*,personnel.fname,personnel.lname,users.first_name from (staff_correction left join personnel on staff_correction.staff_id=personnel.`id` left join users on staff_correction.infraction_author=users.username) where staff_correction.`id`='.$staff_cor_id.' limit 1')->row();


        $result2 = $this->db->query('select count(*) as `position` from staff_correction where `id` <= '.$staff_cor_id.' and staff_id='.$data['staff_id'].' and delete_flag=0')->result();
        $data['position'] = $result2[0]->position; //position is page number

        // print_r($data); die();


		$data['content'] = $this->load->view('front-end/record/staff_detail', $data, true);
		$this->load->view('front-end/master', $data);
	}
	
//    edit corection data 
    function editCorrectionData(){
        $id = $_POST['id'];
        $response = $this->db->query("SELECT * FROM staff_correction WHERE `id`=$id ")->row();
        echo json_encode($response);
    }
	//add correction
	public function add_correction()
	{
     if($_POST['action'] == 'admin'){
		$this->db->set('correction', $_POST['correction']);
		$this->db->set('date_due', $_POST['date_due']);
		$this->db->set('date_process', date('m-d-Y'));
		$this->db->set('status', 'Open');
		$this->db->where('id', $_POST['id']);
		$result = $this->db->update('staff_correction');

		if (isset($result)) {
			$response['success'] = true;
			$response['msg'] = "Correction Successfully added";
			$response['action'] = 'reload';
			$response['html'] = $_POST['correction'];
		}
     }else{
        $this->db->set('correction', $_POST['correction']);
		$this->db->set('date_due', $_POST['date_due']);
		$this->db->set('date_process', date('d-m-Y'));
		$this->db->where('id', $_POST['id']);
		$result = $this->db->update('staff_correction');

		if (isset($result)) {
			$response['success'] = true;
			$response['msg'] = "Correction Successfully added";
			$response['html'] = $_POST['correction'];
		} 
     }
		echo json_encode($response);
	}
    //    edit note data
    function editNoteData(){
        $id = $_POST['id'];
        $response = $this->db->query("SELECT * FROM staff_correction WHERE `id`=$id ")->row();
        echo json_encode($response);
    }
	//edit note
	public function edit_note()
	{
//        var_dump($_POST);die;
		$this->db->set('notes', $_POST['notes']);
		$this->db->where('id', $_POST['id']);
		$this->db->set('date_process', date('d-m-Y'));
		$result = $this->db->update('staff_correction');

		if (isset($result)) {
			$response['success'] = true;
			$response['msg'] = "Correction Successfully added";
            $response['html'] = $_POST['notes'];
		}

		echo json_encode($response);
	}
	//delete
	public function delete_correction()
	{

		$this->db->set('delete_flag', '1');
		$this->db->where('id', $_POST['id']);
		$result = $this->db->update('staff_correction');

		if (isset($result)) {
			$response['success'] = true;
			$response['msg'] = "Correction Successfully Deleted";
		}

		echo json_encode($response);
	}	
    
    //revert correction
	public function revert_correction()
	{  
	   if($_POST['status'] == 'Pending'){
         $this->db->set('status', 'Pending');
         $this->db->set('date_process', null);
         $this->db->set('date_due', null);
         $this->db->set('notes', null);
         $this->db->set('correction', null);
         $this->db->where('id', $_POST['id']);
         $result = $this->db->update('staff_correction');
       }
       else{
        if($_POST['status'] == 'Open'){
             $this->db->set('status', 'Open');
             $this->db->set('date_complete', null);
             $this->db->where('id', $_POST['id']);
             $result = $this->db->update('staff_correction');
        }
       }

		if (isset($result)) {
			$response['success'] = true;
			$response['msg'] = "Correction Successfully Revert";
		}

		echo json_encode($response);
	}    

    //resolved_correction 
	public function resolved_correction()
	{

		$this->db->set('status', $_POST['status']);
		$this->db->where('id', $_POST['id']);
		$result = $this->db->update('staff_correction');

		if (isset($result)) {
			$response['success'] = true;
			$response['msg'] = "Correction Successfully Revert";
		}

		echo json_encode($response);
	}
}
