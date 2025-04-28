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
