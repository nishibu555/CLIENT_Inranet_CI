<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChronologicalModel extends CI_Model
{
    
     public function InsertData($TableName,$data)
    {
        $this->db->insert($TableName, $data);
        return $this->db->insert_id();
    }
}