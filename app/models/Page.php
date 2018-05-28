<?php
  class Page extends Model {
    
    public function getPages() {
      $this->db->query("Select * from pages");
      return  $this->db->resultSet();
    }

  }
  