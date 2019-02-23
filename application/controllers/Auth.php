<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'controllers/Base.php');

class Auth extends Base {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		if ($this->login) {
			if ($this->agent->is_referral())
				echo $this->agent->referrer();
			else
				redirect('/');
		} else
			redirect('auth/login');
	}

	public function login() {
		if ($this->post_exist()) {
			$user = $this->input->post('username');
			$pass = $this->input->post('password');

		} else {
			$this->load_header('Welcome to Our Distribution');
			$this->load->view('auth/login');
			$this->load_footer();
		}
	}

	public function signup() {
		// This function is intentionally blocked by Support
		redirect('/');

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
