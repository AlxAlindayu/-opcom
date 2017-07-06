<?php  if( !defined('BASEPATH')) exit('No direct script access allowed');
/** 
 * Saving Logs
 *
 * @author 		Alex Alindayu
 * @copyright 	Copyright (c)2011 - 2017 CreationEyed
 * @since 		CE Version 3.1
 *
 * @version 	3.1
 *
 */
if ( ! function_exists('logs_record'))
{
	function logs_record($unique_id='',$message='',$date_record='')
	{
		$CI =& get_instance();
		$insert = array(
			'unique_id' => $unique_id,
			'message' => $message,
			'date_created' => $date_record,
		);

		$CI->db->insert('logs',$insert);
	}
}
/** 
 * Custom Show_404
 *
 * @author 		Alex Alindayu
 * @copyright 	Copyright (c)2011 - 2017 CreationEyed
 * @since 		CE Version 3.1
 *
 * @version 	3.1
 *
 */

/** 
 * Link to theme path
 *
 * @author		Enalds
 * @copyright	Copyright (c) 2011 - 2013, CreationEyed.
 * @location	What do you want to locate. CSS, IMAGES, FONT and SWF.
 *
 * @since		CE Version 2.0
 *
 * @version		1.0
 */
if ( ! function_exists('themes_url'))
{
	function themes_url($location='')
	{
		if( ! $location)
		{
			
		}
		else
		{
			$exists = file_exists(FCPATH.'themes/default/'.$location);
			if($exists == TRUE)
			{
				return base_url('themes/default/'.$location);
			}
			else
			{
				
			}
		}
	}
}

/** 
 * Link to theme path
 *
 * @author		Joel
 * @copyright	Copyright (c) 2011 - 2015, CreationEyed.
 * @location	locate js files
 *
 */
if ( ! function_exists('js_tag'))
{
	function js_tag($location='')
	{
		if( ! $location)
		{
			echo '
				<div style="background:red; color:#fff; font-size:80%; padding:10px;">
					<b>ERROR:</b>
					<br />
					- There is an error on your js_tag(). You need to input first parameter.
				</div>
			';
		}
		else
		{
			$exists = file_exists(FCPATH.'themes/default/'.$location);
			if($exists == TRUE)
			{
				return '<script type="text/javascript" src="'.base_url('themes/default/'.$location).'"></script>';
			}
			else
			{
				echo '
					<div style="background:red; color:#fff; font-size:80%; padding:10px;">
						<b>ERROR:</b>
						<br />
						- There is an error on your js_tag(). The file is not found.
					</div>
				';
			}
		}
	}
}

/** 
 * Show the Image
 *
 * @author		Enalds
 * @copyright	Copyright (c) 2011 - 2013, CreationEyed.
 * @location	Image file name, can call id, class and javascript event.
 * @title		Image title.
 * @alt			Image alt.
 * @style		Image added style.
 *
 * @since		CE Version 3.0
 *
 * @version		1.3
 */
if ( ! function_exists('image'))
{
	function image($location='', $title='', $alt='', $style='')
	{
		// Initialization
		$url = base_url('themes/default/images/');
		$url = str_replace("https://", "http://", $url); // Need to removed https to make the getimagesize() run correctly.
		$file_name = '';
		$id = '';
		$class = '';
		$event = '';
		
		if(is_array($location))
		{
			foreach($location as $many => $value)
			{
				if($many == "file")
				{
					$file_name = $value;
				}
				else if($many == "id")
				{
					$id = 'id="'.$value.'"';
				}
				else if($many == "class")
				{
					$class = 'class="'.$value.'"';
				}
				else if($many == "event")
				{
					$event = $value;
				}
				else
				{
					/* DO NOTHING */
				}
			}
		}
		else
		{
			$file_name = $location;
			
		}
		
		// Getting the width and height
		$exists = file_exists(FCPATH.'themes/default/images/'.$file_name);
		if($exists == TRUE)
		{
			list($width, $height, $type, $attr) = getimagesize(FCPATH.'themes/default/images/'.$file_name);
			$width = 'width="'.$width.'"';
			$height = 'height="'.$height.'"';
		}
		else
		{
			$width = '';
			$height = '';
		}
		
		if($title)
			$title = 'title="'.$title.'"';
			
		if($alt) $alt = 'alt="'.$alt.'"';
		else $alt = 'alt=" "';
			
		if($style)
			$style = 'style="'.$style.'"';
		
		$img = '<img '.$id.' '.$class.' src="'.$url.'/'.$file_name.'" '.$title.' '.$alt.' '.$width.' '.$height.' '.$style.' '.$event.'/>';
		
		return $img;
	}
}

/* End of file misc_helper.php */
/* Location: ./module/helpers/misc_helper.php */