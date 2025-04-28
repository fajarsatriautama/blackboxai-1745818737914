<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Youtube_thumbnail_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all_thumbnails() {
        return $this->db->order_by('created_at', 'DESC')->get('youtube_thumbnails')->result();
    }

    public function add_thumbnail($video_id, $title, $thumbnail_url) {
        $data = [
            'video_id' => $video_id,
            'title' => $title,
            'thumbnail_url' => $thumbnail_url
        ];
        return $this->db->insert('youtube_thumbnails', $data);
    }
}
?>
