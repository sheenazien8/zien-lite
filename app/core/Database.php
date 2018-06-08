<?php
	class Database
	{
		private static $_instace = null;
		private $mysqli,
				$host = 'localhost',
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
	    public function assoc($data)
	    {	
	    	$query = $data;
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
		    		$nilaiArrays[$i] = $nilai;
		    	}else {
		    		$nilaiArrays[$i] = "'". $nilai ."'";
		     	}
		     	$i++;
			}

			//methode untuk mengambil key(kolom) dari arrray dan di pisah dengan koma oleh methode implode()
		    $nilai = implode(",",$nilaiArrays);
		    $query = "INSERT INTO $table ($column) VALUES ($nilai)";
		    
		    return $this->mysqli->query($query);
		}

		public function edit($table, $id)
		{
			$reply = [];
			$query = "SELECT * FROM $table WHERE id = '$id'";
			$result = $this->mysqli->query($query);
	    	foreach ($result as $value)
	    		$reply[] =$value;

	    	return $reply;
		}
		public function update($table, $array = [],$id)
		{
			$column = array_keys($array);
			//mengambil nilai
			$i = 0;
			$nilai = array_values($array);
			foreach ($array as $value) {
				$query = "UPDATE $table SET $column[$i] = '$nilai[$i]'  WHERE id = '$id'";
				$i++;
				$this->mysqli->query($query);
			}
			return $this;
		}

		public function delete($table,$id)
		{
			$query = "DELETE FROM $table WHERE id = '$id'";
			return $this->mysqli->query($query);
		}

		public function where($data)
		{
			$reply= [];
			$query = $data;
			$result = $this->mysqli->query($query);
			
	    	foreach ($result as $value)
	    		$reply[] =$value;
	    	return $reply;
		}

		public function whereStatus($table,$where,$data)
	    {
	    	$reply= [];
	    	$query = "SELECT * FROM $table WHERE $where = '$data'";
	    	$result = $this->mysqli->query($query);
	    	foreach ($result as $value)
	    		$reply[] =$value;
	    	return $reply;
	    }

	    public function getInfo($table,$column,$value)
	    {
			if (!is_int($value)) {
				$value = "'". $value."'";
			}else {
				$value = $value = $value;
			}
			//memnilih table dari database
			$query = "SELECT * FROM $table WHERE $column = $value";
			//eksekusi query
			$hasil = $this->mysqli->query($query);
			//mengambil isi data dari database
			while ($row = $hasil->fetch_assoc()) {
				return $row;
			}
	    }
	}

?>
