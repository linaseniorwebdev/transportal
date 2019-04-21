<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Base.php';

class Front extends Base {

	public function index() {
		if ($this->login) {
			if ($this->user->isAdmin()) {
				redirect('admin');
			}
			if ($this->user->isManager()) {
				redirect('manager');
			}
			if ($this->user->isConsumer()) {
				redirect('consumer');
			}
		} else {
			redirect('auth');
		}
	}

}
