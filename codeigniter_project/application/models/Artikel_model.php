<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all_posts() {
        return $this->db->select('posts.*, users.name as author_name')
                       ->from('posts')
                       ->join('users', 'users.id = posts.user_id')
                       ->order_by('posts.created_at', 'DESC')
                       ->get()
                       ->result();
    }

    public function create_post($user_id, $title, $content, $featured_image) {
        $data = [
            'user_id' => $user_id,
            'title' => $title,
            'content' => $content,
            'featured_image' => $featured_image
        ];
        return $this->db->insert('posts', $data);
    }

    public function get_user_posts($user_id) {
        return $this->db->where('user_id', $user_id)
                       ->order_by('created_at', 'DESC')
                       ->get('posts')
                       ->result();
    }

    public function delete_post($id) {
        return $this->db->delete('posts', ['id' => $id]);
    }
}
?>
