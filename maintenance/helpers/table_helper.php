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
if ( ! function_exists('table'))
{
	function table($value = array(),$attr='')
	{
		$text = "";
		$text .= "<table {$attr}>";
		
		foreach($value as $arr)
		{
			foreach($arr as $data => $value)
			{
				$separator = explode("|",$data);
				$arr_count = count($arr);
				if($separator[0] === "text")
				{
					if(count($separator) != 2)
					{
						$text .= '
							<tr>
								<td>'.$value.'</td>
						';
					}
					else
					{
						if($separator[1] === "closed")
						{
							$text .= '
								<tr>
									<td>'.$value.'</td>
								</tr>
							';
							break;
						}
						else
						{
							$text .= 'Error';
						}
					}
				}
				else if($separator[0] === "input")
				{
					$how_many_separator = count($separator);
					if($how_many_separator == 1)
					{
						$text .= '
							Error Missing 2nd Parameter
						';
					}
					else
					{
						$separator_value = explode("|",$value);
						
						$i = 0;
						$o = 1;
						while($how_many_separator >= $o)
						{
							if($o == $how_many_separator)
							{
								if($separator[$i] === "closed")
								{
									$text .= '
										/></td>
										</tr>
									';
									$text = str_replace('td_replace', '', $text);
									$text = str_replace('tr_replace', '', $text);
									$o++;
									$i++;
								}
								else
								{
									echo '
										<div style="background:red; color:#fff; font-size:80%; padding:10px;">
											<b>ERROR:</b>
											<br />
											- There is no "closed" data in your input!
										</div>
									';
									break;
								}
							}
							else
							{
								if($separator[$i] === "input")
								{
									if($arr_count === 1)
									{
										$text .= '
											<tr tr_replace>
											<td td_replace><input type="'.$separator_value[$i].'" 
										';
									}
									else
									{
										$text .= '
											<td td_replace><input type="'.$separator_value[$i].'" 
										';
									}
								}
								else if($separator[$i] === "input2")
								{
									$text .= '
										/><input type="'.$separator_value[$i].'" 
									';
								}
								// ID
								else if($separator[$i] === "id")
								{
									$text .= '
										id="'.$separator_value[$i].'"
									';
								}
								// CLASS
								else if($separator[$i] === "class")
								{
									$text .= '
										class="'.$separator_value[$i].'"
									';
								}
								// NAME
								else if($separator[$i] === "name")
								{
									$text .= '
										name="'.$separator_value[$i].'"
									';
								}
								// VALUE
								else if($separator[$i] === "value")
								{
									$text .= '
										value="'.$separator_value[$i].'"
									';
								}
								// STYLE
								else if($separator[$i] === "style")
								{
									$text .= '
										style="'.$separator_value[$i].'"
									';
								}
								// PLACEHOLDER
								else if($separator[$i] === "placeholder")
								{
									$text .= '
										placeholder="'.$separator_value[$i].'"
									';
								}
								// TR
								else if($separator[$i] === "tr")
								{
									$a = $how_many_separator-$i;
									$text = str_replace('tr_replace', $separator_value[$i], $text);
								}
								// TD
								else if($separator[$i] === "td")
								{
									$text = str_replace('td_replace', $separator_value[$i], $text);
								}
								// Closed
								else if($separator[$i] === "closed")
								{
									echo '
										<div style="background:red; color:#fff; font-size:80%; padding:10px;">
											<b>ERROR:</b>
											<br />
											- closed data must be place in the end of data statement. Or your closed data is doubled and so on.
										</div>
									';
									break;
								}
								// Error
								else
								{
									$text .= '
										There is no data like that.
									';
								}
								$i++;
								$o++;
							}
						}
					}
				}
				else
				{
				
				}
			}
		}
		$text .= "</table>";
		
		return $text;
	}
}

/* End of file validation_helper.php */
/* Location: ./module/helpers/validation_helper.php */