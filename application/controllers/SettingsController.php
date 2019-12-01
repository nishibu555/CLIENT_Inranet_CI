<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SettingsController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model(['SettingsModel']);
		$this->load->library('ion_auth');
		$this->load->helper('language');
		$this->lang->load('auth');

		if (!$this->ion_auth->logged_in()) {
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
	}
    //index method 
    public function index(){
        $data = array();
		$data['settings'] = '';
		$data['content'] = $this->load->view('front-end/settings/index', $data, true);
		$this->load->view('front-end/master', $data);
    }
    
    public function users(){
            $data = array();
            $data['content'] = $this->load->view('auth/create_user',$data, true);
            $this->load->view('front-end/master', $data);
    }
    
    //get_user
    public function get_user(){
        	    //print_r($_POST);
		$draw = intval($_POST['draw']);

		$start = intval($_POST['start']);

		$length = intval($_POST['length']);

		$fetch_data = $this->SettingsModel->make_datatables($draw,$start,$length);

		//print_r($fetch_data);
		//echo 11111; die();
		$data = array();
        $i= 0;
		foreach($fetch_data as $row)
		{
			$active_btn= '<button style="font-size:12px" type="button" class="btn badge badge-success active_btn"  data-id="'.$row->id.'" >Active</button>';
			$deactive_btn= '<button style="font-size:12px" c type="button" class="deactive_btn btn badge badge-danger"  data-id="'.$row->id.'" >Dective</button>';
			$groupBtn= '<div role="group" class="btn-group-sm btn-group btn-group-toggle" ><a type="button"  data-id="'.$row->id.'" class="editUser btn btn-primary" ><i class="fa text-white fa-edit pr-1 pl-1"></i></a><button type="button" data-id="'.$row->id.'"  class="btn btn-danger deleteUser"><i class="fa text-white fa-trash pr-1 pl-1"></i></button></div>';
            if($row->p_admin==1){
                $chk_box_1 = '<input data-id="'.$row->id.'" class="chk_box_user" type="checkbox" name="p_admin" value="1" checked>';
            } else{
                $chk_box_1 = '<input data-id="'.$row->id.'" class="chk_box_user" type="checkbox" name="p_admin" value="1">';
            }          
            if($row->p_academics==1){
                $chk_box_2 = '<input class="chk_box_user" type="checkbox" name="p_academics" value="1" checked>';
            } else{
                $chk_box_2 = '<input data-id="'.$row->id.'" class="chk_box_user" type="checkbox" name="p_academics" value="1">';
            }         
            if($row->p_marketing==1){
                $chk_box_3 = '<input data-id="'.$row->id.'" class="chk_box_user" type="checkbox" name="p_marketing" value="1" checked>';
            } else{
                $chk_box_3 = '<input class="chk_box_user" type="checkbox" name="p_marketing" value="1">';
            }         
            if($row->p_workcrews==1){
                $chk_box_4 = '<input data-id="'.$row->id.'" class="chk_box_user" type="checkbox" name="p_workcrews" value="1" checked>';
            } else{
                $chk_box_4 = '<input data-id="'.$row->id.'" class="chk_box_user" type="checkbox" name="p_workcrews" value="1">';
            }         
            if($row->p_fundraising==1){
                $chk_box_5 = '<input data-id="'.$row->id.'" class="chk_box_user" type="checkbox" name="p_fundraising" value="1" checked>';
            } else{
                $chk_box_5 = '<input class="chk_box_user" type="checkbox" name="p_fundraising" value="1">';
            }         
            if($row->p_viewrecords==1){
                $chk_box_6 = '<input data-id="'.$row->id.'" class="chk_box_user" type="checkbox" name="p_viewrecords" value="1" checked>';
            } else{
                $chk_box_6 = '<input data-id="'.$row->id.'" class="chk_box_user" type="checkbox" name="p_viewrecords" value="1">';
            }         
            if($row->p_editrecords==1){
                $chk_box_7 = '<input data-id="'.$row->id.'" class="chk_box_user" type="checkbox" name="p_editrecords" value="1" checked>';
            } else{
                $chk_box_7 = '<input data-id="'.$row->id.'" class="chk_box_user" type="checkbox" name="p_editrecords" value="1">';
            }        
            if($row->p_editbeds==1){
                $chk_box_8 = '<input data-id="'.$row->id.'" class="chk_box_user" type="checkbox" name="p_editbeds" value="1" checked>';
            } else{
                $chk_box_8 = '<input data-id="'.$row->id.'" class="chk_box_user" type="checkbox" name="p_editbeds" value="1">';
            }        
            if($row->p_editschedules==1){
                $chk_box_9 = '<input data-id="'.$row->id.'" class="chk_box_user" type="checkbox" name="p_editschedules" value="1" checked>';
            } else{
                $chk_box_9 = '<input data-id="'.$row->id.'" type="checkbox" name="p_editschedules" value="1">';
            }        
            if($row->p_directory==1){
                $chk_box_10 = '<input data-id="'.$row->id.'" class="chk_box_user" type="checkbox" name="p_directory" value="1" checked>';
            } else{
                $chk_box_10 = '<input data-id="'.$row->id.'" class="chk_box_user" type="checkbox" name="p_directory" value="1">';
            }        
            if($row->p_discipline==1){
                $chk_box_11 = '<input data-id="'.$row->id.'" class="chk_box_user" type="checkbox" name="p_discipline" value="1" checked>';
            } else{
                $chk_box_11 = '<input data-id="'.$row->id.'" class="chk_box_user" type="checkbox" name="p_discipline" value="1">';
            }        
            if($row->p_staffcorrection==1){
                $chk_box_12 = '<input data-id="'.$row->id.'" class="chk_box_user" type="checkbox" name="p_staffcorrection" value="1" checked>';
            } else{
                $chk_box_12 = '<input data-id="'.$row->id.'" class="chk_box_user" type="checkbox" name="p_staffcorrection" value="1">';
            }       
            if($row->p_documents==1){
                $chk_box_13 = '<input data-id="'.$row->id.'" class="chk_box_user" type="checkbox" name="p_documents" value="1" checked>';
            } else{
                $chk_box_13 = '<input data-id="'.$row->id.'" class="chk_box_user" type="checkbox" name="p_documents" value="1">';
            }       
            if($row->p_inventory==1){
                $chk_box_14 = '<input data-id="'.$row->id.'" class="chk_box_user" type="checkbox" name="p_inventory" value="1" checked>';
            } else{
                $chk_box_14 = '<input data-id="'.$row->id.'" class="chk_box_user" type="checkbox" name="p_inventory" value="1">';
            }
			$sub_array = array();
		  $sub_array[] = $i= $i+1;
			$sub_array[] = $row->username;
			$sub_array[] = $row->first_name;
			$sub_array[] = $row->last_name;
			$sub_array[] = $chk_box_1;
			$sub_array[] = $chk_box_2;
			$sub_array[] = $chk_box_3;
			$sub_array[] = $chk_box_4;
			$sub_array[] = $chk_box_5;
			$sub_array[] = $chk_box_6;
			$sub_array[] = $chk_box_7;
			$sub_array[] = $chk_box_8;
			$sub_array[] = $chk_box_9;
			$sub_array[] = $chk_box_10;
			$sub_array[] = $chk_box_11;
			$sub_array[] = $chk_box_12;
			$sub_array[] = $chk_box_13;
			$sub_array[] = $chk_box_14;
//			$sub_array[] = $row->active==1? $active_btn:$deactive_btn;
			$sub_array[] = $groupBtn;
			$data[] = $sub_array;
		}

		$total = $this->SettingsModel->get_all_data();

		$output = array(
			"draw"                    =>    $draw,
			"recordsTotal"          =>   $total   ,
			"recordsFiltered"     =>  $total   ,
			"data"                    =>     $data
		);

		//echo json_encode(array())

		echo json_encode($output);
    }
    public function create_user(){
//        var_dump($_POST);
       $response = array(
            'success'=> true,
            'error'=> false,
            'msg'=>''
        );
        if($_POST['action']=='edit'){
            $this->db->set('first_name',$_POST['first_name'])
                ->set('last_name',$_POST['last_name'])
                ->where('id',$_POST['id'])
                ->update('users');
            $response['success']='true';
            $response['msg']='User Updated Successfully!';
        }else{
        
         if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
            {
                redirect('auth', 'refresh');
            }

            $tables = $this->config->item('tables', 'ion_auth');
            $identity_column = $this->config->item('identity', 'ion_auth');
            $this->data['identity_column'] = $identity_column;

            // validate form input
            $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'trim|required');
            $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'trim|required');
            if ($identity_column !== 'email')
            {
                $this->form_validation->set_rules('identity', $this->lang->line('create_user_validation_identity_label'), 'trim|required|is_unique[' . $tables['users'] . '.' . $identity_column . ']');
                $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|valid_email');
            }
            else
            {
                $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|valid_email|is_unique[' . $tables['users'] . '.email]');

            }
            $this->form_validation->set_rules('username', $this->lang->line('create_user_validation_username_label'), 'trim|required|is_unique[' . $tables['users'] . '.username]');
            $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[password_confirm]');
            $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

            if ($this->form_validation->run() === TRUE)
            {
                $email = strtolower($this->input->post('email'));
                $identity = ($identity_column === 'email') ? $email : $this->input->post('identity');
                $password = $this->input->post('password');

                $additional_data = [
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'username' => $this->input->post('username'),
                ];
            }
            if ($this->form_validation->run() === TRUE && $this->ion_auth->register($identity, $password, $email, $additional_data))
            {
                // check to see if we are creating the user
                // redirect them back to the admin page
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                $response['success']='true';
                $response['msg']='User Added Successfully!';
            } else{
                $response['error']=true;
                $response['error_list']=$this->form_validation->error_array();
            }
        }
        echo json_encode($response);
    }
    
    public function update_role(){
       $name = $_POST['name'];
       $id = $_POST['id'];
       $value = $_POST['value'];
        $response = $this->db->set($name, $value)
                        ->where('id',$id)
                        ->update('users');
        echo json_encode($response);
    }  
    //delete method
    public function deleteUser(){
     
       $id = $_POST['id'];
        $response = $this->db->set('delete_flag', 1)
                        ->where('id',$id)
                        ->update('users');
        echo json_encode($response);
    }    
//    edit data
    
    public function editData(){
     
       $id = $_POST['id'];
        $response = $this->db->query("SELECT * FROM users WHERE `id`= $id")->row();
        echo json_encode($response);
    }


      
}
