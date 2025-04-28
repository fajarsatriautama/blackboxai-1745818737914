<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
    }

    public function admin_login() {
        if ($this->input->method() === 'post') {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $user = $this->User_model->get_user_by_email($email);

            if ($user && $user->role === 'admin' && password_verify($password, $user->password)) {
                $this->session->set_userdata('user_id', $user->id);
                $this->session->set_userdata('role', $user->role);
                redirect('admin/dashboard');
            } else {
                $data['error'] = 'Invalid admin credentials';
                $this->load->view('admin_login', $data);
            }
        } else {
            $this->load->view('admin_login');
        }
    }

    public function anggota_login() {
        if ($this->input->method() === 'post') {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $user = $this->User_model->get_user_by_email($email);

            if ($user && $user->role === 'member' && password_verify($password, $user->password)) {
                $this->session->set_userdata('user_id', $user->id);
                $this->session->set_userdata('role', $user->role);
                redirect('anggota/dashboard');
            } else {
                $data['error'] = 'Email atau password tidak valid';
                $this->load->view('anggota_login', $data);
            }
        } else {
            $this->load->view('anggota_login');
        }
    }

    public function register() {
        if ($this->input->method() === 'post') {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

            if ($this->User_model->get_user_by_email($email)) {
                $data['error'] = 'Email sudah terdaftar';
                $this->load->view('register', $data);
            } else {
                $this->User_model->create_user($name, $email, $password);
                redirect('auth/anggota_login');
            }
        } else {
            $this->load->view('register');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/member_login');
    }
}
?>
