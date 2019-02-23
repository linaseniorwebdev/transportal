<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'controllers/Base.php');

class Auth extends Base {

	function __construct() {
		parent::__construct();
		$this->user = $this->session->user;
	}

	public function index() {
		if ($this->user == null)
			redirect('/auth/login');

	}

	public function login() {
		$this->load_header('Welcome to ...');
		$this->load->view('auth/login');
		$this->load_footer();
	}

	public function signup() {
		$this->load_header('Sign up');
		$this->load->view('auth/signup');
		$this->load_footer();
	}

	public function request() {
		$this->load_header('Request to reset password');
		$this->load->view('auth/request');
		$this->load_footer();
	}

	public function reset() {
		$this->load_header('Reset your password');
		$this->load->view('auth/reset');
		$this->load_footer();
	}

	public function expired() {
		$this->load_header('Oops! Your request expired!');
		$this->load->view('auth/expired');
		$this->load_footer();
	}

}
