<?php

require_once 'Database.php';

class Update extends Database {
    
    public $postId;
    public $title;
    public $body;
    
    public function change(){
        $stmt = $this->connect()->prepare("UPDATE posts SET title = :title, body = :body WHERE id = :id");
        $stmt->bindParam(':id', $this->postId, PDO::PARAM_INT);
        $stmt->bindParam(':title', $this->title, PDO::PARAM_STR);
        $stmt->bindParam(':body', $this->body, PDO::PARAM_STR);
        $result = $stmt->execute();
        return $result; 
    }
}


$update = new Update();
$update->postId = 3;
$update->title = "Updated title 1222";
$update->body = "Updated body yay! Nice. 222";
echo "Updated row: " . $update->change();
