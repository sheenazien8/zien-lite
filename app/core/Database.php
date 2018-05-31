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
                $dbname = 'user';

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
	}

?>
