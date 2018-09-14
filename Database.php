<?php

class Database {

  private $db_server;
  private $db_username;
  private $db_password;
  private $db_name;
  private $character_set;

  public function connect(){
    $this->db_server = "localhost";
    $this->db_username = "root";
    $this->db_password = "";
    $this->db_name = "pdotest";
    $this->character_set = "utf8mb4";

    // Data source name
    $dsn = 'mysql:host=' . $this->db_server . ';dbname=' . $this->db_name . ";charset=" . $this->character_set;

    // PDO connection options
    $options = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

    try {
      $pdo = new PDO($dsn, $this->db_username, $this->db_password, $options);
      return $pdo;

    } catch (PDOException $e) {
        echo "<h1>Connection failed: </h1> ". $e->getMessage();
    }
  }

}
