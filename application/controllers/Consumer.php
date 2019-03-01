<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'controllers/Base.php');

class Consumer extends Base {

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
			redirect('consumer');

		$this->load->model('Tokens');
		$data = $this->Tokens->get_by_token($token);
		if ($data) {
			$user_id = $data['user_id'];
			$this->load->model('Users');
			$user = $this->Users->get_by_id($user_id);

//			$this->Tokens->delete_token($token);

			$this->load_header('Welcome to Our Distribution');
			$this->load->view('consumer/first', $user);
			$this->load_footer();
		} else {

		}
	}

}
