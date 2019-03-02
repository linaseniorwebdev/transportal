<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'controllers/Base.php');

class Api extends Base {

	function __construct() {
		parent::__construct();
		$this->load->model('Languages');
	}

	public function language($command = null) {
		switch ($command) {
			case 'update':
				if ($this->post_exist()) {
					$id       = $this->input->post('id');
					$params = array(
						$original => $this->input->post('original'),
						$english  => $this->input->post('english'),
						$iso      => $this->input->post('iso'),
						$ltr      = $this->input->post('ltr'),
						$enabled  = $this->input->post('enabled')
					);
				} else {
					$this->output->set_status_header('400');
					echo 'Bad Request';
				}
				break;
			case null:
				break;
		}
	}
}
