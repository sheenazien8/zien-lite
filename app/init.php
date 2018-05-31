 <?php
  session_start();

  spl_autoload_register(function($class)
  {
    require_once 'core/'.$class.'.php';
  });

  $GLOBALS['path'] = '/crud-oop/public/';

