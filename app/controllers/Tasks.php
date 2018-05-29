<?php

class Tasks extends Controller {

    protected $model;

    public function __construct() {
        $this->model = $this->model('Task');
    }

    public function index() {
        $results = $this->model->get('tasks');

        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $per_page = 3;
        $offset = ($page-1) * $per_page;

        $total_pages = ceil(count($results) / $per_page);
        $sql = "SELECT * FROM tasks ";
        if (isset($_GET['orderBy'])) {
            $sql .= " ORDER BY ".$_GET['orderBy'].' '.$_GET['type'];
        }
        $sql .= " LIMIT $offset, $per_page";
        $results = $this->model->sqlQuery($sql);

        $data = [
            'title'       => 'Tasks',
            'type'        => isset($_GET['type']) && $_GET['type']=='desc'?'asc':'desc',
            'results'     => $results,
            'total_pages' => $total_pages,
            'current_page'=> $page,
            'auth'        => isset($_SESSION['valid']) && $_SESSION['valid']?true:false,
        ];
        $this->view('pages/tasks/index', $data);
    }

    public function create() {
        $this->authCheck();
        $this->view('pages/tasks/create');
    }

    public function store() {
        $this->authCheck();
        $data = $_POST;
        $this->model->createTask('tasks', $data);

        header('location:/Task/index');
    }

    public function update() {
        $this->authCheck();
        $data = $_POST;
        if (!$data['id']) return http_response_code(400);
        $this->model->updateTask('tasks', $data);
        return http_response_code(200);
    }

    private function authCheck(){
        if (!isset($_SESSION["valid"]) || !$_SESSION["valid"]) {
            header('location:/Task/index');
        }
    }
}
  