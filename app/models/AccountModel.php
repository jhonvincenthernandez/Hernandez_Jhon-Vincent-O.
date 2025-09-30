<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: AccountModel
 * 
 * Automatically generated via CLI.
 */
class AccountModel extends Model {
    protected $table = 'accounts';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }
     public function get_user_by_id($id)
    {
        return $this->db->table($this->table)
                        ->where('id', $id)
                        ->get();
    }

    public function get_all_users()
    {
        return $this->db->table($this->table)->get_all();
    }

     public function insert_user($username, $password, $role = 'user')
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        return $this->db->table($this->table)->insert([
            'username'   => $username,
            'password'   => $hash,
            'role'       => $role,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }


     public function get_user_by_username($username)
    {
        return $this->db->table($this->table)
                        ->where('username', $username)
                        ->get();
    }
}
?>