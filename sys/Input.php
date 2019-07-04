<?php

namespace ZL;

use ZL\Redirect;
use ZL\Session;

class Input
{
    public function get($name)
    {
        if (isset($_POST[$name])) {
            if (empty($_POST[$name])){
                return $_POST[$name] = null;
            }
            return $_POST[$name];
        } elseif (isset($_GET[$name])) {
            if (empty($_GET[$name])){
                return $_GET[$name] = null;
            }
            return $_GET[$name];
        }

        return false;
    }

    public function request($name)
    {
        if (isset($_REQUEST[$name])) {
            if (empty($_REQUEST[$name])) {
                return $_REQUEST[$name] = null;
            }
            return $_REQUEST[$name];
        }
        return false;
    }

    public function all()
    {
        $result = [];
        foreach ($_REQUEST as $table => $value) {
            if (empty($value)) {
                $result['result'][$table] = null;
            }else{
                $result['result'][$table] = $value;
            }
        }

        return $result;
    }

    public function add(array $data)
    {
        return $this;
    }

    public function validate(array $value)
    {
        $data = [];
        foreach ($_REQUEST as $key => $request) {
            if (isset($value[$key]['required'])) {
                if (empty($_REQUEST[$key])) {
                    $data[$key] = $key.' harus diisi';
                }
            }
        }
        $session = new Session();
        $redirect = new Redirect();
        if (!empty($data)){
            $session->set('errors', $data);
            return $redirect->back();
        }

        return $this;
    }
}
