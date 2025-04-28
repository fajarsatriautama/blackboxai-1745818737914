<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['Slider_model', 'Post_model', 'Youtube_thumbnail_model']);
        $this->load->library(['session', 'upload']);
        $this->load->helper(['url', 'form']);
        
        // Check if user is logged in as admin
        if (!$this->session->userdata('user_id') || $this->session->userdata('role') !== 'admin') {
            redirect('auth/admin_login');
        }
    }

    public function dashboard() {
        $data['sliders'] = $this->Slider_model->get_all_sliders();
        $data['posts'] = $this->Post_model->get_all_posts();
        $data['youtube_thumbnails'] = $this->Youtube_thumbnail_model->get_all_thumbnails();
        $this->load->view('admin/dashboard', $data);
    }

    // Slider Management
    public function add_slider() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 2048;
        $this->upload->initialize($config);

        if ($this->upload->do_upload('image')) {
            $upload_data = $this->upload->data();
            $this->Slider_model->add_slider(
                $upload_data['file_name'],
                $this->input->post('caption')
            );
            redirect('admin/dashboard');
        } else {
            $data['upload_error'] = $this->upload->display_errors();
            $this->load->view('admin/dashboard', $data);
        }
    }

    public function delete_slider($id) {
        // Delete slider image file
        $slider = $this->db->get_where('sliders', ['id' => $id])->row();
        if ($slider && file_exists('./uploads/' . $slider->image)) {
            unlink('./uploads/' . $slider->image);
        }
        $this->db->delete('sliders', ['id' => $id]);
        redirect('admin/dashboard');
    }

    // YouTube Thumbnail Management
    public function add_youtube() {
        $video_id = $this->input->post('video_id');
        $title = $this->input->post('title');
        $thumbnail_url = "https://img.youtube.com/vi/{$video_id}/maxresdefault.jpg";
        
        $this->Youtube_thumbnail_model->add_thumbnail($video_id, $title, $thumbnail_url);
        redirect('admin/dashboard');
    }

    public function delete_youtube($id) {
        $this->db->delete('youtube_thumbnails', ['id' => $id]);
        redirect('admin/dashboard');
    }

    // Post Management
    public function add_post() {
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
            redirect('admin/dashboard');
        } else {
            $data['upload_error'] = $this->upload->display_errors();
            $this->load->view('admin/dashboard', $data);
        }
    }

    public function delete_post($id) {
        // Delete post featured image file
        $post = $this->db->get_where('posts', ['id' => $id])->row();
        if ($post && $post->featured_image && file_exists('./uploads/' . $post->featured_image)) {
            unlink('./uploads/' . $post->featured_image);
        }
        $this->db->delete('posts', ['id' => $id]);
        redirect('admin/dashboard');
    }
}
?>
