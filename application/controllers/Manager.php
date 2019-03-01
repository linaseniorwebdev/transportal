<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'controllers/Base.php');

class Manager extends Base {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		if ($this->login) {

		} else
			redirect('auth/login');
	}

	public function first($token = null) {
		if ($token == null)
			redirect('manager');
	}
}
