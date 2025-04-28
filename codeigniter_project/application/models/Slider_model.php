<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all_sliders() {
        return $this->db->order_by('created_at', 'DESC')->get('sliders')->result();
    }

    public function add_slider($image, $caption = '') {
        $data = [
            'image' => $image,
            'caption' => $caption
        ];
        return $this->db->insert('sliders', $data);
    }
}
?>
