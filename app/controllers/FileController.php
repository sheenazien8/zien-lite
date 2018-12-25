<?php
    namespace App\Controllers;
    use App\Core\Controller;

	class FileController extends Controller{
		public function index()
		{
            return $this->view('home');
		}

        public function store()
        {
            dump('ok');
        }
	}
