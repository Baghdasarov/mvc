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

    public function update($table, $set, $where) {
        return  $this->db->update($table, $set, $where);
    }

    public function create($table, $column, $value) {
        return  $this->db->update($table, $set, $where);
    }
}
