<?php  if( !defined('BASEPATH')) exit('No direct script access allowed');
/** 
 * Time
 *
 * @author		Enalds
 * @copyright	Copyright (c) 2011 - 2013, CreationEyed.
 *
 * @since		CE Version 3.2
 *
 * @version		1.0
 *
 */
if ( ! function_exists('clock'))
{
	function clock($time='')
	{
		$CI =& get_instance();
		$time = explode(":",$time);
		$ht_1 = $time[0];
		$ht_2 = explode(" ",$time[1]);
		$ht_3 = $ht_2[0];
		
		if($ht_2[1] === "PM")
		{
			if($ht_1 >= 10)
			{
				$ht_1 = $ht_1;
			}
			else
			{
				$ht_1 = str_replace('0','',$ht_1);
			}
			
			if($ht_1 == 12)
				$new_ht_1 = 12;
			else
				$new_ht_1 = $ht_1+12;
		}
		else
		{
			$new_ht_1 = $ht_1;
		}
		
		if($ht_1 == 12 && $ht_2[1] === "AM")
		{
			$new_ht_1 = "00";
		}
		
		return date("H:i:s", strtotime($new_ht_1.':'.$ht_3.':00'));
	}
}

/* End of file validation_helper.php */
/* Location: ./module/helpers/validation_helper.php */