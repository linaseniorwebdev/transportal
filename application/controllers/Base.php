<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {

	public $user;

	// Default constructor
	function __construct() {
		parent::__construct();
	}

	/**
	 * Load header file, with title
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
}
