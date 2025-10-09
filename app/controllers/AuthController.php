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

        try {
            if ($this->Auth->register($username, $password, $role)) {
                echo "<script>alert('User created successfully!'); window.location='" . site_url('auth/login') . "';</script>";
                exit;
            }
        } catch (Exception $e) {
            // Friendly alert kung duplicate ang username
            if (strpos($e->getMessage(), 'SQLSTATE[23000]') !== false) {
                echo "<script>alert('Username \"{$username}\" already exists. Please choose a different one.'); window.location='" . site_url('auth/register') . "';</script>";
                exit;
            } else {
                // Ipakita ang ibang exceptions
                echo "<script>alert('Error: " . $e->getMessage() . "'); window.location='" . site_url('auth/register') . "';</script>";
                exit;
            }
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

        try {
            if ($this->Auth->login($username, $password)) {
                // Successful login
                redirect('auth/dashboard');
                exit;
            } else {
                // Invalid credentials
                echo "<script>alert('Login failed! Username or password is incorrect.'); window.location='" . site_url('auth/login') . "';</script>";
                exit;
            }
        } catch (Exception $e) {
            // Catch any PDO or other exceptions
            echo "<script>alert('Error: " . $e->getMessage() . "'); window.location='" . site_url('auth/login') . "';</script>";
            exit;
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