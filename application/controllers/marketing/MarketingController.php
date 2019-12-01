<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MarketingController extends CI_Controller {
   
    public function __construct()
    {
	    parent::__construct();
	    $this->load->library('form_validation');
        $this->load->library('ion_auth');
        $this->load->helper('language');
        $this->lang->load('auth');

        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
         //user role checing start
           $userId = $this->ion_auth->get_user_id();
           $user_info = $this->db->query("SELECT * FROm users WHERE `id` LIKE $userId")->row();
           
            if ($user_info->p_marketing == 0)
            {
                redirect('dashboard', 'refresh');
            }
         //user role checing end
    }


    public function marketing(){
        $data = array();
        $data['content']=$this->load->view('front-end/marketing/marketing',$data,true);
        $this->load->view('front-end/master',$data);
    }

}    