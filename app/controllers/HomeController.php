<?php
namespace App\Controller\HomeController;

use App\Core\Controller;

class HomeController extends Controller{
	public function index($home, $oke)
	{
        dump($home, $oke);
        return $this->view('home');
	}

    public function store()
    {
        dump('ok');
    }
}
