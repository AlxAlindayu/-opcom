<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
	private $folder = 'admin/';

	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		if( ! $this->session->userdata('thetcufilesadmin')) 
			show_404();
		else
			redirect('dashboard');
	}
	public function login()
	{
		$data["title"] = "Welcome to RG Admin - Login ";
		$data['description'] = 'Welcome to RG Admin !';
		$data['author'] = "B23 RG 3618";
		$data['folder'] = $this->folder.'login/';

		if($_POST)
		{
			$i = 0;
			$error = 0;
			$array = array('Username','Password');
			$array_var = array('username','password');
			$array_req = array(1,1);

			foreach ($array_var as $a) {
				$data[$a] = $this->input->post($a);
				if( ! strlen($this->input->post($a)) && $array_req[$i]) {
					$data[$a.'_response'] = '<div class="form-error"><i class="fa fa-info-circle"></i> Please enter '.$array[$i].'.</div>';
					$error++;
				}
				$i++;
			}

			if( ! $error) {
				$query = QModel::sfwa('user',array('username','password'),array($this->input->post('username'),hash_password('password')));
				$cquery = QModel::c($query);

				if($cquery) {
					$get = QModel::g($query);

					if($get['status'] == 'Active') {
						$rgnetwork = array(
							'count' => $get['usertype'],
							'hashcrash' => $get['unique_id'],
							'is_login' => hash_password('yes'),
							'date_login' => strtotime(date("Y-m-d H:i:s"))
						);

						$this->session->set_userdata($rgnetwork);
					}
					elseif($get['status'] == 'Ban') {
						$data['general_response'] = '<div class="rg-error"><i class="fa fa-info-circle"></i> Your account has been ban please contact web master.</div>';
						$error++;
					}
					elseif($get['status'] == 'Pending') {
						$data['general_response'] = '<div class="rg-error"><i class="fa fa-info-circle"></i> Your account is not yet activated please contact web master.</div>';
						$error++;
					}
				}
				else{
					$data['general_response'] = '<div class="rg-error"><i class="fa fa-info-circle"></i> Login details not found.</div>';
					$error++;
				}
			}
		}

		$this->load->view($this->folder.'login/login',$data);
	}
	public function dashboard()
	{
		$data["title"] = "Welcome to RG Admin - Login ";
		$data['description'] = 'Welcome to RG Admin !';
		$data['author'] = "B23 RG 3618";
		$data['folder'] = $this->folder;
		$data['menu'] = 'dashboard';

		$this->load->view($this->folder.'body',$data);
	}
}