<?php
class Route
{
	private $request;
	private $method;
	private $controller;
	private $params;
	private $require;
	private $require_once;
	private $supportedHttpMethods = ["GET","POST"];


	function __construct()
	{
		require_once __DIR__."/../app/init.php";
		$this->require = __DIR__.'/../app/Controllers/';
		$this->bootstrapSelf();
	}

	function __call($name, $args)
	{
		$this->supportedHttpMethods;
		$arguments = explode('@', $args[1]);
		$arguments = [$args[0], $arguments[0], $arguments[1]];
		list($route, $controller ,$method) = $arguments;
		$this->__init($route, $controller, $method);
	}

	public function __init($route, $controller, $method)
	{
		if ($this->requestUri != $route) {
			return view('404');
		}else {
			$this->controller($controller);
			$this->method($method);
			$this->route($route);
		}
	}

	private function bootstrapSelf()
    {
        foreach($_SERVER as $key => $value){
            $this->{$this->toCamelCase($key)} = $value;
        }
    }

    private function toCamelCase($string)
    {
        $result = strtolower($string);

        preg_match_all('/_[a-z]/', $result, $matches);
        foreach($matches[0] as $match){
            $c = str_replace('_', '', strtoupper($match));
            $result = str_replace($match, $c, $result);
        }
        return $result;
    }

	public function route($route)
	{
		if ($this->requestUri == $route) {
			try {
				$this->require_once = $this->require.$this->scriptFilename.'.php';
			} catch (Exception $e) {
				$e->getMessage();
			}
		}else {

		}
	}

	public function method($method)
	{
		return $this->method = $method;
	}

	public function controller($controller)
	{
		$this->scriptFilename = $controller;

		return $this->controller = $this->scriptFilename;
	}
	/**
	* Removes trailing forward slashes from the right of the route.
	* @param route (string)
	*/

	public function resolve()
	{
		if ($this->controller) {
			require_once $this->require_once;
			$this->controller = "App\Controllers\\".$this->controller;
			$this->params = [];
			call_user_func_array([new $this->controller, $this->method], $this->params);
		}
	}
	public function __destruct()
	{
		$this->resolve();
	}
}
$routes = new Route();
