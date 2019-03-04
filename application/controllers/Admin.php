<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'controllers/Base.php');

class Admin extends Base {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		if ($this->login) {
			$this->load_header('Admin Dashboard');
			$this->load->view('admin/subheader', array('command' => 'index'));
			$this->load->view('admin/index');
			$this->load->view('admin/subfooter');
			$this->load_footer();
		} else
			redirect('auth/login');
	}

	public function user($command = null) {
		if ($this->login) {
			if ($command == null) {
				redirect('admin/user/all');
			} elseif ($command == 'new') {
				$this->load_header('Add New User');
				$this->load->view('admin/subheader', array('command' => 'user', 'subcomm' => $command));

				if ($this->post_exist()) {
					$email = $this->input->post('email');
					$role = $this->input->post('role');

					$this->load->model('Users');
					$user = $this->Users->get_by_email($email);

					if ($user) {
						$message = 'This email is already registered.';
					} else {
						$params = array(
							'email' => $email,
							'status' => 1,
							'role' => $role + 1
						);
						$id = $this->Users->add_user($params);

						$zone = new DateTimeZone('America/Argentina/Buenos_Aires');
						$now = new DateTime('now', $zone);
						$token = md5($now->format('Y-m-d H:i:s')) . md5($id) . md5($email) . md5('empty');

						$this->load->model('Tokens');
						$params = array('token' => $token, 'user_id' => $id);
						$this->Tokens->add_token($params);

						if ($role == 1)
							$action = base_url() . 'manager/first/' . $token;
						else
							$action = base_url() . 'consumer/first/' . $token;

						if ($this->invite($email, $action)) {
							$message = 'Invitation sent. Please wait for their action.';
						} else {
							$message = 'Unable to send invitation. Please try again later.';
						}
					}

					$this->load->view('admin/user_new', array('message' => $message));
				} else
					$this->load->view('admin/user_new');
			} elseif ($command == 'all') {
				$this->load_header('All Users');
				$this->load->view('admin/subheader', array('command' => 'user', 'subcomm' => $command));
				$this->load->view('admin/user_all');
			} else {
				if ($this->agent->is_referral())
					echo $this->agent->referrer();
				else
					redirect('/');
			}
			$this->load->view('admin/subfooter');
			$this->load_footer();
		} else
			redirect('auth/login');
	}

	public function media() {
		if ($this->login) {
			$this->load_header('All Uploaded Media');
			$this->load->view('admin/subheader', array('command' => 'media'));
			$this->load->view('admin/media');
			$this->load->view('admin/subfooter');
			$this->load_footer();
		} else
			redirect('auth/login');
	}

	public function status($command = null) {
		if ($this->login) {
			if ($command == null) {
				redirect('admin/status/datetime');
			} elseif ($command == 'datetime') {
				$this->load_header('Download Status by Date/Time');
				$this->load->view('admin/subheader', array('command' => 'status', 'subcomm' => $command));
				$this->load->view('admin/status_datetime');
			} elseif ($command == 'media') {
				$this->load_header('Download Status by Media');
				$this->load->view('admin/subheader', array('command' => 'status', 'subcomm' => $command));
				$this->load->view('admin/status_media');
			} elseif ($command == 'customer') {
				$this->load_header('Download Status by Customers');
				$this->load->view('admin/subheader', array('command' => 'status', 'subcomm' => $command));
				$this->load->view('admin/status_customer');
			} else {
				if ($this->agent->is_referral())
					echo $this->agent->referrer();
				else
					redirect('/');
			}
			$this->load->view('admin/subfooter');
			$this->load_footer();
		} else
			redirect('auth/login');
	}

	public function setting($command = null) {
		if ($this->login) {
			if ($command == null) {
				redirect('admin/setting/security');
			} elseif ($command == 'languages') {
				$this->load->model('Languages');
				$data = $this->Languages->get_all_languages();
				$this->load_header('Langauges');
				$this->load->view('admin/subheader', array('command' => 'setting', 'subcomm' => $command));
				$this->load->view('admin/languages', array('langs' => $data));
			} elseif ($command == 'medstatus') {
				$this->load->model('MStatus');
				$data = $this->MStatus->get_all_status();
				$this->load_header('Media Status');
				$this->load->view('admin/subheader', array('command' => 'setting', 'subcomm' => $command));
				$this->load->view('admin/media_status', array('status' => $data));
			} elseif ($command == 'security') {
				$this->load_header('Account Security');
				$this->load->view('admin/subheader', array('command' => 'setting', 'subcomm' => $command));
				$this->load->view('admin/security');
			} else {
				if ($this->agent->is_referral())
					echo $this->agent->referrer();
				else
					redirect('/');
			}
			$this->load->view('admin/subfooter');
			$this->load_footer();
		} else
			redirect('auth/login');
	}

	private function invite($email, $action) {
		$this->config->load('app');
		$this->load->model('Users');

		$data = array();
		$data['appname'] = $this->config->item('name');
		$data['company'] = $this->config->item('company');
		$data['email'] = $this->config->item('email');
		$data['sender'] = 'admin';

		$data['action'] = $action;

		$this->email->initialize();
		$this->email->from($this->config->item('email'), $this->config->item('name'));
		$this->email->reply_to($this->config->item('email'), $this->config->item('name'));
		$this->email->to($email);
		$this->email->subject('Invitation for ' . $this->config->item('name'));
		$this->email->message($this->load->view('email/user_invitation-html', $data, TRUE));
		$this->email->set_alt_message($this->load->view('email/user_invitation-txt', $data, TRUE));

		return ($this->email->send());
	}

	public function users() {
		$data = $alldata = $this->Users->get_all_users();

		$datatable = array_merge(array('pagination' => array(), 'sort' => array(), 'query' => array()), $_REQUEST);

		$filter = isset($datatable['query']['generalSearch']) && is_string($datatable['query']['generalSearch'])
			? $datatable['query']['generalSearch'] : '';
		if (!empty($filter)) {
			$data = array_filter($data, function ($a) use ($filter) {
				return (boolean)preg_grep("/$filter/i", (array)$a);
			});
			unset($datatable['query']['generalSearch']);
		}

		$query = isset($datatable['query']) && is_array($datatable['query']) ? $datatable['query'] : null;
		if (is_array($query)) {
			$query = array_filter($query);
			foreach ($query as $key => $val) {
				$data = list_filter($data, array($key => $val));
			}
		}

		$sort  = ! empty($datatable['sort']['sort']) ? $datatable['sort']['sort'] : 'asc';
		$field = ! empty($datatable['sort']['field']) ? $datatable['sort']['field'] : 'ID';

		$meta    = array();
		$page    = ! empty($datatable['pagination']['page']) ? (int)$datatable['pagination']['page'] : 1;
		$perpage = ! empty($datatable['pagination']['perpage']) ? (int)$datatable['pagination']['perpage'] : -1;

		$pages = 1;
		$total = count($data);

		usort($data, function ($a, $b) use ($sort, $field) {
			if ( ! isset($a->$field) || ! isset($b->$field)) {
				return false;
			}

			if ($sort === 'asc') {
				return $a->$field > $b->$field ? true : false;
			}

			return $a->$field < $b->$field ? true : false;
		});

		if ($perpage > 0) {
			$pages  = ceil($total / $perpage);
			$page   = max($page, 1);
			$page   = min($page, $pages);
			$offset = ($page - 1) * $perpage;
			if ($offset < 0) {
				$offset = 0;
			}

			$data = array_slice($data, $offset, $perpage, true);
		}

		$meta = array(
			'page'    => $page,
			'pages'   => $pages,
			'perpage' => $perpage,
			'total'   => $total,
		);

		if (isset($datatable['requestIds']) && filter_var($datatable['requestIds'], FILTER_VALIDATE_BOOLEAN)) {
			$meta['rowIds'] = array_map(function ($row) {
				foreach($row as $first) break;
				return $first;
			}, $alldata);
		}

		header('Content-Type: application/json');
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
		header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');

		$result = array(
			'meta' => $meta + array(
					'sort'  => $sort,
					'field' => $field,
				),
			'data' => $data,
		);

		echo json_encode($result, JSON_PRETTY_PRINT);
	}
}
