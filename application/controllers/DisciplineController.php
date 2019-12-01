<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DisciplineController extends CI_Controller {
   
    public function __construct()
    {
	    parent::__construct();
	    $this->load->library('form_validation');
        $this->load->model('ChronologicalModel');
        $this->load->library(['ion_auth','pagination']);
        $this->load->helper('language');
        $this->lang->load('auth');

        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
    }
    
    public function StudentDiscipline($id = '')
     {
        if($id == ''){
           $data = array();

           $data['all_datas']=$this->db->query('select personnel.image, personnel.lname, personnel.fname, discipline.`id` , discipline.student_id, discipline.status, discipline.date_process, discipline.date_due, discipline.discipline from (discipline left join personnel on (discipline.student_id=personnel.id)) where personnel.rank= "student" and personnel.status="active" and discipline.status!="Resolved" and discipline.delete_flag=0 order by lname asc, fname asc, `id` asc')->result();
              
            $res=$this->db->query('select personnel.image, personnel.lname, personnel.fname, discipline.`id` , discipline.student_id, discipline.status, discipline.date_process, discipline.date_due, discipline.discipline from (discipline left join personnel on (discipline.student_id=personnel.id)) where personnel.rank= "student" and personnel.status="active" and discipline.status!="Resolved" and discipline.delete_flag=0 group by discipline.student_id')->result();
            $data['num_of_student_on_dis']=count($res);

            if (count($data['all_datas']) > 0 ){ // find percentage
              $res2 = $this->db->query('select discipline.student_id from (discipline left join personnel on (discipline.student_id=personnel.id)) where personnel.rank="student" and personnel.status="active" and discipline.status != "Resolved" and discipline.delete_flag=0 group by discipline.student_id')->result();

              $res3 =  $this->db->query('select id from personnel where rank="student" and status="active"')->result();

             $data['percentage'] = round(100*count($res2)/count($res3));
              $num_students_on_discipline = 1;
            }
            else {
             $data['percentage'] = 0;
              $num_students_on_discipline = 0;
            }  
              
            $data['pending_discipline'] = $this->db->query('select discipline.`id`, discipline.date_submit, personnel.fname, personnel.lname from discipline,personnel where discipline.student_id=personnel.`id` and (date_process="0000-00-00" or date_process is null) and personnel.status="active" and personnel.rank="student" and discipline.delete_flag=0 order by personnel.lname asc,`id` asc')->result();
              

            $data['resolve_discipline'] = $this->db->query('select discipline.`id`, discipline.date_submit, personnel.fname, personnel.lname from discipline,personnel where discipline.student_id=personnel.`id` and discipline.status="Resolved" and personnel.status="active" and personnel.rank="student" and discipline.delete_flag=0 order by personnel.lname asc,`id` asc')->result();

           $data['content']=$this->load->view('front-end/record/all_disciplines', $data, true);
            $this->load->view('front-end/master', $data);
            
        } else {
            $data = array();
              $data['student_id'] = $id;
            $data['students'] = $this->db->query("SELECT * FROM personnel WHERE `status` !='delete' ")->result();
        
            $data['content']=$this->load->view('front-end/record/student-discipline', $data, true);
            $this->load->view('front-end/master', $data);       
        }
        
    }
    //store method
    public function store()
    {
         $this->form_validation->set_rules('discipline_des', 'Entry Description', 'required');
        $response = array(
            'success'=> false,
            'error'=> false,
            'msg'=>''
        );

        if ($this->form_validation->run() === true) {

            $std_entry=array();
            $std_entry['infraction']  = $this->input->post('discipline_des',true);
   
         
            $std_entry['date_submit'] = date("d-m-Y h:i:sa");
            $std_entry['student_id'] = $_POST['student_id'];
            
            $this->ChronologicalModel->InsertData('discipline',$std_entry);

            $response['error']=false;
            $response['success']=true;
            $response['msg']="Discipline Added Successfully!";
        }else
        {
            $response['error']=true;
            $response['error_list']=$this->form_validation->error_array();
        }
        echo json_encode($response);
    }
    
    public function disciplineDetails($disc_id){        

        $data=array();
        $data['student_id'] = $this->db->select('student_id')->where('id', $disc_id)->get('discipline')->row()->student_id;
        
        $data['dis_detail']=$this->db->query('select discipline.*,personnel.fname,personnel.lname,users.first_name from (discipline left join personnel on discipline.student_id=personnel.`id` left join users on discipline.infraction_author=users.username) where discipline.`id`='.$disc_id.' limit 1')->row();


        $result2 = $this->db->query('select count(*) as `position` from discipline where `id` <= '.$disc_id.' and student_id='.$data['student_id'].' and delete_flag=0')->result();
        $data['position'] = $result2[0]->position; //position is page number

     

        $data['content']=$this->load->view('front-end/record/discipline_details', $data, true);
        $this->load->view('front-end/master', $data);
    }
    

    public function new_write_up_discipline(){
        $data=array();
        $data['new_write_up_list']=$this->db->where(['status' => 'active'])->get('personnel')->result();
        $data['content']=$this->load->view('front-end/record/new_write_up_discipline', $data, true);
        $this->load->view('front-end/master', $data);
    }

    public function save_new_write_up_discipline(){
          $data=array();
          $data['infraction']=$this->input->post('discipline_des', true);
          $data['student_id']=$this->input->post('student_id', true);
          $this->db->set('date_process', date('d-m-Y'));
          $this->db->set('status', 'Pending');
          $this->db->insert('discipline', $data);
          $last_id=$this->db->insert_id();

          redirect('students/discipline/details/'.$data['student_id']);
    }
    //get discipline edit data
    public function editDisciplineData(){
        $id = $_POST['id'];
        $response = $this->db->query("SELECT * FROM discipline WHERE `id`=$id ")->row();
        echo json_encode($response);
    }    
    //store discipline edit data
    public function store_edit_discipline(){
        if($_POST['action'] == 'admin'){
            $this->db->set('discipline', $_POST['admin_discipline']);
            $this->db->set('date_due', $_POST['due_date']);
            $this->db->set('date_process', date('d-m-Y'));
            $this->db->set('status', 'Open');
            $this->db->where('id', $_POST['id']);
            $result = $this->db->update('discipline');

            if (isset($result)) {
                $response['success'] = true;
                $response['msg'] = "Discipline Successfully added";
                $response['action'] = 'reload';
                $response['html'] = $_POST['admin_discipline'];
            }
        } else{
            
        $this->db->set('discipline', $_POST['admin_discipline']);
		$this->db->set('date_due', $_POST['due_date']);
		$this->db->set('date_process', date('d-m-Y'));
		$this->db->where('id', $_POST['id']);
		$result = $this->db->update('discipline');

		if (isset($result)) {
			$response['success'] = true;
			$response['msg'] = "Discipline Successfully added";
			$response['html'] = $_POST['admin_discipline'];
		}
        }

		echo json_encode($response);
    }
    //edit note data
    function editNoteData(){
        $id = $_POST['id'];
        $response = $this->db->query("SELECT * FROM discipline WHERE `id`=$id ")->row();
        echo json_encode($response);
    }    
    //store data
    function store_edit_note(){
        $this->db->set('notes', $_POST['committee_notice']);
		$this->db->where('id', $_POST['id']);
		$result = $this->db->update('discipline');

		if (isset($result)) {
			$response['success'] = true;
			$response['msg'] = "Discipline Successfully added";
			$response['html'] = $_POST['committee_notice'];
		}

		echo json_encode($response);
    }
    //revert method
    function revert_Discipline(){

       if($_POST['status'] == 'Pending'){
         $this->db->set('status', 'Pending');
         $this->db->set('date_process', null);
         $this->db->set('date_due', null);
         $this->db->set('notes', null);
         $this->db->set('discipline', null);
         $this->db->where('id', $_POST['id']);
         $result = $this->db->update('discipline');
       }
       else{
        if($_POST['status'] == 'Open'){
             $this->db->set('status', 'Open');
             $this->db->set('date_complete', null);
             $this->db->where('id', $_POST['id']);
             $result = $this->db->update('discipline');
        }
       }

  		if (isset($result)) {
  			$response['success'] = true;
  			$response['msg'] = "Correction Successfully Revert";
  		}

  		echo json_encode($response);
    }    
    //revert method
    function resolved_Discipline(){
        $this->db->set('status', 'Resolved');
        $this->db->set('date_complete', date('Y-m-d'));
		$this->db->where('id', $_POST['id']);
		$result = $this->db->update('discipline');

		if (isset($result)) {
			$response['success'] = true;
			$response['msg'] = "Correction Successfully Revert";
		}

		echo json_encode($response);
    }    
    //delete_Discipline method
    function delete_Discipline(){
        $this->db->set('delete_flag', '1');
		$this->db->where('id', $_POST['id']);
		$result = $this->db->update('discipline');

		if (isset($result)) {
			$response['success'] = true;
			$response['msg'] = "Discipline Successfully deleted";
		}

		echo json_encode($response);
    }
}