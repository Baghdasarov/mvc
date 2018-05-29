<?php

class User extends Model {

    public function checkAuth($data){


        $data = $this->validation($data);

        $this->db->query("Select * from users WHERE email='".$data['email']."'");
        if (!$user = $this->db->single()) {
           return ['user' => 'Не праильное имя или пороль'];
        }

        if(!password_verify($_REQUEST['password'], $user->password)){
            $_SESSION["valid"] = false;
            $_SESSION["errorMessage"] = 'Wrong username or password';
            return ['password' => 'Не праильный пороль'];
        };
        $_SESSION["valid"] = true;
        $_SESSION["first_name"] = $user->first_name;
        $_SESSION["last_name"] = $user->last_name;
        return true;
    }

    private function validation($data){
        foreach ($data as $index=>$value){
            if(empty($value)){
                $data[$index] = 'required';
            }
            $data[$index] = htmlspecialchars($value);
        }
        return $data;
    }

    public function getWithTask(){
        $this->db->query("Select * from users JOIN tasks ON id=tasks.user_id");
        return  $this->db->resultSet();
    }


}
  