<?php
namespace ZL;

class Controller {
    protected $input;
    protected $redirect;
    protected $session;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->input = new Input();
        $this->redirect = new Redirect();
        $this->session = new Session();
    }
}
