<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller
{
	private $folder = 'admin/';

	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		#if( ! $this->session->userdata('is_login')) 
		#	show_404();

		$data["title"] = "Welcome to RG Admin - Login ";
		$data['description'] = 'Welcome to RG Admin !';
		$data['author'] = "B23 RG 3618";
		$data['folder'] = $this->folder;	
		$data['menu'] = 'registration';

		if($this->input->get('add') == 'rg' || $this->input->get('add') == 'aspirant') 
		{
			$data['submenu'] = 'Add Information';
			$data['page'] = 'rg';
			if($_POST) 
			{
				$i = 0;
				$error = 0;
				$array = array('Vest #','Batch','Firstname','Lastname','Middlename','Birthday','Street Address','City','Contact Number','Name','Number','Address','Relation','Aspirant #','Sector','Blood Type');
				$array_var = array('vest_no','batch','firstname','lastname','middlename','birthday','st_address','city','contact_numberinf','contact_name','contact_number','contact_address','relation','aspirant','sector','bloodtype');
				$array_req = array(0,1,1,1,0,0,1,1,1,1,1,1,1,0,1,1);
			
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
			if($cquery){
				$get = QModel::g($this->wmodel->getInformation($this->input->get('who')));
				$array_var = array('vest_no','batch','firstname','lastname','middlename','birthday','st_address','city','contact_numberinf','contact_name','contact_number','contact_address','relation','aspirant','usertype','sector','bloodtype');
				foreach ($array_var as $a){
					$data[$a] = $get[$a];
				}

				if($_POST){

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

					if( ! $error){
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
		else
		{
			$data['page'] = 'list';
			$this->load->view($this->folder.'registration',$data);
		}


		
	}


	
}