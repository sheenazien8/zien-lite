<?php
/**
 * Created by PhpStorm.
 * User: zien
 * Date: 16/02/19
 * Time: 21:24
 */

namespace App\Services;

use App\Models\User;
use ZL\Redirect;
use ZL\Session;

/**
 * @property Redirect redirect
 */
class AuthService
{
    protected $session;
    public function __construct()
    {
        $this->session = new Session();
        $this->redirect = new Redirect();
    }

    public function getLoginSession()
    {
        if ($this->session->exists('login')) {
            $user = $this->getUser($this->session->get('login'));
            $this->session->set('auth', $user);

            return $user;
        }else{
            $this->redirect->to(url('/admin/login'));
        }
    }

    public function getUser($login)
    {
        $user = new User();
        $user = $user->getUser($login);
        $this->checkUser($user);
        $this->checkPassword($user['password'], $login['password']);

        return $user;
    }

    public function checkPassword($user, $login)
    {
        if (password_verify($login, $user)){

            return;
        } else {
            $this->session->delete('login');
            $this->redirect
                ->with('flash', 'maaf password yang and masukkan salah')
                ->to(url('/admin/login'));
        }
    }

    public function checkUser($user)
    {
        if (!$user) {
            $this->session->delete('login');

            $this->redirect
                ->with('flash', 'maaf username yang anda masukkan belum terdaftar')
                ->to(url('/admin/login'));
        }
    }

    public function getAuthSession()
    {
        if ($this->session->exists('auth')) {
            $auth = $this->session->get('auth');

            return $auth;
        }else{
            $this->redirect->to('/admin/login');
        }
    }
}
