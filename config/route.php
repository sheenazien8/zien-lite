<?php
	class Route
	{
		protected $controller;
		// jika user tidak memasukkan method maka otomatis index
		protected $method;
		protected $parameter = [];


		public function __construct()
		{
			require_once __DIR__.'/../app/init.php';
		}

		public function uri($url, $controller, $method, $name = null)
		{
			$uri = urldecode(
    			parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
			);

			// This file allows us to emulate Apache's "mod_rewrite" functionality from the
			// built-in PHP web server. This provides a convenient way to test a Laravel
			// application without having installed a "real" web server software here.
			if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
				return false;
			}

			if ($uri == $url) {
				try {
					$this->controller = $controller;
					if (file_exists(__DIR__.'/../app/controllers/'.$this->controller.'.php')) {
						$this->controller = $controller;
					}else {
						return require_once '/../app/views/error/404.php';;
					}
					require_once __DIR__."/../app/controllers/".$this->controller.'.php';
					$this->controller = new $this->controller;
					$this->method = $method;
					return call_user_func_array([$this->controller,$this->method],$this->parameter);
				} catch (Exception $e) {
					die('page not found');
				}
			}
		}
	}
?>
