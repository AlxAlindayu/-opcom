<?php  if( !defined('BASEPATH')) exit('No direct script access allowed');
/** 
 * Easy PHP Validation
 *
 * @author		Enalds
 * @copyright	Copyright (c) 2011 - 2013, CreationEyed.
 * @value		ARRAY
 *
 * @since		CE Version 3.1
 *
 * @version		1.1
 *
 * 1.1
 * - Added Validation Helper Error.
 * - Changed - to |
 */
if ( ! function_exists('filter'))
{
	function filter($value = array())
	{
		foreach($value as $key => $filter)
		{
			$ex = explode("|",$key);
			
			if(count($ex) < 3)
			{
				exit("<h1>Validation Helper Error:</h1> Missing parameters.");
			}
			else
			{
				if( ! $filter)
				{
					if($ex[0] === "required")
					{
						if($ex[1] === "ES")
						{
							$msg = "Please select {$ex[2]}.";
						}
						else if($ex[1] === "ER")
						{
							$msg = "Please choose {$ex[2]}.";
						}
						else
						{
							$msg = "Please fill up {$ex[2]}.";
						}
						
						return $msg;
					}
					else if($ex[0] === "not")
					{
						// Do Nothing
					}
					else
					{
						exit("<h1>Validation Helper Error:</h1> First parameter must be required or not only.");
					}
				}
				else
				{
					if(count($ex) == 3)
					{
						$ex[3] = 0;
						$ex[4] = 99999999999;
					}
					
					if(strlen($filter) > $ex[4] OR strlen($filter) < $ex[3])
					{
						$msg = "{$ex[2]} must be between {$ex[3]} - {$ex[4]} characters only.";
						
						return $msg;
					}
					else
					{
						if($ex[1] === "STR")
						{
							if( ! preg_match(FILTER_STR,$filter))
							{
								$msg = "Invalid {$ex[2]}. You can only use this characters (a-z,A-Z, ).";
						
								return $msg;
							}
						}
						else if($ex[1] === "INT")
						{
							if( ! preg_match(FILTER_INT,$filter))
							{
								$msg = "Invalid {$ex[2]}. You can only use this characters (0-9).";
						
								return $msg;
							}
						}
						else if($ex[1] === "INT_DEC")
						{
							if( ! preg_match(FILTER_INT_DEC,$filter))
							{
								$msg = "Invalid {$ex[2]}. You can only use this characters (0-9,.).";
						
								return $msg;
							}
						}
						else if($ex[1] === "STR_INT")
						{
							if( ! preg_match(FILTER_STR_INT,$filter))
							{
								$msg = "Invalid {$ex[2]}. You can only use this characters (a-z,A-Z,0-9,).";
						
								return $msg;
							}
						}
						else if($ex[1] === "STR_INT_SPA")
						{
							if( ! preg_match(FILTER_STR_INT_SPA,$filter))
							{
								$msg = "Invalid {$ex[2]}. You can only use this characters (a-z,A-Z,0-9, ).";
						
								return $msg;
							}
						}
						else if($ex[1] === "USERNAME")
						{
							if( ! preg_match(FILTER_USERNAME,$filter))
							{
								$msg = "Invalid {$ex[2]}. You can only use this characters (a-z,A-Z,0-9,_, ).";
						
								return $msg;
							}
						}
						else if($ex[1] === "EMAIL")
						{
							if( ! preg_match(FILTER_EMAIL,$filter))
							{
								$msg = "Invalid {$ex[2]}. Please input a valid email address.";
						
								return $msg;
							}
						}
						else if($ex[1] === "E" OR $ex[1] === "ES" OR $ex[1] === "ER")
						{
							// Do Nothing
						}
						else
						{
							exit("<h1>Validation Helper Error:</h1> There is no filter type <b>{$ex[1]}</b> like that. Please change it to <b>E</b>.");
						}
					}
				}
			}
		}
	}
}

/* End of file validation_helper.php */
/* Location: ./module/helpers/validation_helper.php */