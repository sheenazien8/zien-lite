<?php
class Route
{
    protected $controller = "HomeController";
    // jika user tidak memasukkan method maka otomatis index
    protected $method = "index";
    protected $parameter = [];
    public function __construct()
    {
        if (isset($_GET['url'])) {
            $url = explode('/',filter_var(trim($_GET['url']),FILTER_SANITIZE_URL));
            $url[0] = $url[0]. "Controller";
        }else {
            $url = "home";
        }
        // ngechek file controller
        if (file_exists('../app/controllers/'.$url[0].'.php')) {
            $this->controller = $url[0];
        }else {
            return require_once '../app/views/error/404.php';;
        }
        require_once '../app/controllers/'. $this->controller .'.php';
        $this->controller= new $this->controller;
        // ngecheck method
        if (isset($url[1])) {
            if (method_exists($this->controller,$url[1])) {
                $this->method = $url[1];
            }
        }
        // echo '<pre>'.print_r($this->parameter,1).'</pre>';
        // die();
        unset($url[0]);
        unset($url[1]);
        $this->parameter =$url;
        call_user_func_array([$this->controller,$this->method],$this->parameter);
    }
    //     function __construct()
    // {
    //     require_once __DIR__."/../app/init.php";
    //     $this->require = __DIR__.'/../app/Controllers/';
    //     $this->bootstrapSelf();
    // }

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
