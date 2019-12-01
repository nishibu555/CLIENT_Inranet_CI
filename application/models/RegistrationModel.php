<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegistrationModel extends CI_Model
{
     //nishi
    //Student_registration
    public function insert_data($table_name, $data){
        $this->db->insert($table_name, $data);
        return $this->db->insert_id();
    }
    
    //find one row
    public function get_row($table_name, $condition){
        return $this->db->where($condition)->get($table_name)->row();
    }

    //find multiple row
    public function get_result($table_name, $condition){
        return $this->db->where($condition)->get($table_name)->result();
    }
    public function get_result_desc($table_name, $condition, $order_by){
        return $this->db->where($condition)->order_by( $order_by, "desc")->get($table_name)->result();
    }
    
    
    //update
    public function update_data($table_name, $condition, $data){
        $this->db->where($condition)
            ->update($table_name, $data);
    }
}