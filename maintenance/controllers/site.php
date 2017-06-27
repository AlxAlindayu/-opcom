<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->library('session');
	}

	public function index()
	{
		$data['title'] = "404 Page not found";
		$data['menu'] = 0;
		
		$this->load->view('site/404',$data);
	}
}