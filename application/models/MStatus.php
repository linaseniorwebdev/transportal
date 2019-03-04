<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class MStatus extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function get_table_fields() {
		return $this->db->list_fields('video_status');
	}

	function get_all_status() {
		$this->db->order_by('id', 'asc');
		return $this->db->get('video_status')->result_array();
	}

	function add_status($params) {
		$this->db->insert('video_status', $params);
		return $this->db->insert_id();
	}

	function update_status($status_id, $params) {
		$this->db->where('id', $status_id);
		return $this->db->update('video_status', $params);
	}

	function get_by_id($status_id) {
		return $this->db->get_where('video_status', array('id' => $status_id))->row_array();
	}
}