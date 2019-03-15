<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'controllers/Base.php');

class Manager extends Base {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		if ($this->login) {
			$data = array(
				'command' => 'index',
				'email' => $this->user->getEmail(),
				'firstname' => $this->user->getFirstname(),
				'lastname' => $this->user->getLastname()
			);
			$this->load_header('Manager Dashboard');
			$this->load->view('manager/subheader', $data);
			$this->load->view('manager/index');
			$this->load->view('manager/subfooter');
			$this->load_footer();
		} else
			redirect('auth/login');
	}

	public function media($command = 'all') {
		if ($this->login) {
			$data = array(
				'command' => 'media',
				'subcomm' => $command,
				'email' => $this->user->getEmail(),
				'firstname' => $this->user->getFirstname(),
				'lastname' => $this->user->getLastname()
			);
			if ($command == 'new') {
				$this->load_header('Upload New Clip');
				$this->load->view('manager/subheader', $data);
				$this->load->view('manager/media_new');
			} elseif ($command == 'all') {
				$this->load_header('All My Clips');
				$this->load->view('manager/subheader', $data);
				$this->load->view('manager/media_all');
			} else {
				if ($this->agent->is_referral())
					echo $this->agent->referrer();
				else
					redirect('/');
			}
			$this->load->view('manager/subfooter');
			$this->load_footer();
		} else
			redirect('auth/login');
	}

	public function messages() {
		if ($this->login) {
			$data = array(
				'command' => 'messages',
				'email' => $this->user->getEmail(),
				'firstname' => $this->user->getFirstname(),
				'lastname' => $this->user->getLastname()
			);
			$this->load_header('Messages');
			$this->load->view('manager/subheader', $data);
			$this->load->view('manager/messages');
			$this->load->view('manager/subfooter');
			$this->load_footer();
		} else
			redirect('auth/login');
	}

	public function first($token = null) {
		if ($token == null)
			redirect('manager');

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

			echo base_url('manager');
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
