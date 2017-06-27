<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
/** 
 * LMODEL
 *
 * LModel is use for logs.
 *
 * @author		Enalds
 * @copyright	Copyright (c) 2011 - 2012, CreationEyed.
 *
 * @since		CE Version 3.0
 * @version		1.0
 */
class LModel extends CI_Model
{
	/** 
	 * LOGS
	 *
	 * Description of logs
	 *
	 * @author		Enalds
	 * @username	Username of the user.
	 * @type		Type.
	 * @desc		Description.
	 *
	 * @since		CE Version 3.0
	 */
	function logs($username='', $type='', $desc='')
	{
		$date = date("Y-m-d H:i:s");
		$ip = $_SERVER['REMOTE_ADDR'];
		$data = array(
			'logs_id' => NULL,
			'owner' => $username,
			'type' => $type,
			'description' => $desc,
			'ip' => $ip,
			'date_time' => $date
		);
		$this->db->insert('logs',$data);
	}

	/** 
	 * UPDATE LOGIN
	 *
	 * Update the login
	 *
	 * @author		Enalds
	 * @username	Username of the user.
	 *
	 * @since		CE Version 3.0
	 */
	function update_logs($username='')
	{
		$date = date("Y-m-d H:i:s");
		$ip = $_SERVER['REMOTE_ADDR'];
		$update = array(
		   'last_login' => $date,
		   'last_ip' => $ip,
		);
		$this->db->set('login_count','login_count+1',FALSE);
		$this->db->where('username',$username);
		$this->db->update('login',$update);
	}
}