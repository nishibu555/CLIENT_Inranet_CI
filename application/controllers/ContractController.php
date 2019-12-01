<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContractController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('ContractModel');
        $this->load->library('ion_auth');
        $this->load->helper('language');
        $this->lang->load('auth');

        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
    }
    public function StudentNewContract($std_id)
    {
        $data=array();
        $contract_value['student_id'] = $std_id;
        $contract_id = $this->ContractModel->InsertData('academics_contracts',$contract_value);
//        $contract_id=1059;
        $condition = ['id'=> $contract_id];
        $data['contract_info'] =$this->ContractModel->getOneRow('academics_contracts',$condition);
        $condition = ['id'=> $std_id];
        $data['student_info'] =$this->ContractModel->getOneRow('personnel',$condition);
        $data['contract_id'] =$contract_id;
        $data['content']=$this->load->view('front-end/record/contract',$data,true);
        $this->load->view('front-end/master', $data);
    }
    public function update_assign_value($contract_id)
    {
        $data = array();
        $condition = ['id'=> $contract_id];
        $data['status']       = 'Assigned';
        $data['date_assigned']       = date('Y-m-d');
        $result =$this->ContractModel->UpdateData('academics_contracts', $condition,$data);
        $condition = ['id'=> $contract_id];
        $info  =$this->ContractModel->getOneRow('academics_contracts',$condition);
        $std_id = $info->student_id;
        return redirect('student-contract'.'/'.$std_id.'/'.$contract_id);

    }
    public function update_complete_value($contract_id)
    {
        $data = array();
        $condition = ['id'=> $contract_id];
        $data['status'] = 'Completed';
        $data['date_completed']       = date('Y-m-d');
        $result =$this->ContractModel->UpdateData('academics_contracts', $condition,$data);
        $condition = ['id'=> $contract_id];
        $info  =$this->ContractModel->getOneRow('academics_contracts',$condition);
        $std_id = $info->student_id;
        return redirect('student-contract'.'/'.$std_id.'/'.$contract_id);
    }
    public function update_unassign_value($contract_id)
    {
        $data = array();
        $condition = ['id'=> $contract_id];
        $data['status'] = 'Unassigned';
        $data['date_assigned']       = '';
        $result =$this->ContractModel->UpdateData('academics_contracts', $condition,$data);
        $condition = ['id'=> $contract_id];
        $info  =$this->ContractModel->getOneRow('academics_contracts',$condition);
        $std_id = $info->student_id;
        return redirect('student-contract'.'/'.$std_id.'/'.$contract_id);
    }
    public function update_reassign_value($contract_id)
    {
        $data = array();
        $condition = ['id'=> $contract_id];
        $data['status'] = 'Assigned';
        $data['date_assigned']       = date('Y-m-d');
        $data['date_completed']       = '';
        $result =$this->ContractModel->UpdateData('academics_contracts', $condition,$data);
        $condition = ['id'=> $contract_id];
        $info  =$this->ContractModel->getOneRow('academics_contracts',$condition);
        $std_id = $info->student_id;
        return redirect('student-contract'.'/'.$std_id.'/'.$contract_id);
    }
    
    
    public function StudentContract($std_id,$contract_id){
        $data=array();

        $data['contract_info'] = $this->db->where('id', $contract_id)->get('academics_contracts')->row();
        
        $data['student_info'] =$this->db->where('id', $std_id)->get('personnel')->row();
        
        $data['content']=$this->load->view('front-end/record/student-contract',$data,true);
        $this->load->view('front-end/master', $data);
    }
    
    
    public function DeleteContract($contract_id)
    {
        $data = array();
        $data['delete_flag'] =1;
        $condition = ['id'=> $contract_id];
        $result =$this->ContractModel->UpdateData('academics_contracts', $condition,$data);
        return redirect('academic');
    }
    public function update_scripture_worksheet()
    {
        $data = array();
        $contract_id            = $this->input->post('id', TRUE);
        $value  = $this->input->post('scripture_worksheet', TRUE);
        if ($value == 'false')
        {
            $data['scripture_worksheet']  = 0;
        }else
        {
            $data['scripture_worksheet']  = 1;
        }

        $this->UpdateFunction($data,$contract_id);
    }

    public function update_scripture_finaltest()
    {
        $data = array();
        $contract_id            = $this->input->post('id', TRUE);
        $value  = $this->input->post('scripture_finaltest', TRUE);
        if ($value == 'false')
        {
            $data['scripture_finaltest']  = 0;
        }else
        {
            $data['scripture_finaltest']  = 1;
        }

        $this->UpdateFunction($data,$contract_id);
    }

    public function UpdateContractDueDate()
    {
        $data = array();
        $contract_id            = $this->input->post('contract_id', TRUE);
        $data['date_due']       = $this->input->post('date_due', TRUE);
       $this->UpdateFunction($data,$contract_id);
    }

    public function UpdateContractUnitTitle()
    {
        $data = array();
        $contract_id            = $this->input->post('contract_id', TRUE);
        $data['title']          = $this->input->post('unit_title', TRUE);
        $this->UpdateFunction($data,$contract_id);
    }
    public function UpdateContractMajorTheme()
    {
        $data = array();
        $contract_id            = $this->input->post('contract_id', TRUE);
        $data['major_theme']          = $this->input->post('major_theme', TRUE);
        $this->UpdateFunction($data,$contract_id);
    }
    public function UpdateContractMinorTheme()
    {
        $data = array();
        $contract_id            = $this->input->post('contract_id', TRUE);
        $data['minor_themes']          = $this->input->post('minor_theme', TRUE);
        $this->UpdateFunction($data,$contract_id);
    }
    public function UpdateContractGoals()
    {
        $data = array();
        $contract_id            = $this->input->post('contract_id', TRUE);
        $data['goals']          = $this->input->post('goals', TRUE);
        $this->UpdateFunction($data,$contract_id);
    }
    public function UpdateContractLessons()
    {
        $data = array();
        $contract_id            = $this->input->post('contract_id', TRUE);
        $data['lessons']          = $this->input->post('lessons', TRUE);
        $this->UpdateFunction($data,$contract_id);
    }
    public function UpdateContractScripture()
    {
        $data = array();
        $contract_id            = $this->input->post('contract_id', TRUE);
        $data['scripture']          = $this->input->post('scripture', TRUE);
        $this->UpdateFunction($data,$contract_id);
    }
    public function UpdateContractScriptureProject()
    {
        $data = array();
        $contract_id            = $this->input->post('contract_id', TRUE);
        $data['scripture_projects']          = $this->input->post('scripture_projects', TRUE);
        $this->UpdateFunction($data,$contract_id);
    }
    public function UpdateContractCharacter()
    {
        $data = array();
        $contract_id            = $this->input->post('contract_id', TRUE);
        $data['character']      = $this->input->post('character', TRUE);
        $this->UpdateFunction($data,$contract_id);
    }
    public function UpdateContractCharacterProject()
    {
        $data = array();
        $contract_id            = $this->input->post('contract_id', TRUE);
        $data['character_projects']      = $this->input->post('character_projects', TRUE);
        $this->UpdateFunction($data,$contract_id);
    }
    public function UpdateContractPersonalReading()
    {
        $data = array();
        $contract_id            = $this->input->post('contract_id', TRUE);
        $data['personal_reading']      = $this->input->post('personal_reading', TRUE);
        $this->UpdateFunction($data,$contract_id);
    }
    public function UpdateContractBibleReading()
    {
        $data = array();
        $contract_id            = $this->input->post('contract_id', TRUE);
        $data['bible_reading']      = $this->input->post('bible_reading', TRUE);
        $this->UpdateFunction($data,$contract_id);
    }
    public function UpdateContractSpecialProject()
    {
        $data = array();
        $contract_id            = $this->input->post('contract_id', TRUE);
        $data['special_projects']      = $this->input->post('special_projects', TRUE);
        $this->UpdateFunction($data,$contract_id);
    }
    public function UpdateFunction($data,$contract_id)
    {
        $condition=['id'=>$contract_id];
        $result =$this->ContractModel->UpdateData('academics_contracts', $condition,$data);

        if ($result)
        {
            $response = array(
                'success'=> true,
                'error'=> false,
                'msg'=>'Updated Successfully.'
            );
        }else
        {
            $response = array(
                'success'=> false,
                'error'=> true,
                'msg'=>'Update failed.'
            );
        }
        echo json_encode($response);
    }
    
    // added by nishi 2/10/2019
    public function contract_previous($student_id, $contract_id){
       $all_id=$this->db->select('id')->where('student_id', $student_id)->get('academics_contracts')->result();
       
       $prev_key;
       $prev_contract_id;

       foreach ($all_id as $key => $value) {
           if($value->id == $contract_id){
              if($key==0){
                 $prev_key=$key;
              }
              else{
                $prev_key=$key-1;
              }
           }
       }

       foreach ($all_id as $key => $value) {
           if($key == $prev_key){
              $prev_contract_id= $value->id;
           }
       }

       redirect('student-contract/'.$student_id."/".$prev_contract_id);
    }



    public function contract_next($student_id, $contract_id){
       $all_id=$this->db->select('id')->where('student_id', $student_id)->get('academics_contracts')->result();
       
       $next_key;
       $next_contract_id;
       
       foreach ($all_id as $key => $value) {
           if($value->id == $contract_id){
              if($key== sizeof($all_id)-1 ){
                 $next_key=$key;
              }
              else{
                $next_key=$key+1;
              }
           }
       }

       foreach ($all_id as $key => $value) {
           if($key == $next_key){
              $next_contract_id= $value->id;
           }
       }

      redirect('student-contract/'.$student_id."/".$next_contract_id);
    }
    // added by nishi 2/10/2019----end
}