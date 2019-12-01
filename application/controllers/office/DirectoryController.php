<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DirectoryController extends CI_Controller {
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
           
        	if ($user_info->p_directory == 0){
        		 redirect('dashboard', 'refresh');
        	}
    }
    //index method 
    public function index(){
        $data=array();
        $data['directory_letters']=$this->db->query("SELECT distinct upper(left(`title`,1)) as letters from directory where left(`title`,1) regexp '[a-z]' and delete_flag='0' order by letters asc")->result();
 

        $data['content']=$this->load->view('front-end/office/directory',$data,true);
        $this->load->view('front-end/master', $data);
    }
    //get data 
    public function get_data(){
         $directory_letters = $this->db->query("SELECT distinct upper(left(`title`,1)) as letters from directory where left(`title`,1) regexp '[a-z]' and delete_flag='0' order by letters asc")->result();
        $html = '';
          foreach($directory_letters as $value) {
                    $html .= '<div class="directory-item">';
                     $html .= '<h1 id="'.$value->letters.'">'.$value->letters.'</h1>';
                     $result = $this->db->query("select * from directory where left(`title`,1) = '$value->letters' and `delete_flag`='0' order by `title` asc")->result();
                        foreach($result as $result){
                         $html .= '<strong><a href ="#" data-toggle="modal" id="editBtn" data-id="'.$result->id.'">'.$result->title.'</a></strong>';
                        $html .= '<p>'.$result->content.'</p>';
                        }
                     $html .= '</div>';
          }
        echo json_encode($html);
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
        }else
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


    
}