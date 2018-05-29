<?php
class Model {

    protected $db;

    public function __construct() {
      $this->db = new \Database();
    }

    public function get($table) {
        $this->db->query("Select * from ".$table);
        return  $this->db->resultSet();
    }
}
