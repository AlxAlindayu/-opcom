<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/** 
 * SOURCE CODE COMPRESS
 *
 * Compress the source codes.
 *
 * @author		Enalds
 * @copyright	Copyright (c) 2011 - 2013, CreationEyed.
 *
 * @since		CE Version 2.0
 * @version		1.1
 *
 * 1.1
 * - Added Removed CSS Comment. 04/17/2013
 */
function compress()
{
	$CI =& get_instance();
	// Set this to TRUE to enable to compress the view page source OR FALSE to disabled it. [Enalds]
	$compress = TRUE;
	
	if($compress == TRUE)
	{
		$CI->output->_display();
	}
	else
	{
		$buffer = $CI->output->get_output();
	 
		$search = array(
			'/\n/',									// replace end of line by a space
			'/\>[^\S ]+/s',							// strip whitespaces after tags, except space
			'/[^\S ]+\</s',							// strip whitespaces before tags, except space
			'/(\s)+/s',								// shorten multiple whitespace sequences
			'/\s*(?!<\")\/\*[^\*]+\*\/(?!\")\s*/'	// removed css comment.
		);
	 
		$replace = array(
			' ',
			'>',
			'<',
			'\\1',
			''
		);
	 
		$buffer = preg_replace($search, $replace, $buffer);

		$CI->output->set_output($buffer);
		$CI->output->_display();
	}
}
 
/* End of file compress.php */
/* Location: ./modules/hooks/compress.php */