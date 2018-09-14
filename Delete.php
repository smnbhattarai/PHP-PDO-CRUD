<?php

require_once 'Database.php';

class Delete extends Database {
    
    public static function destroy($id){
        $stmt = (new self)->connect()->prepare("DELETE FROM posts WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $r = $stmt->execute();
        return $r;
    }
}

$del = Delete::destroy(2);
echo "Deleted number of row: " . $del; 
