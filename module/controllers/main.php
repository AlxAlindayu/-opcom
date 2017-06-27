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

		$this->load->view('body',$data);

	}

	public function search()
	{
		if($_POST)
		{
			
		}
		else
		{
			show_404();
		}
	}
	

	
}
