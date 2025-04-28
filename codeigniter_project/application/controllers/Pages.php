<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['Slider_model', 'Youtube_thumbnail_model', 'Artikel_model', 'Member_model']);
        $this->load->helper('url');
    }

    public function home() {
        $data = [
            'sliders' => $this->Slider_model->get_all_sliders(),
            'youtube_thumbnails' => $this->Youtube_thumbnail_model->get_all_thumbnails(),
            'posts' => $this->Artikel_model->get_all_posts(),
            'members' => $this->Member_model->get_all_members()
        ];
        $this->load->view('home_with_social', $data);
    }

    public function single_post($id = null) {
        if (!$id) {
            show_404();
        }
        $post = $this->Artikel_model->get_post_by_id($id);
        if (!$post) {
            show_404();
        }
        $this->load->view('single_post', ['post' => $post]);
    }
}
?>
