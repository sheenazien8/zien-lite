<?php

	class HomeController extends Controller
	{
	    public function index()
	    {
	    	$user = $this->model('User');

	    	return $this->view('content/index');

	    }

	    public function getUsers()
	    {
	    	$user = $this->model('User')->index();
	    	return $this->view('home',['users' => $user]);
	    }
	}
?>
