<?php

require_once 'Database.php';

class Read extends Database {
    
    public function getAllPosts(){
        $stmt = $this->connect()->prepare("SELECT * FROM posts");
        $stmt->execute();
        $r = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $r;
    }
}


$read = new Read();

$posts = $read->getAllPosts();
 
foreach($posts as $post){
    echo "<h3>$post->title</h3>";
    echo "<p>$post->body</p>";
    echo "<p>" . date("Y M d h:i A", strtotime($post->created_at)) . "</p>";
    echo "<hr>";
}

