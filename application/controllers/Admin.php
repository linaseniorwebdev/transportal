<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'controllers/Base.php');

class Admin extends Base {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		if ($this->login) {
			$this->load_header('Admin Dashboard');
			$this->load->view('admin/subheader');
			$this->load->view('admin/index');
			$this->load->view('admin/subfooter');
			$this->load_footer();
		} else
			redirect('auth/login');
	}

}
