<?php

if (!function_exists('dd')) {
    function dd()
    {
        $args = func_get_args();
        foreach ($args as $arg) {
            if (is_array($arg)) {
                echo '<pre>';
                print_r($arg);
                echo '</pre>';
                echo '<hr>';
            }else {
                echo '<pre>';
                echo $arg;
                echo '</pre>';
                echo '<hr>';
            }
        }
        die();
    }
}
if (!function_exists('dump')) {
    function dump()
    {
        $args = func_get_args();
        foreach ($args as $arg) {
            if (is_array($arg)) {
                echo '<pre>';
                print_r($arg);
                echo '</pre>';
                echo '<hr>';
            }else {
                echo '<pre>';
                echo $arg;
                echo '</pre>';
                echo '<hr>';
            }
        }
    }
}

