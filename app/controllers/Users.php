<?php

class Users extends Controller {

    protected $model;

    public function __construct() {
        $this->model = $this->model('User');
    }

    public function index() {
        //
    }

    public function login() {
        if (isset($_SESSION["valid"]) && $_SESSION["valid"]) {
            header('location:/Task/index');
        }

        if (isset($_POST['email'])) {
            if ($data = $this->model->checkAuth($_POST)) {
                header('location:/Task/index');
            };
            $this->view('pages/users/login', $data);
        }
        $this->view('pages/users/login');
    }

    public function logout() {
        session_destroy();
        header('location:/Task/index');
    }

}
  