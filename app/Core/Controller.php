<?php
namespace App\Core;

class Controller {
	public function view($file, $data =[])
	{
		require_once __DIR__.'/../../resources/views/'.$file.'.html';
	}

	public function model($file)
	{

	}
}
