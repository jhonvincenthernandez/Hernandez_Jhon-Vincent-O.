<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Library: Auth
 * 
 * Automatically generated via CLI.
 */
class Auth
{
    protected $_lava;
    protected $db;
    protected $session;

    public function __construct()
    {
        $this->_lava = lava_instance();
        $this->_lava->call->database();
        $this->_lava->call->library('session');

        $this->db = $this->_lava->db;
        $this->session = $this->_lava->session;
    }

    /**
     * Register a new user
     *
     * @param string $username
     * @param string $password
     * @param string $role
     * @return bool
     */
    public function register($username, $password, $role = 'user')
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        return $this->db->table('accounts')->insert([
            'username' => $username,
            'password' => $hash,
            'role' => $role,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }

    /**
     * Login user
     *
     * @param string $username
     * @param string $password
     * @return bool
     */
    public function login($username, $password)
    {
        $user = $this->db->table('accounts')
                         ->where('username', $username)
                         ->get();

        if ($user && password_verify($password, $user['password'])) {
            $this->session->set_userdata([
                'user_id' => $user['id'],
                'username' => $user['username'],
                'role' => $user['role'],
                'logged_in' => true
            ]);
            return true;
        }

        return false;
    }

    /**
     * Check if user is logged in
     *
     * @return bool
     */
    public function is_logged_in()
    {
        return (bool) $this->session->userdata('logged_in');
    }

    /**
     * Check user role
     *
     * @param string $role
     * @return bool
     */
    public function has_role($role)
    {
        return $this->session->userdata('role') === $role;
    }

    /**
     * Logout user
     *
     * @return void
     */
    public function logout()
    {
        $this->session->unset_userdata(['user_id','username','role','logged_in']);
    }
}
?>