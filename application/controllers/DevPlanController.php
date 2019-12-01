<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DevPlanController extends CI_Controller {
   
    public function __construct()
    {
	    parent::__construct();
	    $this->load->library('form_validation');
        $this->load->model(['RegistrationModel','StudentModel']);
        $this->load->library('ion_auth');
        $this->load->helper('language');
        $this->lang->load('auth');

        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        
    }
  
    //development plan
    public function development_plan(){
      $data=array();
   
  
      $data['content']=$this->load->view('front-end/record/development_plan','', true);
      $this->load->view('front-end/master', $data);
    }
    
    public function get_dev_plan(){
        if(isset($_POST['date'])){
            $date = $_POST['date'];
        } else{
            $date = '2019-09-09';
        }

          $dev_plan = $this->db->query("SELECT *  FROM `dev_plans` WHERE `date` LIKE '%$date%'")->result();
         
        $html = '';
        foreach($dev_plan as $value){
            
            $std_info = $this->db->query("SELECT *  FROM `personnel` WHERE `id`= $value->student_id")->row();
            
            if(isset($std_info)){
                
                    $html .= '<tr>';
                    
                    $html .= '<td>';
                    if($std_info->image !=1){
                     $src= base_url().'assets/images/default_profile.jpg';
                    }
                    else{
                     $src= base_url('assets/images/personnel/').$std_info->id.'.jpg';
                    }
                    $html .= '<p><img src="'.$src.'" height="50px" width="50px">';
                    $html .= '</p>';
                    $html .= '</td>';
                    
                    $html .= '<td>';
                    $html .= '<p>'.$std_info->fname." ".$std_info->lname;
                    $html .= '</p>';
                    $html .= '</td>';
                    
                    $html .= '<td>';
                    $html .= '<p>'.$value->status;
                    $html .= '</p>';
                    $html .= '</td>';
                    
                    $html .= '<td>';
                    // $html .= '<p>'.$value->nickname;
                    $html .= '</p>';
                    $html .= '</td>';
                    
                    $html .= '</tr>';
            }
            else{
                 $html .= '<tr>';
                 $html .= '<td colspan="3">';
                $html .= '<p class="text-danger"> Not Found</p>';
                 $html .= '</td>';
                 $html .= '</tr>';
            }
            
       
        }
       
        echo json_encode($html);
    }
}