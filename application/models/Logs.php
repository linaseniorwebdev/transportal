<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Logs extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function get_all_logs() {
		$this->db->order_by('id', 'desc');
		return $this->db->get('logs')->result_array();
	}

	function add_log($params) {
		$this->db->insert('logs', $params);
		return $this->db->insert_id();
	}

	function get_by_user_id($user_id) {
		return $this->db->get_where('logs', array('user_id' => $user_id))->result_array();
	}

	function get_by_time($from = null, $to = null) {
		$this->db->select('*');
		$this->db->from('logs');
		if ($from)
			$this->db->where('initiated_at >', $from);
		if ($to)
			$this->db->where('initiated_at <', $to);
		return $this->db->get()->result_array();
	}
}