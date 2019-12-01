<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EducationLogController extends CI_Controller {
    public function __construct()
    {
	    parent::__construct();
	    $this->load->library('form_validation');
        $this->load->model(['CrudModel']);
        $this->load->library('ion_auth');
        $this->load->helper('language');
        $this->lang->load('auth');

        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
    }

    public function index(){
        $data = array();
        $data['content']=$this->load->view('front-end/record/education_log',$data,true);
        $this->load->view('front-end/master', $data);
    }

    public function save_education_log(){
        $user = $this->ion_auth->user()->row();

        $data=array();
        $data['author']=$user->first_name." ".$user->last_name;
        $data['timestamp']=date("m/d/Y h:i:sa");
        $data['data']=$this->input->post('data', true);
        
       echo $this->CrudModel->insert_data('education_log', $data);
      
    }

    public function get_data()
    {
 
        $education_log = $this->db->query('SELECT * FROM `education_log` ORDER BY `id` DESC')->result();
        $html = '';

        foreach($education_log as $education_log){
            $html .= '<div class="activity-content">';
            $html .= '<p><span>'.date('D',strtotime($education_log->timestamp));
            $html .= '</span> <span>'.date('m/d/Y',strtotime($education_log->timestamp)); 
            
            $html .= '</span> at <span>';
            $html .= date('h:i A',strtotime($education_log->timestamp));
            
            $html .='</span> by <span>'.$education_log->author.'</span></p>';
            $html .= '<p>'.$education_log->data.'</p>';
            
            $html .= '</div>';
        }
       
        echo json_encode($html);

    }


    public function date_filter()
    {
        $search_date = '%'.date('d-m-Y', strtotime($_POST['src_date'])).'%';
        $student_activity = $this->db->query("SELECT * FROM `education_log` WHERE `timestamp` LIKE '".$search_date."' ORDER BY `id` DESC")->result();
        $html = '';

        foreach($student_activity as $activity){
            $html .= '<div class="activity-content">';
            $html .= '<p><span>'.date('D',strtotime($activity->timestamp));
            $html .= '</span> <span>'.date('m/d/Y',strtotime($activity->timestamp)); 
            
            $html .= '</span> at <span>';
            $html .= date('h:i A',strtotime($activity->timestamp));
            
            $html .='</span> by <span>'.$activity->author.'</span></p>';
            $html .= '<p>'.$activity->data.'</p>';
            
            $html .= '</div>';
        }
       
        echo json_encode($html);

    }

}    
