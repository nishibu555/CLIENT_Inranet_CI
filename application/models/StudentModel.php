<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentModel extends CI_Model
{

    public function GetAllData($tableName)
    {
        $this->db->select('*');
        $this->db->from($tableName);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;

    }
 
    public function GetActiveStudentContract($tableName)
    {
        $this->db->select('*');
        $this->db->from($tableName);
        $this->db->where('status !=','Unassigned');
        $this->db->where('delete_flag',0);
        $fetched_records = $this->db->get();
        return $users = $fetched_records->result_array();
    }
    public function InsertData($TableName,$data)
    {
        $this->db->insert($TableName, $data);
        return $this->db->insert_id();
    }
    public function getOneRow($TableName,$condition)
    {
        return $this->db->where($condition)->get($TableName)->row();
    }

    public function gsnc_value($std_id){

        $this->db->select('academics_scores.*,academics_gsnc.title');
        $this->db->from('academics_scores');
        $this->db->join('academics_gsnc','academics_scores.gsnc_id = academics_gsnc.id');
        $this->db->where('student_id',$std_id);
        $fetched_records = $this->db->get();
        return $users = $fetched_records->result_array();
//        return $this->db->row();
    }
    
       public function getGSNC($TableName,$std_id)
    {

        $this->db->select('DISTINCT(academics_scores.gsnc_id)');
        $this->db->from($TableName);
        $this->db->where('academics_scores.student_id ',$std_id);
        $this->db->where('score >=',70);
        $fetched_records = $this->db->get();
        return $users = $fetched_records->result_array();
    }
    
     public function getPSNC($std_id)
    {
        $this->db->select('*');
        $this->db->from('academics_contracts');
        $this->db->where('academics_contracts.student_id ',$std_id);
        $this->db->where('academics_contracts.status','Completed');
        $this->db->where('academics_contracts.delete_flag',0);
        $fetched_records = $this->db->get();
//        echo $this->db->last_query();
        return $users = $fetched_records->result_array();
    }
    
    public function getContractStudentInfo($std_id)
    {
        $this->db->select('academics_contracts.*,student_info.*');
        $this->db->from('academics_contracts');
        $this->db->join('student_info','student_info.student_id = academics_contracts.student_id');
        $this->db->where('academics_contracts.student_id',$std_id);
        $this->db->where('academics_contracts.status','Assigned');
        $this->db->limit(1);
        $fetched_records = $this->db->get();
//        echo $this->db->last_query();
        return $users = $fetched_records->row();
    }
    
    
    //nishi
    public function count_gsnc($std_id){
        $this->db->select('DISTINCT(academics_scores.gsnc_id)');
        $this->db->from('academics_scores');
        $this->db->where('academics_scores.student_id ',$std_id);
        $this->db->where('score >=',70);
        $res=$this->db->get()->result();
        return count($res);
    }
    
    public function count_psnc($std_id){
        $this->db->select('*');
        $this->db->from('academics_contracts');
        $this->db->where('academics_contracts.student_id ',$std_id);
        $this->db->where('academics_contracts.status','Completed');
        $this->db->where('academics_contracts.delete_flag',0);
        $res = $this->db->get()->result();
        
        return count($res);
    }
    
}



