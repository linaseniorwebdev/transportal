<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'core/User.php';

class Base extends CI_Controller {

	public $user, $login;

	/**
	 * Default constructor
	 */
	public function __construct() {
		parent::__construct();
		if ($this->session->user) {
			$this->load->model('Users');
			$user = $this->Users->get_by_id($this->session->user);
			$this->user = User::init($user);
			$this->login = true;
		} else {
			$this->user = new User();
			$this->login = false;
		}
	}

	/**
	 * Load header file, with title
	 * @param $title
	 */
	public function load_header($title) {
		$this->load->view('header', array('title' => $title));
	}

	/**
	 * Load footer file
	 */
	public function load_footer() {
		$this->load->view('footer');
	}

	/**
	 * Check if post data exist
	 */
	public function post_exist() {
		return isset($_POST) && count($_POST) > 0;
	}

	/**
	 * Check if get data exist
	 */
	public function get_exist() {
		return isset($_GET) && count($_GET) > 0;
	}
	
	/**
	 * Set output header as HTTP 400
	 */
	public function bad_request() {
		$this->output->set_status_header('400', 'Bad Request');
	}
}
