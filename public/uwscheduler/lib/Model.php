<?php

class Model{
	private static $_table_cache = array();

	public function __construct()
	{
		
	}
	
	public function populate($data)
	{
		foreach ((array)$data as $key => $value)
		{
			$this->{$key} = $value;
		}
	}
	
	public function save()
	{
		$pk = static::_get_primary_key();
		
		if (!isset($this->{$pk}))
		{
			$this->created_at = date('Y-m-d H:i:s');
			$this->updated_at = date('Y-m-d H:i:s');
			return static::insert($this);
		}
		else 
		{
			$this->updated_at = date('Y-m-d H:i:s');
			return static::update($this);
		}
	}
	
	public static function _get_primary_key()
	{
		return static::$_primary_key;
	}
	
	public static function _get_fields($table_name, $connection = null)
	{
		if (isset(self::$_table_cache[$table_name]))
			return self::$_table_cache[$table_name];
		
		if($connection == null) $connection = $GLOBALS['default'];
		$fieldset = self::run_query("DESC " . static::$_table_name, $connection);
		
		while ($row = mysqli_fetch_assoc($fieldset))
		{
			$fields[] = $row['Field'];
		}
				
		return self::$_table_cache[$table_name] = $fields;
	}
	
	public static function update(Model $model, $connection = null)
	{
		if($connection == null) $connection = $GLOBALS['default'];
		$table_fields = self::_get_fields(static::$_table_name, $connection);
		
		$fields = array();
		foreach ($table_fields as $field)
		{
			if ($field != static::$_primary_key)
			{
				if (is_null($model->$field))
					$fields[] = '`' . $field . "` = NULL";
				else
					$fields[] = '`' . $field . "` = '" . self::me($model->$field) . "'";
			}
		}
		
		$sql = "UPDATE " . static::$_table_name . " SET " . implode(",", $fields) . " WHERE " . static::$_primary_key . " = '" . $model->{static::$_primary_key} . "'";
		
		$resource = self::run_query($sql);
		
		return $model;
	}
	
	public static function insert(Model $model, $connection = null)
	{
		if($connection == null) $connection = $GLOBALS['default'];
		
		$table_fields = self::_get_fields(static::$_table_name);
		
		$fields = array();
		$values = array();
		
		foreach ($table_fields as $field)
		{
			if (isset($model->$field))
			{
				$fields[] = '`' . $field . '`';
				
				$values[] = self::me($model->$field);
			}
		}
		
		$sql = "INSERT INTO " . static::$_table_name . " (" . implode(",", $fields) . ") VALUES ('" . implode("','", $values) . "');";
		
		$resource = self::run_query($sql);
		
		

		$pk_id = mysqli_insert_id($connection);
		
		$primary_key = static::$_primary_key;
		$model->$primary_key = $pk_id;
		
		return $model;
	}
	
	public static function find($selector, $connection = null)
	{
		$wheres = array();
		
		foreach ($selector as $key => $value)
		{
			$wheres[] = $key . " = '" . self::me($value) . "'";
		}

		$results = self::find_all(implode(" AND ", $wheres), null, 1, $connection);

		return array_shift($results);
	}
	
	// multiple
	public static function find_all($where = null, $order = null, $limit = null, $connection = null)
	{
		$sql = "SELECT * FROM " . static::$_table_name . " ";

		if (!is_null($where))
			$sql .= "WHERE " . $where . " ";
		
		if (!is_null($order))
			$sql .= "ORDER BY " . $order . " ";
		
		if (!is_null($limit))
			$sql .= "LIMIT " . $limit;
				
		return self::find_by_sql($sql, $connection);
	}
	
	// any
	public static function find_by_sql($sql, $connection = null)
	{
		if($connection == null) $connection = $GLOBALS['default'];
		
		$resource = mysqli_query($connection, $sql);		
		if (mysqli_error($connection))
		{
			throw new Exception(mysqli_error($connection));
		}
		
		$results = self::create_set($resource);

		return $results;
	}
	
	
	public static function create_set($resource)
	{
		$result = array();
		
		while ($row = mysqli_fetch_assoc($resource))
		{
			$cn = get_called_class();
			$row_obj = new $cn();
			
			$row_obj->populate($row);
	
			$result[] = $row_obj;		
		}
		
		return $result;
	}
	
	public static function run_query($sql, $connection = null)
	{
		if($connection == null) $connection = $GLOBALS['default'];
		$resource = mysqli_query($connection, $sql);
	
		if (mysqli_error($connection))
		{
			throw new Exception(mysqli_error($connection));
		}		
		
		return $resource;
	}
	
	public static function delete(Model $model, $connection = null)
	{
		if($connection == null) $connection = $GLOBALS['default'];
		$sql = "DELETE FROM " . static::$_table_name . " WHERE id = '" . $model->id . "' LIMIT 1";
		
		self::run_query($sql, $connection);
	}

	public static function delete_where($conditions, $connection = null)
	{
		if($connection == null) $connection = $GLOBALS['default'];
		if (!$conditions)
		{
			throw new Exception('You must pass a condition into Model::delete_where');
		}
		
		$sql = "DELETE FROM " . static::$_table_name . " WHERE " . $conditions;
		
		self::run_query($sql, $connection);
	}
	
	public static function mkError($errorMsg="")
	{
		return json_encode(array('success' => 0,'data'=>NULL,'error'=>$errorMsg));
	}
	
	public static function mkResponse($data=NULL)
	{
		return json_encode(array('success' => 1,'data'=>$data));
	}

	
	public static function me($val, $connection = null)
	{
		if($connection == null) $connection = $GLOBALS['default'];
		return mysqli_real_escape_string($connection, $val);
	}
}
?>
