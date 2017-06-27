<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
/** 
 * QMODEL
 *
 * QModel is the first database model of CE.
 *
 * @author		Enalds
 * @copyright	Copyright (c) 2011 - 2013, CreationEyed.
 *
 * @since		CE Version 2.0
 * @version		1.1
 */
class QModel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->db->cache_on();
	}

	function __destruct()
	{
		$this->db->close();
		$this->db->cache_off();
	}
	
	/** 
	 * SF
	 *
	 * SELECT/FROM
	 *
	 * @author		Enalds
	 * @db			DB table name.
	 * @order_by	ORDER BY.
	 * @limit		LIMIT
	 *
	 * @since		CE Version 2.0
	 *
	 * @version		3.0
	 */
	function sf($db='', $order_by='', $limit='')
	{
		if($order_by === TRUE)
		{
			$db_selected = $this->load->database("default",TRUE);
			$default_tbl	= "";
			
			foreach($db as $statement => $value)
			{
				$statement = strtolower($statement);
				
				if($statement === "select")
				{
					$db_selected->select($value);
				}
				else if($statement === "from")
				{
					$default_tbl = $value;
				}
				else if($statement === "db")
				{
					$db_selected = $this->load->database($value,TRUE);
				}
				else if($statement === "order_by")
				{
					$db_selected->order_by($value);
				}
				else if($statement === "limit")
				{
					$limits = explode(',',$value);
					if(count($limits) == 1)
					{
						echo '
							<div style="background:red; color:#fff; font-size:80%; padding:10px;">
								<b>ERROR:</b>
								<br />
								- There is an error on QModel. There is no statement ('.$statement.')!
							</div>
						';
					}
					else
					{
						$db_selected->limit($limits[0],$limits[1]);
					}
				}
				else
				{
					echo '
						<div style="background:red; color:#fff; font-size:80%; padding:10px;">
							<b>ERROR:</b>
							<br />
							- There is an error on QModel. There is no second value! (ex: 1,0)
						</div>
					';
				}
			}

			$query = $db_selected->get($default_tbl);
			
			return $query;
		}
		else
		{
			if(is_array($db))
			{
				$i = 1;
				foreach($db as $many)
				{
					if($i == 1)
					{
						if( ! $many)
						{
							$db_selected = $this->load->database('default',TRUE);
						}
						else
						{
							$db_selected = $this->load->database($many,TRUE);
						}
					}
					else if($i == 2)
					{
						$ask = $many;
					}
					else if($i == 3)
					{
						$db = $many;
					}
					else
					{
						echo '
							<div style="background:red; color:#fff; font-size:80%; padding:10px;">
								<b>ERROR:</b>
								<br />
								- There is an error on QModel. Too many array parameters!
							</div>
						';
					}
					$i++;
				}
			}
			else
			{
				$db_selected = $this->load->database('default',TRUE);
				$ask = "*";
			}
			$db_selected->select($ask);
			
			if($order_by)
				$db_selected->order_by($order_by);
			
			if($limit)
			{
				$limits = explode(',',$limit);
				if(count($limits) == 1)
				{
					echo '
						<div style="background:red; color:#fff; font-size:80%; padding:10px;">
							<b>ERROR:</b>
							<br />
							- There is an error on QModel. There is no second value! (ex: 1,0)
						</div>
					';
				}
				else
				{
					$db_selected->limit($limits[0],$limits[1]);
				}
			}

			$query = $db_selected->get($db);
			
			return $query;
		}
	}

	/** 
	 * SFWA
	 *
	 * SELECT/FROM/WHERE/AND
	 *
	 * @author		Enalds
	 * @db			DB table name.
	 * @tbl			DB table column or field name.
	 * @val			Value of that column or field name.
	 * @order_by	ORDER BY.
	 * @limit		LIMIT
	 *
	 * @since		CE Version 2.0
	 *
	 * @version		3.0
	 */
	public function sfwa($db='', $tbl='', $val='', $order_by='', $limit='')
	{
		if($tbl === TRUE)
		{
			$db_selected = $this->load->database("default",TRUE);
			$default_tbl	= "";
			
			foreach($db as $statement => $value)
			{
				$statement = strtolower($statement);
				
				if($statement === "select")
				{
					$db_selected->select($value);
				}
				else if($statement === "from")
				{
					$default_tbl = $value;
				}
				else if($statement === "db")
				{
					$db_selected = $this->load->database($value,TRUE);
				}
				else if($statement === "where")
				{
					$limits = explode(',',$value);
					$db_selected->where($limits[0],$limits[1]);
				}
				else if($statement === "order_by")
				{
					$db_selected->order_by($value);
				}
				else if($statement === "limit")
				{
					$limits = explode(',',$value);
					if(count($limits) == 1)
					{
						echo '
							<div style="background:red; color:#fff; font-size:80%; padding:10px;">
								<b>ERROR:</b>
								<br />
								- There is an error on QModel. There is no statement ('.$statement.')!
							</div>
						';
					}
					else
					{
						$db_selected->limit($limits[0],$limits[1]);
					}
				}
				else
				{
					echo '
						<div style="background:red; color:#fff; font-size:80%; padding:10px;">
							<b>ERROR:</b>
							<br />
							- There is an error on QModel. There is no second value! (ex: 1,0)
						</div>
					';
				}
			}

			$query = $db_selected->get($default_tbl);
			
			return $query;
		}
		else
		{
			if(is_array($db))
			{
				$i = 1;
				foreach($db as $many)
				{
					if($i == 1)
					{
						if( ! $many)
						{
							$db_selected = $this->load->database('default',TRUE);
						}
						else
						{
							$db_selected = $this->load->database($many,TRUE);
						}
					}
					else if($i == 2)
					{
						$ask = $many;
					}
					else if($i == 3)
					{
						$db = $many;
					}
					else
					{
						echo '
							<div style="background:red; color:#fff; font-size:80%; padding:10px;">
								<b>ERROR:</b>
								<br />
								- There is an error on QModel. Too many array parameters!
							</div>
						';
					}
					$i++;
				}
			}
			else
			{
				$db_selected = $this->load->database('default',TRUE);
				$ask = "*";
			}
			$db_selected->select($ask);

			if(is_array($tbl) && is_array($val))
			{
				$i = 1;
				$values = 0;
				foreach($tbl as $cols)
				{
					$db_selected->where($cols,$val[$values]);
					$i++;
					$values++;
				}
			}
			else
			{
				$db_selected->where($tbl,$val);
			}
			
			if($order_by)
				$db_selected->order_by($order_by);
			
			if($limit)
			{
				$limits = explode(',',$limit);
				if(count($limits) == 1)
				{
					echo '
						<div style="background:red; color:#fff; font-size:80%; padding:10px;">
							<b>ERROR:</b>
							<br />
							- There is an error on QModel. There is no second value! (ex: 1,0)
						</div>
					';
				}
				else
				{
					$db_selected->limit($limits[0],$limits[1]);
				}
			}

			$query = $db_selected->get($db);

			return $query;
		}
	}
	
	/** 
	 * QUERY
	 *
	 * ANYTHING YOU WANT TO DO.
	 *
	 * @author		Enalds
	 * @content		DB Query
	 *
	 * @since		CE Version 2.0
	 *
	 * @version		2.0
	 */
	public function query($content='',$sanitize='')
	{
		if(is_array($content))
		{
			$db_selected = $this->load->database('default',TRUE);
			$i = 0;
			$a = "";
			$b = "";
			foreach($content as $value)
			{
				if($i == 0)
				{
					$db_selected = $this->load->database($value,TRUE);
				}
				else
				{
					$a = $value;
				}
				$i++;
			}

			$query = $db_selected->query($a,$sanitize);
		}
		else
		{
			$db_selected = $this->load->database('default',TRUE);
			$query = $db_selected->query($content,$sanitize);
		}
		
		return $query;
	}
	
	/** 
	 * GET
	 *
	 * Fetching the data.
	 *
	 * @author		Enalds
	 * @content		DB Query
	 *
	 * @since		CE Version 2.0
	 *
	 * @version		2.1
	 */
	public function g($var='', $type = FALSE)
	{
		if($type)
			$get = $var->result_array();
		else
			$get = $var->row_array();
		
		return $get;
	}
	
	/** 
	 * COUNT
	 *
	 * Count the rows.
	 *
	 * @author		Enalds
	 * @var			DB Query
	 *
	 * @since		CE Version 2.0
	 *
	 * @version		2.0
	 */
	public function c($var='')
	{
		$query = $var->num_rows();
		
		return $query;
	}
	
	/** 
	 * INSERT
	 *
	 * Insert a data
	 *
	 * @author		Enalds
	 * @var			DB Query
	 *
	 * @since		CE Version 3.2
	 *
	 * @version		1.0
	 */
	public function insert($tbl='', $data='', $connect='')
	{
		if($connect)
		{
			$db_selected = $this->load->database($connect,TRUE);
		}
		else
		{
			$db_selected = $this->load->database('default',TRUE);
		}
		
		$query = $db_selected->insert($tbl,$data);
		
		return $query;
	}
	
	/** 
	 * UPDATE
	 *
	 * Update a data
	 *
	 * @author		Enalds
	 * @var			DB Query
	 *
	 * @since		CE Version 3.2
	 *
	 * @version		1.0
	 */
	public function update($tbl='', $data='', $where='', $connect='')
	{
		if($connect)
		{
			$db_selected = $this->load->database($connect,TRUE);
		}
		else
		{
			$db_selected = $this->load->database('default',TRUE);
		}
		
		if($where)
		{
			foreach($where as $column => $value)
			{
				$db_selected->where($column,$value);
			}
		}
		
		$query = $db_selected->update($tbl,$data);
		
		return $query;
	}
	
	/** 
	 * DELETE
	 *
	 * Delete a data
	 *
	 * @author		Enalds
	 * @var			DB Query
	 *
	 * @since		CE Version 3.2
	 *
	 * @version		1.0
	 */
	public function delete($tbl='', $where='', $connect='')
	{
		if($connect)
		{
			$db_selected = $this->load->database($connect,TRUE);
		}
		else
		{
			$db_selected = $this->load->database('default',TRUE);
		}
		
		if($where)
		{
			foreach($where as $column => $value)
			{
				$db_selected->where($column,$value);
			}
		}
		
		$query = $db_selected->delete($tbl);
		
		return $query;
	}
}