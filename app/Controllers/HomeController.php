<?php
namespace App\Controllers;

use ZL\Controller;

class HomeController extends Controller
{
	public function index()
	{
        return view('home');
	}

    public function store()
    {
        dump('ok');
    }
}
