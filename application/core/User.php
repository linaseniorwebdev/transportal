<?php

class User {
	private $id;		// User ID
	private $name;		// Username
	private $email;		// Email Address
	private $status;	// User Status
	private $role;		// User Role

	function __construct() {
		// Empty constructor
	}

	public static function init(array $arr) {
		$instance = new self();
		$instance->id = $arr['id'];
		$instance->name = $arr['name'];
		$instance->email = $arr['email'];
		$instance->status = $arr['status'];
		$instance->role = $arr['role'];
		return $instance;
	}

	public function getId() {
		return $this->id;
	}

	public function getName() {
		return $this->name;
	}

	public function getEmail() {
		return $this->email;
	}

	public function isAdmin() {
		return ($this->role == 1);
	}

	public function isManager() {
		return ($this->role == 2);
	}

	public function isConsumer() {
		return ($this->role == 3);
	}

	public function isInactive() {
		return ($this->status == 1);
	}

	public function isActive() {
		return ($this->status == 2);
	}

	public function isDisabled() {
		return ($this->status == 3);
	}
}