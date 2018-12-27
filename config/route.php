<?php
require_once 'request.php';
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
		$arguments = explode('@', $args[1]);
		$arguments = [$args[0], $arguments[0], $arguments[1]];
		list($route, $controller ,$method) = $arguments;
		$this->__init($route, $controller, $method);
	}

	public function __init($route, $controller, $method)
	{
		$this->controller($controller);
		$this->method($method);
		$this->route($route);
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
		require_once $this->require_once;
		$this->controller = "App\Controllers\\".$this->controller;
		call_user_func_array([new $this->controller, $this->method], ['oke']);
	}
	public function __destruct()
	{
		$this->resolve();
	}
	// function resolve()
	// {
	// 	dump('resolve', $this->request->requestMethod);
	// 	$methodDictionary = $this->{strtolower($this->request->requestMethod)};
	// 	$formatedRoute = $this->formatRoute($this->request->requestUri);
	// 	$method = $methodDictionary[$formatedRoute];
	// 	if(is_null($method)){
	// 		$this->defaultRequestHandler();

	// 		return;
	// 	}
	// 	dump((array)$method, (array)$this->request);
	// 	echo call_user_func_array($method, array($this->request));
	// }
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
