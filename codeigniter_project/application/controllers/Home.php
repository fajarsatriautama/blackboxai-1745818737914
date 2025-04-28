<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['Slider_model', 'Youtube_thumbnail_model', 'Artikel_model']);
    }

    public function index() {
        $data = [
            'sliders' => $this->Slider_model->get_all_sliders(),
            'youtube_thumbnails' => $this->Youtube_thumbnail_model->get_all_thumbnails(),
            'posts' => $this->Artikel_model->get_all_posts()
        ];
        
        // Create uploads directory if it doesn't exist
        if (!file_exists('./uploads')) {
            mkdir('./uploads', 0777, true);
        }

        $this->load->view('home', $data);
    }
}
?>
