<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ActivityModel extends CI_Model
{
       //find multiple row
    public function get_result($table_name){
        return $this->db->get($table_name)->result();
    }
    
    public function InsertData($table_name, $data){
        $this->db->insert($table_name, $data);
        return $this->db->insert_id();
    }
}