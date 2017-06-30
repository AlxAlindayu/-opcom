<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$data["title"] = "Search Engine RG Community Ahoo ! ";
		$data['description'] = 'Search Engine / RG Community Ahoo !';
		$data['author'] = "B23 RG 3618";

		$data['query'] = '';

		if($_POST)
		{
			if( ! $this->input->post('search')) {
				$data['search_response'] = '<div class="form-error"><i class="fa fa-info-circle"></i> Please enter search value.</div>';
			}
			else {
				$data['search'] = $search = $this->input->post('search');
				$data['searches'] = $searches = $this->input->post('searches');

				switch ($searches) {
					case 1:
						$queing = 'vest_no = '.$this->db->escape($search);
						break;
					case 2:
						$queing = 'vest_no = '.$this->db->escape($search);
						break;
					case 3:
						$queing = 'lastname LIKE "%"'.$this->db->escape(strtolower($search)).'"%"';
						break;
					case 4:
						$queing = 'firstname LIKE "%"'.$this->db->escape(strtolower($search)).'"%"';
						break;
					case 5:
						$queing = 'firstname LIKE"%"'.$this->db->escape(strtolower($search)).'"%"';
						break;
					
					default:
						$queing = '';
						break;
				}

				if($queing) {
					//echo "SELECT * FROM information WHERE ".$queing;
					//die();

					$data['query'] = $query = QModel::query("SELECT * FROM information WHERE ".$queing);

				}
			}
		}

		$this->load->view('body',$data);

	}

	public function search()
	{

		if($_POST)
		{
			if( ! $this->input->post('search')) {
				$data['search_response'] = '<div class="form-error"><i class="fa fa-info-circle"></i> Please enter search value.</div>';
			}
			else {
				$data['search'] = $search = $this->input->post('search');
				$data['searches'] = $searches = $this->input->post('searches');

				switch ($searches) {
					case 1:
						$queing = 'vest_no = '.$this->db->escape($search);
						break;
					case 2:
						$queing = 'vest_no = '.$this->db->escape($search);
						break;
					case 3:
						$queing = 'lastname = "%"'.$this->db->escape(strtolower($value))."%";
						break;
					case 4:
						$queing = 'firstname = "%"'.$this->db->escape(strtolower($value))."%";
						break;
					case 5:
						$queing = 'firstname = "%"'.$this->db->escape(strtolower($value))."%";
						break;
					
					default:
						$queing = '';
						break;
				}

				if($queing) {
					$data['query'] = $query = QModel::query("SELECT * FROM information WHERE ".$queing);

				}
			}
		}
		else
		{
			show_404();
		}
	}
	

	
}
