<?php

class Task extends Model {

    public function sqlQuery($sql) {
        $this->db->query($sql);
        return  $this->db->resultSet();
    }

    public function updateTask($table, $data)
    {
        $status = isset($data['status'])?$data['status']:0;
        $desc   = isset($data['description'])?$data['description']:null;
        $id     = $data['id'];

        $set = "status = $status, description = $desc";
        $where = "id ='$id'";

        return parent::update($table, $set, $where);
    }

    public function createTask($table, $data)
    {
        $first_name  = isset($data['first_name']) ? $data['first_name'] : 'No name';
        $last_name   = isset($data['last_name']) ? $data['last_name'] : null;
        $description = isset($data['description']) ? $data['description'] : null;
        $email       = isset($data['email']) ? $data['email'] : 'noemail@gmail.com';
        $image       = isset($data['image']) ? $data['image'] : null;
        $status      = isset($data['status']) ? $data['status'] : 0;

        $column = "first_name, last_name, email, description, image, status";
        $value  = "'$first_name', '$last_name', '$email', '$description', '$image', $status";
        return parent::create($table, $column, $value);
    }
}
  