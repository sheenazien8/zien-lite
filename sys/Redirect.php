<?php
namespace ZL;

class Redirect {
    private $message;

    public function to($location){
        $session = new Session();
        if ($session->exists('flash')){

        }
        header("location: $location", true, 303);
        exit();
    }
    public function back()
    {
        header("location: ".$_SERVER['HTTP_REFERER'], true, 303);
        exit();
    }

    public function with($name, $msg, $option = null)
    {
        $session = new Session();
        if ($session->exists($name)) {
            $this->message = $session->get($name);
            $session->delete($name);
            return $this;
        } else {
            $session->set($name, $msg);
        }

        return $this;
    }
}
