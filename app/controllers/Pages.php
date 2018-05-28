<?php
  class Pages extends Controller {

    public function __construct() {
      $this->Page = $this->model('Page');
    }

    public function index() {
      $users = $this->Page->getPages();
      $data = [
        'title' => 'Index Page',
        'pages' => $pages
      ];
      $this->view('pages/index.view', $data);
    }

    public function about($id = null) {
      $data = [
        'title' => 'About Page',
        'id' => $id
      ];
      $this->view('pages/about.view', $data);
    }

  }
  