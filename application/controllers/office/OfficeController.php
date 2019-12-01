<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OfficeController extends CI_Controller {
    public function __construct()
    {
	    parent::__construct();
	    $this->load->library('form_validation');
        $this->load->model('OfficeModel');
        $this->load->library('ion_auth');
        $this->load->helper('language');
        $this->lang->load('auth');

        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
    }
    //index method 
    public function index(){
        $data=array();

        $data['content']=$this->load->view('front-end/office/index',$data,true);
        $this->load->view('front-end/master', $data);
    }


    
}