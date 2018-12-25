<?php
	class Route
	{
		protected $controller;
		protected $method;
		protected $parameter = [];

		public function __construct()
		{
			require_once __DIR__."/../app/init.php";
		}

		public function autoload()
		{
		}

		public function uri($url, $controller, $method, $name = null)
		{
			$uri = urldecode(
    			parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
			);
			$explode = explode("/", filter_var($_SERVER['REQUEST_URI']));
			if ($uri == $url['url']) {
				try {
					$this->controller = $controller;
					if (file_exists(__DIR__.'/../app/controllers/'.$this->controller.'.php')) {
						$this->controller = $controller;
					}else {
						return require_once __DIR__.'/../app/views/error/404.php';
					}
					require_once __DIR__."/../app/controllers/".$this->controller.'.php';
					$this->controller = new $this->controller;
					$this->method = $method;
					$this->parameter;
					call_user_func_array([$this->controller,$this->method],$this->parameter);
					return true;
				} catch (Exception $e) {
					die('page not found');
				}
			}
		}
	}
    $routes = new Route();
