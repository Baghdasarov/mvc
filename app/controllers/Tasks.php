<?php

class Tasks extends Controller {

    protected $model;

    public function __construct() {
        $this->model = $this->model('Task');
    }

    public function index() {
        $results = $this->model->get('tasks');

        $data = [
            'title'   => 'Tasks',
            'results' => $results,
            'auth'    => isset($_SESSION['valid']) && $_SESSION['valid']?true:false,
        ];
        $this->view('pages/tasks/index', $data);
    }

    public function create() {
        $this->authCheck();
        $this->view('pages/tasks/create');
    }

    public function store() {
        $this->authCheck();



        $this->view('pages/tasks/create');
    }

    private function authCheck(){
        if (!isset($_SESSION["valid"]) || !$_SESSION["valid"]) {
            header('location:/Task/index');
        }
    }
}
  