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
		if( ! $this->session->userdata('is_login')) 
			show_404();
		else
			redirect('admin/dashboard');
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
				$query = QModel::sfwa('user',array('username','password'),array($this->input->post('username'),hash_password($this->input->post('password'))));
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

						$update = array(
							'is_login' => 'yes',
							'dt_login' => strtotime(date("Y-m-d H:i:s")) 
						);

						$this->db->where('unique_id',$get['unique_id']);
						$this->db->update('user', $update);

						logs_record($get['unique_id'],'Is login',date("Y-m-d H:i:s"));

						redirect('admin');
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
	public function logout()
	{

		$update = array(
			'is_login' => 'no',
			'dt_login' => strtotime(date("Y-m-d H:i:s")) 
		);

		$this->db->where('unique_id',$this->session->userdata('hashcrash'));
		$this->db->update('user', $update);

		logs_record($this->session->userdata('hashcrash'),'Is logout',date("Y-m-d H:i:s"));

		$onlinenetwork = array(
			'count' => '',
			'hashcrash' => '',
			'is_login' => '',
			'date_login' => ''
		);			

		$this->session->unset_userdata($onlinenetwork);
		$this->session->sess_destroy();
		redirect('');
	}
	//hashcrash
	private function details($unique_id=NULL)
	{
		if($unique_id == NULL){
			$params = $this->session->userdata('hashcrash');
		}
		$query= QModel::sfwa('information','unique_id',$params);
		if(QModel::c($query)) {
			$get = QModel::g($query);

			$firstname = $get['firstname'];
			$lastname = $get['lastname'];
			$vest_no = $get['vest_no'];
			$details = array($firstname,$lastname,$vest_no);

			return $details;
		}
	}
	public function dashboard()
	{
		$data["title"] = "Welcome to RG Admin - Login ";
		$data['description'] = 'Welcome to RG Admin !';
		$data['author'] = "B23 RG 3618";
		$data['folder'] = $this->folder;
		$data['menu'] = 'dashboard';

		$data['username'] = $this->details()[1].', '.$this->details()[0].' - '.$this->details()[2];

		$this->load->view($this->folder.'body',$data);
	}
}