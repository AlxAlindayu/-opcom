<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/** 
 * CACHE
 *
 * To make static site fast.
 *
 * @author		Enalds
 * @copyright	Copyright (c) 2011 - 2012, CreationEyed.
 *
 * @since		CE Version 2.0
 * @version		1.0
 */
class Cache
{	
	function is_cache()
	{
		$CI =& get_instance();
		// Set this to TRUE if you want to use cache OR FALSE to disabled it. [Enalds]
		$cache = FALSE;
		$min = 5; // Set minute of cache.
		
		if($cache == FALSE)
		{
			// DO NOTHING
		}
		else
		{
			$CI->output->cache($min);
		}
		
		// ADD ON. Set this to TRUE if you want to show the benchmark results of the page OR FALSE to disabled it. [Enalds]
		$profiler = FALSE;
		
		if($profiler == FALSE)
		{
			// DO NOTHING
		}
		else
		{
			$CI->output->enable_profiler(TRUE);
		}
	}
}

/* End of file cache.php */
/* Location: ./module/hooks/cache.php */