<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function get_table_fields() {
		return $this->db->list_fields('users');
	}

	function get_all_users() {
		$this->db->order_by('id', 'desc');
		return $this->db->get_where('users', array('id >' => 1))->row_array();
	}

	function add_user($params) {
		$this->db->insert('users', $params);
		return $this->db->insert_id();
	}

	function update_user($user_id, $params) {
		$this->db->where('id', $user_id);
		return $this->db->update('users', $params);
	}

	function get_by_id($user_id) {
		return $this->db->get_where('users', array('id' => $user_id))->row_array();
	}

	function get_by_name($name) {
		return $this->db->get_where('users', array('username' => $name))->row_array();
	}

	function get_by_email($mail) {
		return $this->db->get_where('users', array('email' => $mail))->row_array();
	}
}