<?php
    require_once 'config/route.php';
	$route = new Route();
    $route->uri('/', 'HomeController', 'index');
    $route->uri('/home', 'HomeController', 'oke');
?>
