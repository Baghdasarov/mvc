<?php
class Database {

    private $host   = DB_HOST;
    private $user   = DB_USER;
    private $pass   = DB_PASS;
    private $dbname = DB_NAME;
    private $dbh;
    private $stmt;
    private $error;

    public function __construct() {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
            $this->migrate();
        } catch(PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
    }

    public function update($table, $set, $where){
        return $this->dbh->exec("UPDATE $table SET $set WHERE $where");
    }

    public function create($table, $column, $value){
        return $this->dbh->exec("INSERT INTO $table ($column) VALUES ($value)");
    }

    public function bind($param, $value, $type = null){
        if (is_null($type)) {
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
      }
      $this->stmt->bindValue($param, $value, $type);
    }

    public function execute(){
        return $this->stmt->execute();
    }

    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function rowCount(){
        return $this->stmt->rowCount();
    }

    private function migrate() {
        $tables[] = 'CREATE TABLE IF NOT EXISTS users (
          id INT NOT NULL AUTO_INCREMENT,
          first_name VARCHAR(90) NOT NULL,
          last_name VARCHAR(90) NULL,
          email VARCHAR(100) NOT NULL,
          token VARCHAR (100) NULL ,
          password VARCHAR(100) NULL,
          role ENUM("admin", "user") DEFAULT "user" NOT NULL,
          created_at TIMESTAMP,
          updated_at TIMESTAMP,
          PRIMARY KEY (id)
        ) ENGINE=InnoDB';

        $tables[] = 'CREATE TABLE IF NOT EXISTS tasks (
          id INT NOT NULL AUTO_INCREMENT,
          first_name VARCHAR(90) NOT NULL,
          last_name VARCHAR(90) NULL,
          email VARCHAR(100) NOT NULL,
          description VARCHAR (255) NULL,
          image VARCHAR (255) NULL,
          status bit NULL,
          created_at TIMESTAMP,
          updated_at TIMESTAMP,
          PRIMARY KEY (id)
        ) ENGINE=InnoDB';


        foreach ($tables as $createTableSql) {
            $this->dbh->query($createTableSql);
        }

        $this->query("select * from users WHERE role='admin'");
        if (!$this->single()) {
            $password = password_hash('123',PASSWORD_BCRYPT);
            $this->dbh->exec("INSERT INTO users (first_name, last_name, email, token, password, role) VALUES ('Admin', 'Adminovich', 'admin','null', '".$password."','admin')");
        };
    }
}
  