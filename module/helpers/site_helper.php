<?php  if( !defined('BASEPATH')) exit('No direct script access allowed');
/** 
 * Get the header
 *
 * @author		Enalds
 * @copyright	Copyright (c) 2011 - 2013, CreationEyed.
 * @view		Header file name.
 * @css			CSS file name.
 *
 * @since		CE Version 2.0
 *
 * @version		2.2
 */
if ( ! function_exists('get_header'))
{
	function get_header($view='', $css = array(), $css_layout='')
	{
		if( ! $view)
		{
			echo '
				<div style="background:red; color:#fff; font-size:80%; padding:10px;">
					<b>ERROR:</b>
					<br />
					- Please input first parameter. (Error Code: #001)
				</div>
			';
		}
		else
		{
			$exists = file_exists(FCPATH."module/views/{$view}.php");
			if($exists == TRUE)
			{
				$CI =& get_instance();
				
				// Is mobile?
				if(MOBILE)
				{
					$CI->load->library('Mobile_Detect');
					if($CI->mobile_detect->isMobile()) 
					{
						$css_layout = "full_sticky_footer";
					}
				}
				
				if( ! is_array($css))
				{
					$data['css'] = array($css);
					
					if($css_layout)
						$data['cssLayout'] = $css_layout;
					else
						$data['cssLayout'] = "";
				
					$CI->load->view($view,$data);
				}
				else
				{
					$data = array(
						'css' => $css
					);
					
					if($css_layout)
						$data['cssLayout'] = $css_layout;
					else
						$data['cssLayout'] = "";
				
					$CI->load->view($view,$data);
				}
			}
			else
			{
				echo '
					<div style="background:red; color:#fff; font-size:80%; padding:10px;">
						<b>ERROR:</b>
						<br />
						- There is no file name like that <b>'.$view.'.php</b>. (Error Code: #002)
					</div>
				';
			}
		}
	}
}

/** 
 * Get the footer
 *
 * @author		Enalds
 * @copyright	Copyright (c) 2011 - 2013, CreationEyed.
 * @view		Footer file name.
 * @js			JS file name.
 *
 * @since		CE Version 2.0
 *
 * @version		2.1
 */
if ( ! function_exists('get_footer'))
{
	function get_footer($view='', $js = array())
	{
		if( ! $view)
		{
			echo '
				<div style="background:red; color:#fff; font-size:80%; padding:10px;">
					<b>ERROR:</b>
					<br />
					- Please input first parameter. (Error Code: #003)
				</div>
			';
		}
		else
		{
			$exists = file_exists(FCPATH."module/views/{$view}.php");
			if($exists == TRUE)
			{
				if( ! is_array($js))
				{
					$CI =& get_instance();
					
					$data['js'] = array($js);
					
					$CI->load->view($view,$data);
				}
				else
				{
					$CI =& get_instance();
					
					$data = array(
						'js' => $js
					);
					
					$CI->load->view($view,$data);
				}
			}
			else
			{
				echo '
					<div style="background:red; color:#fff; font-size:80%; padding:10px;">
						<b>ERROR:</b>
						<br />
						- There is no file name like that <b>{$view}.php</b>. (Error Code: #004)
					</div>
				';
			}
		}
	}
}

/** 
 * Password Hashing
 *
 * @author		Enalds
 * @copyright	Copyright (c) 2011 - 2013, CreationEyed.
 * @password	Password.
 *
 * @since		CE Version 3.0
 *
 * @version		1.1
 */ 
if ( ! function_exists('hash_password'))
{
	function hash_password($password='')
	{
		$salt = "022@ 91#EMMu1A143%%";
		$password = hash('sha512',$salt.md5($password));
		
		return $password;
	}
}

/** 
 * Email
 *
 * @author			Enalds
 * @copyright		Copyright (c) 2011 - 2013, CreationEyed.
 * @email_address	TO Email Address.
 * @content			Body or content of the email.
 * @debug			TRUE/FALSE to debug the email if the email is working or not.
 *
 * @since		CE Version 3.0
 * @version		1.2
 *
 * v1.1 
 * - Added EMAIL_SUBJECT.
 * - Can now call FROM, NAME and SUBJECT.
 *
 * v1.2 
 * - Added email_sent log.
 */
if ( ! function_exists('email'))
{
	function email($email_address='', $content='', $debug=FALSE)
	{
		$email_from = EMAIL_FROM;
		$email_from_name = EMAIL_FROM_NAME;
		$email_subject = EMAIL_SUBJECT;
		
		if(is_array($email_address))
		{
			foreach($email_address as $key => $value)
			{
				if($key === "email_address")
				{
					$email_address = $value;
				}
				else if($key === "from")
				{
					$email_from = $value;
				}
				else if($key === "name")
				{
					$email_from_name = $value;
				}
				else if($key === "subject")
				{
					$email_subject = $value;
				}
				else
				{
					show_error("There is no key like that on email function.");
				}
			}
		}
		
		$CI =& get_instance();
		$CI->load->library('email');
		$config['mailtype'] = 'html';
		$CI->email->initialize($config);
		$CI->email->from($email_from, $email_from_name);
		$CI->email->to($email_address);
		$CI->email->subject($email_subject);
		$CI->email->message('
			<html>
			<head><title>Message</title></head>
			<body>
				'.$content.'
			</body>
			</html>
		');
		if($CI->email->send())
		{
			$insert = array(
				'sent_to' => $email_address,
				'sent_date' => date("Y-m-d"),
				'status' => 'Success'
			);
			$CI->db->insert('email_sent',$insert);
		}
		else
		{
			$insert = array(
				'sent_to' => $email_address,
				'sent_date' => date("Y-m-d"),
				'status' => 'Failed'
			);
			$CI->db->insert('email_sent',$insert);
		}
		
		if($debug)
		{
			exit($CI->email->print_debugger());
		}
	}
}

/*
* Admin Security
*/
if ( ! function_exists('security_admin'))
{
	function security_admin()
	{
		$CI =& get_instance();
		
		if( ! $CI->session->userdata('thetcufilesadmin'))
		{
			redirect('');
		}
		elseif($CI->session->userdata('status') == 'pending') 
		{
			redirect('admin/information');
		}
		
	}
}
/* End of file site_helper.php */
/* Location: ./module/helpers/site_helper.php */