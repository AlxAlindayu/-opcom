<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$data["title"] = "The TCU Files";
		$data["pagename"] = "The TCU Files";


		if($_POST)
		{
			$submit = $this->input->post('submit');

			if( ! $submit)
			{
				#redirect('404');
			}
			else
			{
				$i = 0;
				$error = 0;
				$l_var = array('username','password');
				$l_name = array('Username','Password');
				$l_req = array(1,1);

				foreach ($l_var as $l)
				{
					$data[$l] = $this->input->post($l);
					if( ! strlen($this->input->post($l)) && $l_req[$i])
					{
						$data[$l."_response"] =  '<div class="form-error"><i class="fa fa-info-circle"></i> Please enter your '.$l_name[$i].'</div>';
						$error++;
					}
					$i++;
				}

				if( ! $error)
				{
					$username = $this->input->post('username');
					$password = $this->input->post('password');
					$login_u = Qmodel::sfwa('users','username',$username);
					$count_u = Qmodel::c($login_u);
					$v_u = 0;
					if( ! $count_u) 
					{
						$data['username_response'] = '<div class="form-error"><i class="fa fa-info-circle"></i> Invalid Username !</div>';
						$data['password_response'] = '<div class="form-error"><i class="fa fa-info-circle"></i> Invalid Password !</div>';
						$data["valus"] = "myModal";
					}
					else
					{
						$v_u = 1;
					}

					if($v_u == 1)
					{

						$get = Qmodel::g($login_u);

						$info_u = Qmodel::sfwa('information','info_id',$get['info_id']);

						$ginf = Qmodel::g($info_u); 

						if($get['password'] != hash_password($password))
						{
							$data['password_response'] = '<div class="form-error"><i class="fa fa-info-circle"></i> Invalid Password !</div>';
							$data["valus"] = "myModal";
						}
						else
						{
							$full_name = $ginf['inf_lastname'].", ".$ginf['inf_firstname'];
							$st_num = $ginf['inf_student_no'];
							$user_t = $get['user_type'];
							
							$draincouser = array('thetcufilesadmin' => $username,
							'usertype' => $user_t,
							'full_name' => $full_name,
							'st_number' => $st_num,
							'user_id' => $get['user_id']
							);
							$this->session->set_userdata($draincouser);

							redirect('admin/home');
						}
					}
				}
			}
		}

		$this->load->view("body",$data);
	}
	public function forms()
	{
		$data["title"] = "The TCU Files";
		$data["pagename"] = "The TCU Files";

		$this->load->view("form",$data);
	}

	
}
