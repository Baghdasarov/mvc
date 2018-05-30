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
        $this->view('pages/tasks/create');
    }

    public function store() {
        $data = $_POST;
        if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])){
            $name = $_FILES['image']['name'];
            $unique = uniqid() . '.';
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($name);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $extensions_arr = array("jpg", "jpeg", "png", "gif");
            if( in_array($imageFileType, $extensions_arr) ){
                $image = '/'.$target_dir.$unique.$imageFileType;
                $data['image'] = $image;
                $this->model->createTask('tasks', $data);
                $image = $_FILES['image']['tmp_name'];
                $image_info = getimagesize($image);
                $image_width = $image_info[0];
                $image_height = $image_info[1];
                if (($image_width < 321 && $image_height < 241) || ($image_width < 241 && $image_height < 321) || $imageFileType == 'gif') {
                    move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$unique.$imageFileType);
                    header('location:/Tasks/index');
                    return;
                } else {
                    if ($imageFileType == 'png') {
                        $original_img = imagecreatefrompng($image);
                    } elseif ($imageFileType == 'gif') {
                        $original_img = imagecreatefromgif($image);
                    } else {
                        $original_img = imagecreatefromjpeg($image);
                    }
                    if ($image_width > $image_height) {
                        if (($image_width / 320) > ($image_height / 240)) {
                            $thumb_w = 320;
                            $thumb_h = $image_height / ($image_width / 320);
                        } else {
                            $thumb_h = 240;
                            $thumb_w = $image_width / ($image_height / 240);
                        }
                    } else {
                        if (($image_width / 320) > ($image_height / 240)) {
                            $thumb_w = 240;
                            $thumb_h = $image_height / ($image_width / 240);
                        } else {
                            $thumb_h = 320;
                            $thumb_w = $image_width / ($image_height / 320);
                        }
                    }
                    $thumb_img = imagecreatetruecolor($thumb_w, $thumb_h);
                    imagecopyresampled($thumb_img, $original_img,
                        0, 0,
                        0, 0,
                        $thumb_w, $thumb_h,
                        $image_width, $image_height);
                    imagejpeg($thumb_img,  $target_dir.$unique.$imageFileType);
                    imagedestroy($thumb_img);
                    header('location:/Tasks/index');
                    return;
                }
            } else {
                $data = [
                    'error' => 'Тип файла не поддерживаеться'
                ];
                $this->view('pages/Tasks/create', $data);
            }
        }
        header('location:/Tasks/create');
        return;
    }

    public function update() {
        $this->authCheck();
        $data = $_POST;
        if (!$data['id']) return http_response_code(400);

        $isAjax = false;
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $isAjax = true;
        }
        try {
            $this->model->updateTask('tasks', $data);
            if ($isAjax) return http_response_code(200);
            header('location:'. $_SERVER['HTTP_REFERER']);
        }catch (\Exception $exception){
            if ($isAjax) return http_response_code(400);
            header('location:'. $_SERVER['HTTP_REFERER']);
        }

        return;
    }

    private function authCheck(){
        if (!isset($_SESSION["valid"]) || !$_SESSION["valid"]) {
            header('location:/Tasks/index');
            return;
        }
    }
}
  