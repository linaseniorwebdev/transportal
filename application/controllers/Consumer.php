<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'controllers/Base.php');

class Consumer extends Base {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		echo 'Consumer Page';
	}

}