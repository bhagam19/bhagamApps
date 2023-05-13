<?php
require_once(__DIR__ . '/../models/User.php');
class UserController {    
    private $user;    
    public function __construct() {
        // se proporcionan los cuatro argumentos requeridos
        $this->user = new User('', '', '', new PDO('mysql:host=localhost;dbname=test', 'username', 'password'));
    }    
    public function index() {
        $users = $this->user->getAll();
        require_once('../views/users/index.php');
    }    
    public function create() {
        require_once('../views/users/create.php');
    }    
    public function store() {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $this->user->create($name, $email, $password);
        header('Location: index.php');
    }    
}
?>