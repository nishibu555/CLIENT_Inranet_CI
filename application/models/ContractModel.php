<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContractModel extends CI_Model
{

    public function UpdateData($TableName,$condition,$data)
    {
        $this->db->where($condition);
        $result = $this->db->update($TableName, $data);

        if ($result)
        {
            return true;
        }else
        {
            return false;
        }
    }
    public function getOneRow($TableName,$condition)
    {
        return $this->db->where($condition)->get($TableName)->row();
    }
    public function InsertData($TableName,$data)
    {
        $this->db->insert($TableName, $data);
        return $this->db->insert_id();
    }
    public function getMultipleRow($TableName,$std_id)
    {
        $this->db->select('*');
        $this->db->from($TableName);
        $this->db->where('student_id',$std_id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
}