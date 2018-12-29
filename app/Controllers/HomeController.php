<?php
namespace App\Controllers;

use App\Models\Home;
use ZL\Controller;

class HomeController extends Controller
{
	public function index()
	{
        return view('home', compact('test'));
	}
}
