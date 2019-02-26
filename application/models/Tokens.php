<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tokens extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function get_all_tokens() {
		$this->db->order_by('id', 'desc');
		return $this->db->get('tokens')->result_array();
	}

	function add_token($params) {
		$this->db->insert('tokens', $params);
		return $this->db->insert_id();
	}

	function delete_token($token) {
		return $this->db->delete('tokens', array('token' => $token));
	}

	function get_by_token($token) {
		return $this->db->get_where('tokens', array('token' => $token))->row_array();
	}
}