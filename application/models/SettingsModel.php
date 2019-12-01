<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SettingsModel extends CI_Model
{
    public function __construct()
	{
		parent::__construct();
		$this->table = 'users';
		$this->db = $this->load->database('default', true);
	}

	var $select_column= array("id","first_name","last_name","username","email","active","p_admin","p_academics","p_allcontracts","p_marketing","p_workcrews","p_fundraising","p_viewrecords","p_editrecords","p_editbeds","p_editschedules","p_directory","p_discipline","p_staffcorrection","p_documents","p_inventory");
	var $order_column= array("id","first_name","last_name","username","email","active","p_admin","p_academics","p_allcontracts","p_marketing","p_workcrews","p_fundraising","p_viewrecords","p_editrecords","p_editbeds","p_editschedules","p_directory","p_discipline","p_staffcorrection","p_documents","p_inventory");

	function make_query(){
		$this->db->select($this->select_column);
		$this->db->from($this->table)->where('delete_flag !=',1)->where('id !=',1);
		if (isset($_POST["search"]["value"])) {
			$this->db->like("id", $_POST["search"]["value"]);
			$this->db->or_like("username", $_POST["search"]["value"]);
		}
		if(isset($_POST["order"]))
		{
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else
		{
			$this->db->order_by('id', 'DESC');
		}
	}

	function make_datatables($draw,$start,$length){
		$this->make_query();
		if($length != -1)
		{
			$this->db->limit($length, $start);
		}
		$query = $this->db->where('delete_flag !=',1)->where('id !=',1)->get();
		return $query->result();
	}

	function get_all_data()
	{
		$this->db->select("id");
		$this->db->from($this->table);
		$this->db->where('delete_flag !=',1)->where('id !=',1);
		return $this->db->count_all_results();
	}
}