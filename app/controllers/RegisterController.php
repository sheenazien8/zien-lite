<?php
	require '../../start.php';
	use Models\Register;

	class RegisterController
	{
		public function index()
		{

		}

		public function create()
		{
			Register::insert([
				'fullname' => Input::getPost('fullname'),
				'username' => Input::getPost('username'),
				'email' => Input::getPost('email'),
				'password' => Input::getPost('password')
			]);
		}
	}

	RegisterController::create();

 ?>
