<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Languages extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function get_table_fields() {
		return $this->db->list_fields('languages');
	}

	function get_all_languages() {
		$this->db->order_by('id', 'asc');
		return $this->db->get('languages')->result_array();
	}

	function get_available_languages() {
		$this->db->order_by('id', 'asc');
		return $this->db->get_where('languages', array('enabled' => 1))->result_array();
	}

	function add_language($params) {
		$this->db->insert('languages', $params);
		return $this->db->insert_id();
	}

	function update_language($language_id, $params) {
		$this->db->where('id', $language_id);
		return $this->db->update('languages', $params);
	}

	function get_by_id($language_id) {
		return $this->db->get_where('languages', array('id' => $language_id))->row_array();
	}
}