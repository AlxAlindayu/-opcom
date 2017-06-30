<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller
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
		

		$data["title"] = "Welcome to RG Admin - Login ";
		$data['description'] = 'Welcome to RG Admin !';
		$data['author'] = "B23 RG 3618";
		$data['folder'] = $this->folder;	
		$data['menu'] = 'registration';

		if($this->input->get('add') == 'rg' || $this->input->get('add') == 'aspirant') 
		{
			$data['page'] = $this->input->get('add');
			$data['submenu'] = 'Add Information';
			
			if($_POST) 
			{
				$i = 0;
				$error = 0;
				$array = array('Vest #','Batch','Firstname','Lastname','Middlename','Birthday','Street Address','City','Contact Number','Name','Number','Address','Relation','Aspirant #','Sector','Blood Type','Owner Name','Owner Address','Plate No.','Engine No.','Chassis No.','Year Model','Manufacturer','Motorcycle Series(Type)');
				$array_var = array('vest_no','batch','firstname','lastname','middlename','birthday','st_address','city','contact_numberinf','contact_name','contact_number','contact_address','relation','aspirant','sector','bloodtype','owners_name',' owner_address',' plate_no',' engine_no',' chassis_no',' year_model',' manufacturer',' series_type');
				$array_req = array(0,1,1,1,0,0,1,1,1,1,1,1,1,0,1,0,0,0,0,0,0,0,0,0);
			
				foreach($array_var as $a) {
					$data[$a] = $this->input->post($a);

					if( ! strlen($this->input->post($a)) && $array_req[$i]) {
						if($a == 'batch') {
							$data[$a.'_response'] = '<div class="form-error"><i class="fa fa-info-circle"></i> Please select '.$array[$i].'.</div>';
						
						}
						else{
							$data[$a.'_response'] = '<div class="form-error"><i class="fa fa-info-circle"></i> Please enter '.$array[$i].'.</div>';
							
						}
						$error++;
					}
					$i++;
				}

				$query = QModel::sfwa('information','vest_no',$this->input->post('vest_no'));
				$cquery = QModel::c($query);

				if($cquery) 
				{
					$data['hit_response'] = '<div class="error"><i class="fa fa-info-circle"></i> Hit ! Please verify the info first </div>';
					$error++;
				}

				if( ! $error) 
				{
					$unique_id = hash_password(md5($this->input->post("vest_no").$this->input->post('fullname').date('Y-m-d H:i:s')));

					$this->db->trans_start();

					$information = array(
						'unique_id' => $unique_id,
						'vest_no' => $this->input->post('vest_no'),
						'batch' => $this->input->post('batch'),
						'firstname' => $this->input->post('firstname'),
						'lastname' => $this->input->post('lastname'),
						'middlename' => $this->input->post('middlename'),
						'birthday' => date('Y-m-d',strtotime($this->input->post('birthday'))),
						'bloodtype' => $this->input->post('bloodtype'),
						'st_address' => $this->input->post('st_address'),
						'contact_numberinf' => $this->input->post('contact_numberinf'),
						'city' => $this->input->post('city'),
						'sector' => $this->input->post('sector'),
						'usertype' => $this->input->get('add'),
						'date_added' => date('Y-m-d H:i:s')

					);

					$this->db->insert('information',$information);

					$emergency = array(
						'unique_id' => $unique_id,
						'contact_name' => $this->input->post('contact_name'),
						'contact_number' => $this->input->post('contact_number'),
						'contact_address' => $this->input->post('contact_address'),
						'relation' => $this->input->post('relation')
					);

					$this->db->insert('emergency_info',$emergency);

					logs_record($this->session->userdata('hashcrash'),'Register Vest No. : '.$this->input->post('vest_no').' Firstname : '.$this->input->post('firstname').' Lastname : '.$this->input->post('lastname'),date("Y-m-d H:i:s"));

					/*$motorcycle = array(
						'unique_id' => $unique_id,
						'contact_name' => $this->input->post('contact_name'),
						'contact_number' => $this->input->post('contact_number'),
						'contact_address' => $this->input->post('contact_address'),
						'relation' => $this->input->post('relation')
					);

					$this->db->insert('emergency_info',$emergency);
					*/
					$this->db->trans_complete();

					$this->session->set_flashdata('success','<p class="success"><i class="fa fa-info-circle"></i> The new directory has been saved.</p>');

					redirect('admin/registration?add='.$this->input->get('add'));
				}
			}

			$this->load->view($this->folder.'add_information',$data);
		}
		elseif($this->input->get('modify') == 'yes' && $this->input->get('who')) 
		{
			$this->load->model('wmodel');
			$query = QModel::sfwa('information','unique_id',$this->input->get('who'));
			$cquery = QModel::c($query);
			if($cquery) {
				$get = QModel::g($this->wmodel->getInformation($this->input->get('who')));
				$array_var = array('vest_no','batch','firstname','lastname','middlename','birthday','st_address','city','contact_numberinf','contact_name','contact_number','contact_address','relation','aspirant','usertype','sector','bloodtype');
				foreach ($array_var as $a) {
					$data[$a] = $get[$a];
				}

				if($_POST) {

					$i = 0;
					$error = 0;
					$array = array('Vest #','Batch','Firstname','Lastname','Middlename','Birthday','Street Address','City','Contact Number','Name','Number','Address','Relation','Aspirant #','Member Type','Sector','Blood Type');
					$array_var = array('vest_no','batch','firstname','lastname','middlename','birthday','st_address','city','contact_numberinf','contact_name','contact_number','contact_address','relation','aspirant','usertype','sector','bloodtype');
					$array_req = array(0,1,1,1,0,0,1,1,1,1,1,1,1,0,1,1,1);
				
					foreach($array_var as $a) {
						$data[$a] = $this->input->post($a);

						if( ! strlen($this->input->post($a)) && $array_req[$i]) {
							if($a == 'batch') {
								$data[$a.'_response'] = '<div class="form-error"><i class="fa fa-info-circle"></i> Please select '.$array[$i].'.</div>';
							
							}
							else{
								$data[$a.'_response'] = '<div class="form-error"><i class="fa fa-info-circle"></i> Please enter '.$array[$i].'.</div>';
								
							}
							$error++;
						}
						$i++;
					}

					if( ! $error) {
						$this->db->trans_start();
						
						$information = array(
							'vest_no' => $this->input->post('vest_no'),
							'batch' => $this->input->post('batch'),
							'firstname' => $this->input->post('firstname'),
							'lastname' => $this->input->post('lastname'),
							'middlename' => $this->input->post('middlename'),
							'birthday' => date('Y-m-d',strtotime($this->input->post('birthday'))),
							'bloodtype' => $this->input->post('bloodtype'),
							'st_address' => $this->input->post('st_address'),
							'contact_numberinf' => $this->input->post('contact_numberinf'),
							'city' => $this->input->post('city'),
							'sector' => $this->input->post('sector'),
							'usertype' => $this->input->post('usertype'),
							'date_added' => date('Y-m-d H:i:s')

						);

						

						$emergency = array(
							'contact_name' => $this->input->post('contact_name'),
							'contact_number' => $this->input->post('contact_number'),
							'contact_address' => $this->input->post('contact_address'),
							'relation' => $this->input->post('relation')
						);
						$this->db->where('unique_id',$this->input->get('who'));
						$this->db->update('information',$information);
						$this->db->update('emergency_info',$emergency);

						logs_record($this->session->userdata('hashcrash'),'Modify Vest No. : '.$this->input->post('vest_no').' With Unique ID :'.$this->input->get('who'),date("Y-m-d H:i:s"));

						$this->db->trans_complete();

						$this->session->set_flashdata('success','<p class="success"><i class="fa fa-info-circle"></i> New Information has been saved.</p>');

						redirect('admin/registration?modify=yes&who='.$this->input->get('who'));

					}
				}

				$this->load->view($this->folder.'add_information',$data);
			}
			else{
				show_404();
			}
		}
		elseif($this->input->get('add') == 'user') {
			$data['submenu'] = 'Add User';
			$data['page'] = 'account';

			if($_POST) {
				$error = 0;
				$i = 0;
				$var = array('user','password','vpassword','usertype','userstatus');
				$var_name = array('User','Password','Verify Password','User Type','User Status');
				$var_req = array(1,1,1,1,1);

				foreach ($var as $a) {
					$data[$a] = $this->input->post($a);
					if( ! strlen($this->input->post($a)) && $var_req[$i]) {
						$data[$a.'_response'] = '<div class="form-error"><i class="fa fa-info-circle"></i> Please enter '.$array[$i].'.</div>';
						$error++;
					}
					$i++;
				}

				if($this->input->post('password') != $this->input->post('vpassword')){
					$data['password_response'] = '<div class="form-error"><i class="fa fa-info-circle"></i> Please verify your password.</div>';
					$error++;
				}

				$uq = QModel::sfwa('user','unique_id',$this->input->post('user'));
				if (QModel::c($uq)) {
					$data['user_response'] = '<div class="form-error"><i class="fa fa-info-circle"></i> Already registered.</div>';
					$error++;
				}

				if( ! $error) {
					$dq = QModel::sfwa('information',array('usertype','unique_id'),array('rg',$this->input->post('user')));
					$cq = QModel::c($dq);

					if($cq){
						$get = QModel::g($dq);

						$insert = array(
							'unique_id' => $this->input->post('user'),
							'username' => $get['vest_no'],
							'password' => hash_password($this->input->post('password')),
							'usertype' => $this->input->post('usertype'),
							'status' => $this->input->post('userstatus'),
							'date_registered' => date("Y-m-d H:i:s")
						);

						$this->db->insert('user',$insert);

						$this->session->set_flashdata('success','<p class="success"><i class="fa fa-info-circle"></i> User account has been created successfully.</p>');
						$logs_message = 'User created unique_id : '.$this->input->post('unique_id').' Vest No. : '.$get['vest_no'].' with status :'.$this->input->post('status').' ';
						logs_record($this->session->userdata('hashcrash'),$logs_message,date("Y-m-d H:i:s"));
						redirect('admin/registration?add=user');

					}
					else{
						$data['usertype_response'] = '<div class="form-error"><i class="fa fa-info-circle"></i> User not found.</div>';
					}
					
				}


			}

			$data['query'] = $query = QModel::sfwa('information','usertype','rg');
			$data['cquery'] = QModel::c($query);

			$this->load->view($this->folder.'user_registration',$data);
		}
		else
		{
			$data['page'] = 'list';
			$this->load->view($this->folder.'registration',$data);
		}


		
	}


	
}