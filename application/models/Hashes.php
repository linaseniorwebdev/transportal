<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Hashes extends CI_Model {

	function get_table_fields() {
		return $this->db->list_fields('hashes');
	}

	function add_hash($params) {
		$this->db->insert('hashes', $params);
		return $this->db->insert_id();
	}

	function get_by_hash($hash) {
		return $this->db->get_where('hashes', array('hash' => $hash))->row_array();
	}
}
