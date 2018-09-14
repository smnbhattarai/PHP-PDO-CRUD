<?php

require_once 'Database.php';

class Create extends Database {
    
    private $title;
    private $body;
    
    public function __construct($title, $body) {
        $this->title = $title;
        $this->body = $body;
    }
    
    public function insert(){
        $stmt = $this->connect()->prepare("INSERT INTO posts (title, body) VALUES (:title, :body)");
        $stmt->bindParam(':title', $this->title, PDO::PARAM_STR);
        $stmt->bindParam(':body', $this->body, PDO::PARAM_STR);
        $result = $stmt->execute();
        return $result;
    }
}

$post = new Create('Title 1', 'Body 1');
echo "Affected row: " . $post->insert();
