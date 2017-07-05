<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class WModel extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	/* Put your model function here */
	public function ce()
	{
		
	}

	public function getUsers()
	{
		
		$this->db->cache_off();
		$this->db->select('*');
		$this->db->from('information inf'); 
		$this->db->join('users us', 'us.info_id=inf.info_id','inner');
		$query = $this->db->get();
		return $query;
	}

	public function getInformation($unique_id = NULL)
	{
		$this->db->cache_off();
		$this->db->trans_start();
		$this->db->select('*');
		$this->db->from('information inf');
		$this->db->join('emergency_info ei','ei.unique_id = inf.unique_id','inner');
		$this->db->where('inf.unique_id',$unique_id);
		$this->db->trans_complete();
		$query = $this->db->get();
		$result = array();
		if ($query->num_rows() > 0) {
			$result = $query->row();
		}

		
		return $result;
	}
}