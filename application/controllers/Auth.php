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
		$messages = array();
		if ($this->post_exist()) {
			$user = $this->input->post('username');
			$pass = $this->input->post('password');
			$__ip = $this->input->post('ipadress');
			$messages['username'] = $user;
			$this->load->model('Users');
			$this->load->model('Logs');
			$data = $this->Users->get_by_name($user);
			if ($data) {
				if ($data['password'] == md5($pass)) {
					$this->session->set_userdata('user', $data['id']);

					$params = array('last_ip' => $__ip);
					$this->Users->update_user($data['id'], $params);

					$params = array('from_ip' => $__ip);
					$params['user_id'] = $data['id'];
					$params['type'] = '1';
					$this->Logs->add_log($params);

					redirect('front');
				} else {
					$params = array('from_ip' => $__ip);
					$params['user_id'] = $data['id'];
					$params['type'] = '2';
					$this->Logs->add_log($params);
					$messages['reason'] = 'password';
				}
			} else {
				$data = $this->Users->get_by_email($user);
				if ($data) {
					if ($data['password'] == md5($pass)) {
						$this->session->set_userdata('user', $data['id']);

						$params = array('last_ip' => $__ip);
						$this->Users->update_user($data['id'], $params);

						$params = array('from_ip' => $__ip);
						$params['user_id'] = $data['id'];
						$params['type'] = '1';
						$this->Logs->add_log($params);

						redirect('front');
					} else {
						$params = array('from_ip' => $__ip);
						$params['user_id'] = $data['id'];
						$params['type'] = '2';
						$this->Logs->add_log($params);
						$messages['reason'] = 'password';
					}
				} else {
					$messages['reason'] = 'nonexist';
				}
			}
		}
		$this->load_header('Welcome to Our Distribution');
		$this->load->view('auth/login', array('data' => $messages));
		$this->load_footer();
	}

	public function logout() {
		$this->session->unset_userdata('user');
		redirect('front');
	}

	public function signup() {
		// This function is intentionally blocked by Support
		redirect('/');
	}

	public function request() {
		$messages = array();
		if ($this->post_exist()) {
			$this->config->load('app');
			$email = $this->input->post('email');
			$this->load->model('Users');
			$user = $this->Users->get_by_email($email);
			if ($user) {
				$data = array();
				$data['appname'] = $this->config->item('name');
				$data['company'] = $this->config->item('company');
				$data['username'] = $user['username'];
				$data['ip'] =  $this->input->post('ip');
				$data['device'] =  $this->input->post('device');
				$data['os'] =  $this->input->post('os');
				$data['browser'] =  $this->input->post('browser');

				$zone = new DateTimeZone('America/Argentina/Buenos_Aires');
				$now = new DateTime('now', $zone);

				$token = md5($now->format('Y-m-d H:i:s')) . md5($data['username']) . md5($data['ip']) . md5($data['device']);
				$data['actionurl'] = base_url() . 'auth/reset?authtoken=' . $token;

				$this->email->initialize();
				$this->email->from($this->config->item('email'), $this->config->item('name'));
				$this->email->reply_to($this->config->item('email'), $this->config->item('name'));
				$this->email->to($email);
				$this->email->subject('Set up a new password for ' . $this->config->item('name') . '?>');
				$this->email->message($this->load->view('email/password_reset-html', $data, TRUE));
				$this->email->set_alt_message($this->load->view('email/password_reset-txt', $data, TRUE));
				if ($this->email->send()) {
					$messages['message'] = 'Confirmation mail sent. Check your mail inbox.';

					$params = array('token' => $token, 'user_id' => $user['id']);

					$this->load->model('Tokens');
					$this->Tokens->add_token($params);

					$params = array('type' => 3, 'user_id' => $user['id'], 'from_ip' => $data['ip']);

					$this->load->model('Logs');
					$this->Logs->add_log($params);
				} else
					$messages['message'] = 'Currently unable to send confirmation mail. Please try again later.';
			} else {
				$data = array();
				$data['appname'] = $this->config->item('name');
				$data['company'] = $this->config->item('company');
				$data['email'] = $email;
				$data['ip'] =  $this->input->post('ip');
				$data['device'] =  $this->input->post('device');
				$data['os'] =  $this->input->post('os');
				$data['browser'] =  $this->input->post('browser');

				$this->email->initialize();
				$this->email->from($this->config->item('email'), $this->config->item('name'));
				$this->email->reply_to($this->config->item('email'), $this->config->item('name'));
				$this->email->to($email);
				$this->email->subject('Set up a new password for ' . $this->config->item('name') . '?>');
				$this->email->message($this->load->view('email/password_reset_help-html', $data, TRUE));
				$this->email->set_alt_message($this->load->view('email/password_reset_help-txt', $data, TRUE));
				if ($this->email->send())
					$messages['message'] = 'Confirmation mail sent. Check your mail inbox.';
				else
					$messages['message'] = 'Currently unable to send confirmation mail. Please try again later.';
			}
		}
		$this->load_header('Request to reset password');
		$this->load->view('auth/request', $messages);
		$this->load_footer();
	}

	public function reset() {
		$messages = array('status' => 'invalid');
		if ($this->get_exist()) {
			$token = $this->input->get('authtoken');
			$this->load->model('Tokens');
			$entity = $this->Tokens->get_by_token($token);
			if ($entity) {
				$zone = new DateTimeZone('America/Argentina/Buenos_Aires');
				$date = DateTime::createFromFormat('Y-m-d H:i:s', $entity['initiated_at'], $zone);
				$now = new DateTime('now', $zone);
				$interval = $date->diff($now);
				$diff = $interval->format('%d') + 0;
				if ($diff < 1) {
					$messages['status'] = 'confirmed';
					$messages['uid'] = $entity['user_id'];
				} else
					$messages['status'] = 'expired';
				$this->Tokens->delete_token($token);
				$messages['time'] = $entity['initiated_at'];
			}
		}

		if ($this->post_exist()) {
			$user__id = $this->input->post('uuid');
			$password = $this->input->post('password');
			$ipadress = $this->input->post('ipadress');

			$params = array('password' => md5($password));

			$this->load->model('Users');
			$this->Users->update_user($user__id, $params);

			$params = array('type' => 4, 'user_id' => $user__id, 'from_ip' => $ipadress);

			$this->load->model('Logs');
			$this->Logs->add_log($params);

			redirect('auth/login');
		}

		$this->load_header('Reset your password');
		$this->load->view('auth/reset', $messages);
		$this->load_footer();
	}
}
