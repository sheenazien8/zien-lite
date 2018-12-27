<?php
namespace App\Core;

class Controller {
	public function view($file, $data =[])
	{
		require_once 'app/views/'.$file.'.php';
	}

	public function model($file)
	{
		require_once 'app/models/'.$file.'.php';
		return new $file();
	}
}
