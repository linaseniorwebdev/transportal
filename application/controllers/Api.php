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
						'original' => $this->input->post('original'),
						'english'  => $this->input->post('english'),
						'iso'      => $this->input->post('iso'),
						'ltr'      => $this->input->post('ltr'),
						'enabled'  => $this->input->post('enabled')
					);
					$this->Languages->update_language($id, $params);
					redirect('admin/setting/languages');
				} else {
					$this->bad_request();
				}
				break;
			case null:
				$this->bad_request();
				break;
		}
	}
	
	public function media($command = null, $subcomm = null) {
		$result = array('status' => 'fail');
		if ($command == 'status') {
			switch ($subcomm) {
				case 'update':
					if ($this->post_exist()) {
						$result['status'] = 'success';
						$id = $this->input->post('id');
						$params = array('title' => $this->input->post('title'));
						$this->load->model('MStatus');
						$this->MStatus->update_status($id, $params);
						echo json_encode($result);
					} else
						$this->bad_request();
					break;
				case null:
					$this->bad_request();
					break;
			}			
		} elseif ($command == 'other') {
			
		} else {
			$this->bad_request();
		}
	}
}
