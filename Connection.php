<?php
	class Connection{
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
	}
?>
