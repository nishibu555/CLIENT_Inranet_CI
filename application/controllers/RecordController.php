<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RecordController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model(['RegistrationModel', 'StudentModel', 'ContractModel']);
		$this->load->library('ion_auth');
		$this->load->helper('language');
		$this->lang->load('auth');

		if (!$this->ion_auth->logged_in()) {
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
	}


	public function logIn()
	{
		//        $data = array();
		//        $data['content']=$this->load->view('front-end/login',$data,true);
		$this->load->view('front-end/login');
	}
	public function Record()
	{
		$data = array();
		$data['content'] = $this->load->view('front-end/record/records', $data, true);
		$this->load->view('front-end/master', $data);
	}

	public function Dashboard()
	{
		$data = array();
		$data['content'] = $this->load->view('front-end/dashboard', $data, true);
		$this->load->view('front-end/master', $data);
	}
	
	public function StudentTestScore()
	{
		$data = array();
		$StudentData = array();
		$StudentScoreData = array();
		
        $students = $this->db->where(['status' => 'active', 'rank'=>'student'])
		                            ->select('*')
		                            ->from('personnel')
		                            ->order_by('id', 'desc')
		                            ->get()
		                            ->result();
       
        
        foreach ($students as $student)
        {
            $StudentData['id'] = $student->id;
            $StudentData['image'] = $student->image;
            $StudentData['name'] = $student->fname.' '.$student->lname;
            $gsnc = $this->StudentModel->getGSNC('academics_scores',$student->id);
            if (!empty($gsnc))
            {
                $gsnc_value = count($gsnc);
                $StudentData['progress'] =$gsnc_value;
                if ($StudentData['progress']==15) $StudentData['progress']='Course Complete';

                if ($StudentData['progress']!='Course Complete'){
                    $StudentData['progress'] .= ' Course';
                    if ($StudentData['progress']!=1) $StudentData['progress'] .= 's';
                    $StudentData['progress'] .= ' Complete';
                }
            }else
            {
                $StudentData['progress'] = '0 course Complete';
            }
            $StudentScoreData[] = $StudentData;
        }
        $data['students_score'] =$StudentScoreData;
        
		$data['courses'] = $this->db->get('academics_gsnc')->result();
		
		$data['content'] = $this->load->view('front-end/record/new-test-score', $data, true);
		$this->load->view('front-end/master', $data);
	}
	

    public function StudentGSPS($std_id)
    {
        $data = array();
        
        $student = $this->db->select('*')->where(['id'=> $std_id, 'rank'=>'student'])->get('personnel')->row();

        $studentsData['name']=$student->fname.' '.$student->lname;
        $studentsData['student_id']=$student->id;
        $studentsData['std_img']=$student->image;
        $studentsData['phase']=$student->current_phase;
        
        if (!empty($student->doe) && ($student->doe != '0000-00-00')) $studentsData['doe'] = date('n/j/y', strtotime($student->doe));
        
        if (!empty($student->counselor_id))
        {
            $condition = ['id' => $student->counselor_id];
            $counselor = $this->StudentModel->getOneRow('counselors',$condition);
            $studentsData['nickname'] = $counselor->nickname;
        }
        $gsnc = $this->StudentModel->getGSNC('academics_scores',$student->id);
        if (!empty($gsnc))
        {

            $gsnc_value = count($gsnc);
            $studentsData['gsnc'] =$gsnc_value;
            if ($gsnc_value == 15)
            {
                $studentsData['gsnc'] = 'Course<br>Complete';
            }
        }else
        {
            $studentsData['gsnc'] = 0;
        }

        $psnc = $this->StudentModel->getPSNC($student->id);
        if (!empty($psnc))
        {
            $psnc_value = count($psnc);
            $studentsData['psnc'] =$psnc_value;
        }else
        {
            $studentsData['psnc'] =0;
        }
        
        return $studentsData;

    }
    
    

	public function Academic()
	{
	    
	    
	    $active_students=$this->db->where(['status' => 'active', 'rank'=>'student'])
		                            ->select('*')
		                            ->from('personnel')
		                            ->order_by('id', 'desc')
		                            ->get()
		                            ->result();
       
       if(!empty($active_students))	{
           foreach ($active_students as $as)
            {
                $active_student['id']=$as->id;
                $active_student['image']=$as->image;
                $active_student['name']=$as->fname." ".$as->lname;
                $active_student['doe']=$as->doe;
                $active_student['current_phase']=$as->current_phase;
                $active_student['gsnc']=$this->StudentModel->count_gsnc($as->id);
                $active_student['psnc']=$this->StudentModel->count_psnc($as->id);
                
                $c=$this->db->where('id', $as->counselor_id)->get('counselors')->row();
                if(!empty($c)){
                    $active_student['counselor']=$c->nickname;
                }else{
                    $active_student['counselor']= '';
                }
                
                $std[] =$active_student;
            }
        }
        
        $data=array();
        $data['std'] = $std;	                            
		$data['content'] = $this->load->view('front-end/record/academic', $data, true);
		$this->load->view('front-end/master', $data);
	
	}


	public function studentManager()
	{
	   
        $studentAllInfo = array();
        $informationOfStdManager = array();
        
        
		$condition1 = ['acceptance_flag' => 0, 'isCompleteRegistration'=>1];
		$data = array();
		$data['incoming_student'] = $this->RegistrationModel->get_result('student_info', $condition1);
		
		$data['archive_student'] = $this->db->where(['rank'=>'student', 'status !=' => 'active'])->order_by('fname', 'asc')->get('personnel')->result();
		
		$active_students = $this->db->where(['status' => 'active', 'rank'=>'student'])
		                            ->select('*')
		                            ->from('personnel')
		                            ->order_by('lname')
		                            ->get()
		                            ->result();

		if (!empty($active_students))
        {
            foreach ($active_students as $active_student)
            {   
                $studentAllInfo['id'] = $active_student->id;
                $studentAllInfo['entry_date'] = $active_student->doe;
                $studentAllInfo['grad_date'] = $active_student->dog;
                $studentAllInfo['name'] = $active_student->fname.' '.$active_student->lname;
                $studentAllInfo['court_ordered_flag'] = $active_student->court_ordered_flag;
                $studentAllInfo['image'] = $active_student->image;
                $studentAllInfo['current_phase'] = $active_student->current_phase;
                $studentAllInfo['court_ordered_flag'] = $active_student->court_ordered_flag;
                
                $counselor = $this->db->where('id', $active_student->counselor_id)->get('counselors')->row();
                $studentAllInfo['counselor_name']= @$counselor->nickname;
                
                $residence=$this->db->where('personnel_id', $studentAllInfo['id'])->get('beds')->row();
                $studentAllInfo['residence']= @$residence->column_id;
                
    
                $gsnc_psnc_value = $this->StudentGSPS($active_student->id);
                $studentAllInfo['gsnc'] = $this->StudentModel->count_gsnc($active_student->id);;
                $studentAllInfo['psnc'] = $this->StudentModel->count_psnc($active_student->id);;

                $informationOfStdManager[] =$studentAllInfo;
            }
        }

        $data['informationOfStdManagers'] = $informationOfStdManager;

        $data['content'] = $this->load->view('front-end/record/student_manager', $data, true);
		$this->load->view('front-end/master', $data);
	}

	public function delete_student()
	{
		$this->db->set('status', 'delete');
		$this->db->where('id', $_POST['id']);
		$this->db->update('personnel');
		$response['msg'] = "Student Successfully Deleted";
		echo json_encode($response);
	}

	public function studentDeatil($id)
	{
	    $data =array();

        $data = $this->StudentGSNCPSNCValue($id);
        
		$data['student_info'] = $this->db->where('id', $id)->get('personnel')->row();
		
		$residence=$this->db->where('personnel_id', $id)->get('beds')->row();
		$data['residence'] = @$residence->column_id;
       
		 
        $data['student_activity'] = $this->db->select('*')
                        ->from('activity_tags')
                        ->join('activity_log','activity_log.id=activity_tags.activity_id')
                        ->where('activity_tags.student_id',$id)
                        ->get()
                        ->result();
            
		
		
		$data['student_chronological'] = $this->db->query('SELECT * FROM `student_chronological_entry` WHERE `student_id`=' . $id . ' ORDER BY `id` DESC')->result();
		$data['student_discipline'] = $this->db->query('SELECT * FROM `discipline` WHERE `student_id`=' . $id . ' ORDER BY `id` DESC')->result();
		$data['counselors'] = $this->db->query('SELECT * FROM `counselors` WHERE `delete_flag`!=1 ORDER BY `id` DESC')->result();
		
		$data['content'] = $this->load->view('front-end/record/student_detail', $data, true);
		$this->load->view('front-end/master', $data);
	}

	public function studentRegistration()
	{

		$this->load->view('front-end/record/student_registration');
	}

    public function StudentGSNCPSNCValue($std_id)
    {
        $ContractSum = $this->db->query('select count(distinct gsnc_id) as `count`, sum(score) as `sum` from academics_scores where student_id=\''.$std_id.'\' and `score`>=\'70\'')->row();
        $data['gsnc_books']= $ContractSum->count;

        if ($data['gsnc_books']>0)
        {
            $data['gsnc_average'] = round($ContractSum->sum/$data['gsnc_books'],1).'%';
        }
        if ($data['gsnc_books']==15)
        {
            $data['gsnc_books'] = 'Course Complete';
        }
        else {

            if ($ContractSum->count !=1) $data['gsnc_books'] .= 's';
            $data['gsnc_books'] .= ' Book';
            $data['gsnc_books'] .= ' Complete';
        }

        $contract = $this->db->query('select count(student_id) as `count` from academics_contracts where student_id=\''.$std_id.'\' and date_completed!=\'0000-00-00\' and date_completed is not null and delete_flag=\'0\'')->row();

        $data['contracts'] =$contract->count;
        $data['contracts'] .= ' Contract';
        if ($contract->count !=1) $data['contracts'] .= 's';
        $data['contracts'] .= ' Complete';

        return $data;
    }

	public function StudentGSNCPSNC($std_id)
	{
		$data = array();
        $data['gsnc_psnc'] = $this->StudentGSNCPSNCValue($std_id);
        
        $condition = ['id' => $std_id, 'rank'=>'student'];
		$student_name = $this->StudentModel->getOneRow('personnel', $condition);
		$data['student_id'] = $student_name->id;
		$data['student_name'] = $student_name->fname . ' ' . $student_name->lname;
		$data['gsnc_values'] = $this->StudentModel->gsnc_value($std_id);
		$data['contracts_info'] = $this->ContractModel->getMultipleRow('academics_contracts', $std_id);
		$data['content'] = $this->load->view('front-end/record/student-gsnc-psnc', $data, true);
		$this->load->view('front-end/master', $data);
	}
	
	public function SaveStudentTestScore()
	{
		$id = $this->ion_auth->logged_in();
		$condition  = ['id' => $id];
		$user_name  = $this->StudentModel->getOneRow('users', $condition);
		$author = $user_name->first_name;
		$course_id = $this->input->post('course_name', true);

		$response = array(
			'success' => false,
			'error' => false,
			'msg' => ''
		);
		$test = $this->input->post('test_score', true);
		
		$n = count($test);
		
		for ($i = 0; $i < $n; $i++) {
		    
			$std_score = array();
			$std_score['gsnc_id'] = $course_id;
			$std_score['author'] = $author;
			
			if( !empty($_POST['test_date'][$i]) &&
			    !empty($_POST['test_score'][$i])
			    ){
		
    			  $std_score['date'] = $this->input->post('test_date', true)[$i];
    			  $std_score['score'] = $this->input->post('test_score', true)[$i];
        		  $std_score['student_id'] = $this->input->post('std_id', true)[$i];
        		  
        		    $result=$this->db->where('student_id',	$std_score['student_id'])->get('academics_scores')->row();
        		
            		if($result){
                      $this->db->where('student_id',	$std_score['student_id'] )->update('academics_scores', $std_score);
                    }
                    else{
                         $this->db->insert('academics_scores', $std_score);
                    }
    		}
		}

		$response['error'] = false;
		$response['success'] = true;
		$response['msg'] = "Student Score Successfully added";

		echo json_encode($response);
	}

	public function SaveStudentActivity()
	{

		$this->form_validation->set_rules('std_activity', 'Student Activity', 'required');

		if (empty($_POST['std_name']) || $_POST['std_name'] == "Student Name") {
			$this->form_validation->set_rules('std_name', 'Student Name', 'required');
		}

		$response = array(
			'success' => false,
			'error' => false,
			'msg' => ''
		);

		if ($this->form_validation->run() === true) {

			$std_activity = array();
			$std_activity['std_activity']       = $this->input->post('std_activity', true);
			$std_activity['std_name']           = $this->input->post('std_name', true);

			$this->RegistrationModel->InsertData('student_activity', $std_activity);

			$response['error'] = false;
			$response['success'] = true;
			$response['msg'] = "Student Discipline Activity Successfully added";
		} else {
			$response['error'] = true;
			$response['error_list'] = $this->form_validation->error_array();
		}
		echo json_encode($response);
	}



	//added by nishi 
	public function incoming_student_detail($std_id)
	{
		$condition = ['student_id' => $std_id];
		$data = array();
		$data['student_id'] = $std_id;
		$condition = ['acceptance_flag' => 0];
		$data['incoming_student'] = $this->RegistrationModel->get_result('student_info', $condition);
		$data['student_info'] = $this->RegistrationModel->get_row('student_info', $condition);
		$data['content'] = $this->load->view('front-end/incomingStudent/incoming_student_detail', $data, true);
		$this->load->view('front-end/master', $data);
	}


	public function page_1($std_id)
	{

		$condition = ['student_id' => $std_id];

		$data = array();
		$data['student_info'] = $this->RegistrationModel->get_row('student_info', $condition);
		$data['social_security'] = $this->RegistrationModel->get_row('std_social_security', $condition);
		$data['appearance'] = $this->RegistrationModel->get_row('std_appearance', $condition);
		$data['ethnic_background'] = $this->RegistrationModel->get_row('std_ethnic_background', $condition);
		$data['emergency_contact'] = $this->RegistrationModel->get_row('std_emergency_contact', $condition);
		$data['reference'] = $this->RegistrationModel->get_row('std_reference', $condition);
		$data['personality_info'] = $this->RegistrationModel->get_row('std_personality_info', $condition);
		$this->load->view('front-end/incomingStudent/page1', $data);
	}

	public function page_2($std_id)
	{
		$condition = ['student_id' => $std_id];

		$data = array();
		$data['family_member'] = $this->RegistrationModel->get_result('std_family_member', $condition);
		$data['std_family_history'] = $this->RegistrationModel->get_row('std_family_history', $condition);
		$this->load->view('front-end/incomingStudent/page2', $data);
	}

	public function page_3($std_id)
	{
		$condition = ['student_id' => $std_id];

		$data = array();
		$data['marital_history'] = $this->RegistrationModel->get_row('std_marital_history', $condition);
		$data['children_info'] = $this->RegistrationModel->get_row('std_children_info', $condition);
		$data['children'] = $this->RegistrationModel->get_result('std_children', $condition);
		$data['abuse_history'] = $this->RegistrationModel->get_row('std_abuse_history', $condition);
		$data['military_history'] = $this->RegistrationModel->get_row('std_military_history', $condition);
		$this->load->view('front-end/incomingStudent/page3', $data);
	}

	public function page_4($std_id)
	{
		$condition = ['student_id' => $std_id];

		$data = array();
		$data['legal_history'] = $this->RegistrationModel->get_row('std_legal_history', $condition);
		$data['crime_history'] = $this->RegistrationModel->get_result('std_crime_history', $condition);
		$data['in_prison'] = $this->RegistrationModel->get_result('std_in_prison', $condition);
		$data['social_involvement_history'] = $this->RegistrationModel->get_row('std_social_involvement_history', $condition);
		$this->load->view('front-end/incomingStudent/page4', $data);
	}

	public function page_5($std_id)
	{
		$condition = ['student_id' => $std_id];

		$data = array();
		$data['financial_status'] = $this->RegistrationModel->get_row('std_financial_status', $condition);
		$data['academic_info'] = $this->RegistrationModel->get_row('std_academic_info', $condition);
		$data['training_list'] = $this->RegistrationModel->get_result('std_training_list', $condition);
		$data['std_life_event'] = $this->RegistrationModel->get_row('std_life_event', $condition);
		$this->load->view('front-end/incomingStudent/page5', $data);
	}

	public function page_6($std_id)
	{
		$condition = ['student_id' => $std_id];

		$data = array();
		$data['std_occupational_history'] = $this->RegistrationModel->get_row('std_occupational_history', $condition);
		$data['std_most_recent_job'] = $this->RegistrationModel->get_result('std_most_recent_job', $condition);
		$data['medical_history'] = $this->RegistrationModel->get_row('std_medical_history', $condition);
		$this->load->view('front-end/incomingStudent/page6', $data);
	}

	public function page_7($std_id)
	{
		$condition = ['student_id' => $std_id];

		$data = array();
		$data['medical_history'] = $this->RegistrationModel->get_row('std_medical_history', $condition);
		$data['spiritual_history'] = $this->RegistrationModel->get_row('std_spiritual_history', $condition);
		$data['drug_history'] = $this->RegistrationModel->get_row('std_drug_history', $condition);
		$data['physicial_info'] = $this->RegistrationModel->get_row('std_physicial_info', $condition);
		$this->load->view('front-end/incomingStudent/page7', $data);
	}

	public function page_8($std_id)
	{
		$condition = ['student_id' => $std_id];

		$data = array();
		$data['problem_definition'] = $this->RegistrationModel->get_row('std_problem_definition', $condition);
		$this->load->view('front-end/incomingStudent/page8', $data);
	}
	
	

	public function activate_student($std_id)
	{  
	   $std= $this->db->select('*')->where('student_id', $std_id)->get('student_info')->row();
	   
	   $social_security=$this->db->select('date_of_birth')->where('student_id', $std_id)->get('std_social_security')->row();
	   
	   $mar=$this->db->select('current_marital_status, current_spouse_name')->where('student_id', $std_id)->get('std_marital_history')->row();
       
       $acd=$this->db->select('highest_grade')->where('student_id', $std_id)->get('std_academic_info')->row();
       
       $std_data=array();
       $std_data['acceptance_flag']=1;
       $this->db->where('student_id', $std_id)->update('student_info', $std_data);
       
       $data=array();
       $data['student_id']=$std_id;
       $data['lname']=$std->first_name;
       $data['fname']=$std->last_name;
       $data['ssn']=$social_security->social_security_number;
       $data['dob']=$social_security->date_of_birth;
       $data['status']='active';
       $data['rank']='student';
       $data['doe']=date('m/d/Y');
       $data['dog']=null;
       $data['dod']=null;
       $data['current_phase']=$std->current_phase;
       $data['nickname']=null;
       $data['counselor_id']=null;
       $data['app_id']=null;
       $data['court_ordered_flag']=null;
       if($mar->current_marital_status !='single'){
          $data['married_flag']=1; 
       }
       else{
          $data['married_flag']=0; 
       }
       $data['spousename']=$mar->current_spouse_name;
       $data['school']=$acd->	highest_grade;
       $data['in_house_flag']=null;
       
       $this->db->insert('personnel', $data);
       
       redirect('student_manager');
	}




	//nishi--start
	public function discharge_student($id)
	{
		$data = array();
		$data['status'] = $this->input->post('status', true);
		$this->db->where('id', $id)->update('personnel', $data);

		redirect('student_detail/' . $id);
	}

	//update student information 
	public function UpdateInfo()
	{

			$name = $_POST['name'];
			$data = $_POST['data'];
			$student_id = $_POST['student_id'];
			$this->db->set($name, $data, TRUE);
			$this->db->where('id', $student_id);
			$this->db->update('personnel');

		echo json_encode($this->db->last_query());
	}
    //image_upload
   public function resizeImage($filename)

   {
	
      $source_path ='./assets/images/'. $filename;
     

      $target_path = './assets/images/personnel/';

      $config_manip = array(

          'image_library' => 'gd2',

          'source_image' => $source_path,

          'new_image' => $target_path,

          'maintain_ratio' => false,

          'thumb_marker' => '',

          'create_thumb' => TRUE,

           'width' =>150,

           'height' =>150

      );


      $this->load->library('image_lib', $config_manip);

      if (!$this->image_lib->resize()) {

          echo $this->image_lib->display_errors();

      }
      $this->image_lib->clear();
       unlink($source_path);

   }
    public function image_upload(){
        $student_id = $_POST['student_id'];
         if (!empty($_FILES["image"]["name"])) {
	       if(isset($_FILES["image"]["name"]))
	          {
	               $config['upload_path'] = './assets/images/';
	               $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $new_name = $student_id.'.jpg';
                    $config['file_name'] = $new_name;
	              
           if ($_FILES["image"]["size"]==0)
           {

               $error =  'File size must be less then 2MB.'; 
             echo json_encode(array('msg' => $error, 'success' => false));
           }else
           {
               $config['max_size']      = 2048;
           }
	               $this->load->library('upload', $config);
	               
	               if(!$this->upload->do_upload('image'))
	               {
	                   $error =  'Please Select Image'; 
                        echo json_encode(array('msg' => $error, 'success' => false));
	               }
	               else
	               {
                       $path = './assets/images/personnel/'.$new_name;
                       unlink($path); 
	                    $data = $this->upload->data();
                        $image= $data['file_name'];
	                    $this->resizeImage($data['file_name']);
	                    
                 $this->db->set('image', 1);
                 $this->db->where('id',$student_id);
                 $result = $this->db->update('personnel');
               if ($result)
               {
 
                   $response= 'Image Added Successfully.';
                   echo json_encode(array('msg' => $response,'image'=>$new_name, 'success' => true));

               } else{
                    $error =  'Please Select Image'; 
                    echo json_encode(array('msg' => $error, 'success' => false)); 
               }
	               }
                

	          }
	    } else {
	        $error =  'Please Select Image'; 
             echo json_encode(array('msg' => $error, 'success' => false));
	    } 
         
    }
}
