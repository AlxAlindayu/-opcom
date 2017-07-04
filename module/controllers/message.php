<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/admin.php");
class Message extends CI_Controller
{
	private $folder = 'admin/';

	public function __construct()
	{
		parent::__construct();

		if( ! $this->session->userdata('is_login')) 
			show_404();
	}
	
	public function index()
	{
		
		$data["title"] = "Welcome to RG Admin - Message ";
		$data['description'] = 'Welcome to RG Admin !';
		$data['author'] = "B23 RG 3618";
		$data['folder'] = $this->folder;	
		$data['menu'] = 'messages';

		$admin = new Admin();
		$data['username'] = $admin->details()[1].', '.$admin->details()[0].' - '.$admin->details()[2];

		if($this->input->get('c') == 'message' && $this->input->get('f') == 'new'){

			$data['query'] = $query = QModel::sfwa('information','usertype','rg');
			$data['cquery'] = QModel::c($query);

			if($_POST) {
				$array = array();
				$array_var = array();
				$array_req = array();
				$error = 0;
				$i = 0;
				
				foreach ($array as $a) {
					$data[$a] = $this->input->post($a);
					if( ! strlen($this->input->post($a)) && $array_req[$i]) {
						$data[$a.'_response'] = '<div class="form-error"><i class="fa fa-info-circle"></i> Please enter '.$array[$i].'.</div>';
						$error++;
					}

					$i++;
				}

				if( ! $error) {
					
				}
			}

			$this->load->view($this->folder.'compose',$data);
		}
		else{

		}

		
		
	}


	
}