<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'controllers/Base.php');

class Consumer extends Base {

	public function index() {
		if ($this->login) {

		} else {
			redirect('auth/login');
		}
	}

	public function first($token = null) {
		if ($token === null) {
			redirect('consumer');
		}

		if ($this->post_exist()) {
			$this->load->model('Users');

			$this->load->model('Tokens');
			$data = $this->Tokens->get_by_token($token);

			$params = array();
			$params['username'] = $this->input->post('username');
			$params['password'] = md5($this->input->post('password'));
			$params['firstname'] = $this->input->post('firstname');
			$params['lastname'] = $this->input->post('lastname');
			$params['last_ip'] = $this->input->post('ip');
			$params['status'] = 2;

			$this->Users->update_user($data['user_id'], $params);

			$this->Tokens->delete_token($token);

			$this->session->unset_userdata('user');

			echo base_url('consumer');
		} else {
			$this->load->model('Tokens');
			$data = $this->Tokens->get_by_token($token);
			if ($data) {
				$user_id = $data['user_id'];
				$this->load->model('Users');
				$user = $this->Users->get_by_id($user_id);

				$this->load_header('Welcome to Our Distribution');
				$this->load->view('first', $user);
				$this->load_footer();
			} else {
				$this->load->view('404');
			}
		}
	}

}
