<?php

class Task extends Model {

    public function update($table, $data, $where=false)
    {
        $status = isset($data['status'])?$data['status']:0;
        $desc   = isset($data['description'])?$data['description']:null;
        $id     = $data['id'];

        $set = "status = $status, description = $desc";
        $where = "id ='$id'";

        return parent::update($table, $set, $where);
    }

    public function create($table, $data, $value=false)
    {
        $first_name  = isset($data['first_name'])?$data['status']:null;
        $last_name   = isset($data['last_name'])?$data['description']:null;
        $email       = isset($data['email'])?$data['email']:null;
        $image       = isset($data['image'])?$data['image']:null;
        $status      = isset($data['status'])?$data['status']:null;

        $column = "first_name, last_name, email, description, image, status";
        $value  = "$first_name, $last_name, $email, $image, $status";
        return parent::create($table, $column, $value);
    }
}
  