<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_user_by_email($email) {
        return $this->db->get_where('users', ['email' => $email])->row();
    }

    public function get_user_by_id($id) {
        return $this->db->get_where('users', ['id' => $id])->row();
    }

    public function create_user($name, $email, $password) {
        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role' => 'member'
        ];
        return $this->db->insert('users', $data);
    }
}
?>
