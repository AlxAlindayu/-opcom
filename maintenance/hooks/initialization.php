<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/** 
 * INITIALIZATION
 *
 * Initialized the helper, library, database and timezone.
 *
 * @author		Enalds
 * @copyright	Copyright (c) 2011 - 2012, CreationEyed.
 *
 * @since		CE Version 2.0
 * @version		1.1
 */
class Initialization {
	
	var $CI;
	var $no_session;
		
	function __construct() 
	{
		$this->CI =& get_instance();
		$this->CI->load->helper(array('url','html','site','misc'));
		$this->CI->load->library('session');
		$this->CI->load->model(array('QModel','WModel'));
			
		date_default_timezone_set(TIME_ZONE);
		
		// GPC strip_tags the value of any GET, POST and COOKIE [Enalds]
		$gpc = array(&$_GET, &$_POST, &$_REQUEST, &$_COOKIE);
		foreach ($gpc as &$arr)
		{
			foreach ($arr as $key => $value)
			{
				if (is_string($value))
				{
					$arr[$key] = strip_tags($value);
				}
			}
		}
		
		$this->no_session = array('','main'); // Controller that do not required session [Enalds]
	}
	
	function is_authorized()
	{
		$first_url = $this->CI->uri->segment(1);
		$second_url = $this->CI->uri->segment(2);
		
		/* Browser compatibility */
		if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 10.'))
		{
			// DO NOTHING
		}
		else
		{
			if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 5.') OR strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 6.') OR strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 7.') OR strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 8.'))
			{
				if($first_url == "site" && $second_url == "notcompatible"){
					// DO NOTHING
				}else{
					exit("Your browser is not compatible.");
				}
			}
		}
		
		if(in_array($first_url, $this->no_session))
		{
			// DO NOTHING
		}
		else
		{
			// SET Function Here
		}
	}
}

/* End of file initialization.php */
/* Location: ./module/hooks/initialization.php */