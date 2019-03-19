<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class TStatus extends CI_Model {

	function get_table_fields() {
		return $this->db->list_fields('trans_status');
	}

	function get_all_status() {
		$this->db->order_by('id', 'asc');
		return $this->db->get('trans_status')->result_array();
	}

	function add_status($params) {
		$this->db->insert('trans_status', $params);
		return $this->db->insert_id();
	}

	function update_status($status_id, $params) {
		$this->db->where('id', $status_id);
		return $this->db->update('trans_status', $params);
	}

	function get_by_id($status_id) {
		return $this->db->get_where('trans_status', array('id' => $status_id))->row_array();
	}
}