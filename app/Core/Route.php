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
    }
