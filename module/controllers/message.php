<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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

		
		$res = $this->wmodel->getInformation($this->session->userdata('hashcrash'));
		
		$data['username'] = $res->lastname.', '.$res->firstname.' - '.$res->vest_no;

		if($this->input->get('c') == 'message' && $this->input->get('f') == 'new'){

			$data['query'] = $query = QModel::sfwa('information','usertype','rg');
			$data['cquery'] = QModel::c($query);

			if($_POST) {
				$array = array('user','message');
				$array_var = array('Recipient','Message');
				$array_req = array(1,1);
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

				$iq = QModel::sfwa('information','unique_id',$this->input->post('user'));
				if( ! QModel::c($iq)) {
					$data['user_response'] = '<div class="form-error"><i class="fa fa-info-circle"></i> The information of the user are not registered.</div>';
					$error++;
				}

				if( ! $error) {
					$insert = array(
						'rgto' => $this->input->post('user'),
						'rgfrom' => $this->session->userdata('hashcrash'),
						'message' => $this->input->post('message'),
						'date_sent' => date("Y-m-d H:i:s")
					);

					$this->db->insert('message',$insert);

					$this->session->set_flashdata('success','<p class="success"><i class="fa fa-info-circle"></i> Message Successfully Sent.</p>');
					$logs_message = 'Message Sent to  : '.$this->input->post('user').' ';
					logs_record($this->session->userdata('hashcrash'),$logs_message,date("Y-m-d H:i:s"));
					redirect('admin/message?c=message&f=new');
				}
			}

			$this->load->view($this->folder.'compose',$data);
		}
		elseif($this->input->get('controller') == 'message/mailbox') {
			$data['menu'] = 'mailbox';
			$data['page'] = 'messages';

			$this->load->view($this->folder.'mailbox',$data);
		}
		else{

		}

		
		
	}


	
}