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
            header('location:/Tasks/index');
        }

        if (isset($_POST['email'])) {
            $data = $this->model->checkAuth($_POST);
            if (isset($data['valid']) && $data['valid']) {
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
  