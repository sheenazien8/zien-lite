<?php
	class Controller {
		public function view($file, $data =[])
		{
			require_once '../app/views/'.$file.'.php';
		}

		public function model($file)
		{
			require_once '../app/models/'.$file.'.php';
			// mengambil nilai object
			return new $file();
		}
		public function request($name)
		{
			if ($_POST[$name]) {
				return $_POST[$name];
			}elseif ($_GET[$name]) {
				return $_POST[$name];
			}
			return false;
		}

		public function back()
		{
			return header('Location: ../');
		}

	}
?>
