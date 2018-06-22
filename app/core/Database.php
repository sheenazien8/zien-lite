<?php
	class Database
	{
		private static $_instace = null;
		private $mysqli,
				$host = '',
                $username = '',
                $pass = '',
                $dbname = '';

	    public function __construct()
	    {
	    	$this->mysqli = new mysqli($this->host, $this->username, $this->pass, $this->dbname);
            if (mysqli_connect_error()) {
                die("koneksi ke database error");
            }
	    }

	    public static function getInstance()
	    {
	    	if (!isset(self::$_instace)) {
	    		self::$_instace = new Database();
	    	}
	    	return self::$_instace;
	    }
	    
	    public function sql($data)
	    {	
	    	$reply= [];
	    	$query = $data;
	    	$result = $this->mysqli->query($query);
	    	foreach ($result as $value)
	    		$reply[] =$value;
	    	return $reply;
	    }
	    
	    public function assoc($table)
	    {	
	    	$query = "SELECT * FROM $table";
	    	$result = $this->mysqli->query($query);
	    	while ($row = $result->fetch_assoc()) {
	    	    return $row;
	    	}
	    }

	    public function index($table)
	    {
	    	$reply= [];
	    	$query = "SELECT * FROM $table";
	    	$result = $this->mysqli->query($query);
	    	
	    	foreach ($result as $value)
	    		$reply[] =$value;
	    	return $reply;

	    }
	    // fungsi2 CRUD

	    public function insert($table, $array = [])
	    {
	      	//methode untuk mengambil key(kolom) dari arrray dan di pisah dengan koma oleh methode implode()
		    $column = implode(",", array_keys($array));
		    //mengambil nilai
		    
		    $i = 0;
		    $nilaiArrays = array();
		    foreach ($array as $key => $nilai) {
		    	if (is_int($nilai)) {
		    		$nilaiArrays[$i] = $this->escape($nilai);
		    	}else {
		    		$nilaiArrays[$i] = "'". $this->escape($nilai) ."'";
		     	}
		     	$i++;
			}

			//methode untuk mengambil key(kolom) dari arrray dan di pisah dengan koma oleh methode implode()
		    $nilai = implode(",",$nilaiArrays);
		    $query = "INSERT INTO $table ($column) VALUES ($nilai)";
		    
		    return $this->mysqli->query($query);
		}

		public function update($table, $array = [],$field,$id)
		{
			$column = array_keys($array);
			//mengambil nilai
			$i = 0;
			$nilai = array_values($array);
			foreach ($array as $value) {
				$query = "UPDATE $table SET $column[$i] = '$nilai[$i]'  WHERE $field = '$id'";
				$i++;
				// echo print_r($query)."<br>";
				$this->mysqli->query($query);
			}
			// die();
			return $this;
		}

		public function delete($table,$field,$id)
		{
			$query = "DELETE FROM $table WHERE $field = '$id'";
			return $this->mysqli->query($query);
		}

	    public function getInfo($table, $field = '', $value = '')
    	{   
        
			if ($field != ''){
				$value = $this->escape($value);
				if ( !is_int($value) ){
					$value = "'". $value ."'";
				}
				$query = "SELECT * FROM $table WHERE $field = $value";
				$result = $this->mysqli->query($query);

				while($row = $result->fetch_assoc()){
					return $row;
				}
			} else {
				$query = "SELECT * FROM $table";
				$result = $this->mysqli->query($query);
				while($row = $result->fetch_assoc()){
					$rows[] = $row;
				}
				return $rows;
			}

    	}
    	public function escape($value)
	    {
	        return $this->mysqli->real_escape_string($value);
	    }

	    public function runQuery($query)
	    {
	        if ($this->mysqli->query($query)) return true;
	        else return false;
	    }
	}

?>