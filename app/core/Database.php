<?php
	/**
	 * summary
	 */
	class Database
	{
		private static $_instace = null;
		private $mysqli,
				$host = 'localhost',
                $username = 'root',
                $pass = 'root',
                $dbname = 'tutorial';

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
	}

?>
