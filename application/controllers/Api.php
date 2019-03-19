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
		} elseif ($command == 'upload') {
			$result = array('status' => 'fail');
			switch ($subcomm) {
				case 'video':
					$this->load->model('Hashes');
					$hash = $this->input->post('hash');
					$data = $this->Hashes->get_by_hash($hash);
					if ($data) {
						$result['status'] = 'success';
						$result['uri'] = $data['id'];
					} else {
						$lang = $this->input->post('lang');
						$path = './uploads/' . $this->user->getId() . '/' . $hash . '/' . $lang . '/';
						if (!mkdir($path, 0755, TRUE) && !is_dir($path)) {
							$result['description'] = sprintf('Directory "%s" was not created', $path);
						} else {
							$config['upload_path'] = $path;
							$config['allowed_types'] = 'mp4';
							$config['encrypt_name'] = TRUE;
							$this->load->library('upload', $config);
							if (!$this->upload->do_upload('file')) {
								$result['description'] = 'File not uploaded';
							} else {
								$path = $this->upload->data();
								$path = $path['full_path'];

								$this->config->load('app');
								$ffmpeg = $this->config->item('ffmpeg');
								$video = str_replace('/', DIRECTORY_SEPARATOR, $path);
								$arr = explode(DIRECTORY_SEPARATOR, APPPATH);
								array_pop($arr);
								array_pop($arr);
								array_push($arr, '');
								$image = implode(DIRECTORY_SEPARATOR, $arr) . 'uploads' . DIRECTORY_SEPARATOR . $this->user->getId() . DIRECTORY_SEPARATOR . $hash . DIRECTORY_SEPARATOR . 'thumbnail.jpg';
								$interval = 5;
								$size = '320x240';
								$cmd = "$ffmpeg -i $video -deinterlace -an -ss $interval -f mjpeg -t 1 -r 1 -y -s $size $image 2>&1";
								$res_output = array();
								$res_variable = array();
								exec($cmd, $res_output, $res_variable);

								$params = array(
									'hash' => $hash,
									'uri' => $path,
									'type' => 1
								);
								$id = $this->Hashes->add_hash($params);
								$result['status'] = 'success';
								$result['uri'] = $id;
							}
						}
					}
					break;
				case 'save':
					$this->load->model('Videos');
					$params = array(
						'resource_hash' => $this->input->post('hash'),
						'origin' => $this->input->post('origin'),
						'uploader' => $this->user->getId(),
						'languages_into' => $this->input->post('languages_into'),
						'consumers_to' => $this->input->post('consumers_to')
					);
					$title = $this->input->post('title');
					if ($title)
						$params['title'] = $title;
					$description = $this->input->post('description');
					if ($description)
						$params['description'] = $description;
					$this->Videos->add_video($params);
					$result['status'] = 'success';
					break;
				default:
					break;
			}
			echo json_encode($result, JSON_PRETTY_PRINT);
		} else {
			$this->bad_request();
		}
	}
}
