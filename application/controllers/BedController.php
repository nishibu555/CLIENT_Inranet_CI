<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BedController extends CI_Controller {
    public function __construct()
    {
	    parent::__construct();
	    $this->load->library('form_validation');
        $this->load->model('BedModel');
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
        $data['all_active_data'] = $this->db->query("SELECT * FROM beds, personnel where personnel.id = beds.personnel_id AND `status`!= 'delete' AND `in_house_flag` = 1 ORDER BY order_id ASC")->result();

        $column_id=array();
        foreach ( $data['all_active_data'] as $value) {
           array_push($column_id, $value->column_id);
        }
        $data['column_id']=$column_id;

        $data['content']=$this->load->view('front-end/record/bed_assignment',$data,true);
        $this->load->view('front-end/master', $data);
    }
    
    //update order method
    public function order_update(){
        if(isset($_POST['id'])){
              if($_POST['column_id'] != ''){
                  $column_id = $_POST['column_id'];
              } else{
                  $column_id ='unplaced' ;
              }
                $this->db->set('column_id', $column_id);
                $this->db->where('personnel_id', $_POST['id']);
                $this->db->update('beds');
                echo json_encode('success');
        }        
       
    }
    
}