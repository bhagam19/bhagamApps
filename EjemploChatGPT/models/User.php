<?php
class User {
	private $id;
	private $name;
	private $email;
	private $password;
	public function __construct($id, $name, $email, $password) {
		$this->id = $id;
		$this->name = $name;
		$this->email = $email;
		$this->password = $password;
	}
	public function getAll() {
		// Código para obtener todos los usuarios
	}	
	public function create($name, $email, $password) {
		// Código para crear un usuario en la base de datos
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
	public function getPassword() {
		return $this->password;
	}
	public function setName($name) {
		$this->name = $name;
	}
	public function setEmail($email) {
		$this->email = $email;
	}
	public function setPassword($password) {
		$this->password = $password;
	}
}
