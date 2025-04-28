<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['Post_model', 'User_model']);
        $this->load->library(['session', 'upload']);
        $this->load->helper(['url', 'form']);
        
        // Check if user is logged in as anggota
        if (!$this->session->userdata('user_id') || $this->session->userdata('role') !== 'member') {
            redirect('auth/anggota_login');
        }
    }

    public function dashboard() {
        // Get anggota's artikel
        $user_id = $this->session->userdata('user_id');
        $data['posts'] = $this->db->get_where('posts', ['user_id' => $user_id])->result();
        $data['user'] = $this->User_model->get_user_by_id($user_id);
        $this->load->view('anggota/dashboard', $data);
    }

    public function add_artikel() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 2048;
        $this->upload->initialize($config);

        if ($this->upload->do_upload('featured_image')) {
            $upload_data = $this->upload->data();
            $this->Post_model->create_post(
                $this->session->userdata('user_id'),
                $this->input->post('title'),
                $this->input->post('content'),
                $upload_data['file_name']
            );
            redirect('anggota/dashboard');
        } else {
            $data['upload_error'] = $this->upload->display_errors();
            $this->load->view('anggota/dashboard', $data);
        }
    }

    public function delete_artikel($id) {
        // Verify artikel belongs to the logged-in anggota
        $post = $this->db->get_where('posts', [
            'id' => $id,
            'user_id' => $this->session->userdata('user_id')
        ])->row();

        if ($post) {
            // Delete featured image if exists
            if ($post->featured_image && file_exists('./uploads/' . $post->featured_image)) {
                unlink('./uploads/' . $post->featured_image);
            }
            $this->db->delete('posts', ['id' => $id]);
        }
        
        redirect('anggota/dashboard');
    }

    public function edit_profile() {
        $user_id = $this->session->userdata('user_id');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $update_data = ['name' => $name, 'email' => $email];
        
        // Only update password if provided
        if ($password) {
            $update_data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $this->db->where('id', $user_id)->update('users', $update_data);
        redirect('anggota/dashboard');
    }
}
?>
