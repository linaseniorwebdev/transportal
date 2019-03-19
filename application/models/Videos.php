<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Videos extends CI_Model {

	function get_table_fields() {
		return $this->db->list_fields('videos');
	}

	function add_video($params) {
		$this->db->insert('videos', $params);
		return $this->db->insert_id();
	}

	function get_by_id($video_id) {
		return $this->db->get_where('videos', array('id' => $video_id))->row_array();
	}
}
