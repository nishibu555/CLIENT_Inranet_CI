<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChronologicalsController extends CI_Controller {
        public function __construct()
    {
	    parent::__construct();
	    $this->load->library('form_validation');
        $this->load->model('ChronologicalModel');
        $this->load->library('ion_auth');
        $this->load->helper('language');
        $this->lang->load('auth');

        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
    }
    
    public function chronologicals($id = '')
    {
        if($id == ''){
           $data = array();
             
            $this->db->select('*');
            $this->db->from('personnel');
            $this->db->where(['status'=>'active', 'rank'=>'student']);
            $this->db->order_by('id', 'desc');
            $query= $this->db->get();
            
            
            
            $data['all_datas'] =  $query->result();
            $data['content']=$this->load->view('front-end/record/all_chronologicals', $data, true);
            $this->load->view('front-end/master', $data);
            
        } else {
            $data = array();
            $data['student_id'] = $id;
            $student_name = $this->db->query('SELECT * FROM `personnel` WHERE `id`='.$id)->row();
            $data['student_name']= $student_name->fname.' '.$student_name->lname;
            $data['content']=$this->load->view('front-end/record/chronologicals', $data, true);
            $this->load->view('front-end/master', $data);         
        }
    }   
//get data method
    public function get_data()
    {
        $id = $_POST['id'];
        $student_chronological = $this->db->query('SELECT * FROM `student_chronological_entry` WHERE `student_id`='.$id.' ORDER BY `id` DESC')->result();
        $html = '';
        foreach($student_chronological as $value){
            $html .= '<div class="activity-content">';
            $html .= '<div class="content_label">';
            $html .= '<label><span>'. date('m/d/Y',strtotime($value->created_at)).'</span> Code '.$value->label_check.'</span></span> by <span>'. $value->author.'</span></label>';
            $html .= '</div>';
            $html .= '<p>'. $value->entry_des.'</p>';
            $html .= '</div>';
        }
        echo json_encode($html);

    }
    //save method 
    public function save(){

        $this->form_validation->set_rules('entry_des', 'Entry Description', 'required');
        if (empty($_POST['label_check']))
        {
            $this->form_validation->set_rules('label_check', 'Check value', 'required');
        }
        $response = array(
            'success'=> false,
            'error'=> false,
            'msg'=>''
        );

        if ($this->form_validation->run() === true) {

            $std_entry=array();
            $std_entry['entry_des']      = $this->input->post('entry_des',true);
            if( !empty($_POST['label_check'])){
                $std_entry['label_check']      = implode(', ', $_POST['label_check']);
            }
            $user = $this->ion_auth->user()->row();
            $std_entry['created_at'] = date("d-m-Y h:i:sa");
            $std_entry['author'] = $user->first_name.' '.$user->last_name;
            $std_entry['student_id'] = $_POST['student_id'];
            
            $this->ChronologicalModel->InsertData('student_chronological_entry',$std_entry);

            $response['error']=false;
            $response['success']=true;
               $student_chronological = $this->db->query('SELECT * FROM `student_chronological_entry` WHERE `student_id`='.$_POST['student_id'].' ORDER BY `id` DESC')->result();
            $html = '';
            foreach($student_chronological as $value){
                $html .= '<div class="activity-content">';
                $html .= '<div class="content_label">';
                $html .= '<label><span>'. date('d/m/Y',strtotime($value->created_at)).'</span> Code '.$value->label_check.'</span></span> by <span>'. $value->author.'</span></label>';
                $html .= '</div>';
                $html .= '<p>'. $value->entry_des.'</p>';
                $html .= '</div>';
            }
            $response['html']= $html;
            $response['msg']="Chronologcal Successfully added";
        }else
        {
            $response['error']=true;
            $response['error_list']=$this->form_validation->error_array();
        }
        echo json_encode($response);
    }

}
           
