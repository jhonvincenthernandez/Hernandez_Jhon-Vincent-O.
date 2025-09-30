<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: AuthController
 * 
 * Automatically generated via CLI.
 */
class AuthController extends Controller {
    public function __construct()
    {
        parent::__construct();
         
    }

    public function register()
    {
        $this->call->library('Auth');

        if ($this->io->method() == 'post') {
            $username = $this->io->post('username');
            $password = $this->io->post('password');
            $role = $this->io->post('role') ?? 'user';

            if ($this->Auth->register($username, $password, $role)) {
                redirect('auth/login');
            }
        }

        $this->call->view('auth/register');
    }

    public function login()
    {
        $this->call->library('Auth');

        if ($this->io->method() == 'post') {
            $username = $this->io->post('username');
            $password = $this->io->post('password');

            if ($this->Auth->login($username, $password)) {
                redirect('auth/dashboard');
            } else {
                echo 'Login failed!';
            }
        }

        $this->call->view('auth/login');
    }

    public function dashboard()
    {
        $this->call->library('Auth');

        if (!$this->Auth->is_logged_in()) {
            redirect('auth/login');
        }

        if ($this->Auth->has_role('admin')) {
            redirect('View');
            exit;
        }else{
            echo ("Sorry you are not Admin,Register as an admin to access");
        }

        $this->call->view('auth/dashboard');
    }

    public function logout()
    {
        $this->call->library('Auth');
        $this->Auth->logout();
        redirect('auth/login');
    }
}
?>