<?php
    require_once './../Asset/dbconnection.php';
    
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql="DELETE FROM authors WHERE authorId=$id";
        if($conn->exec($sql)){
          header("Location:./read.author.php?alert=One record has been delete!");
        }else{
          header("Location:./read.author.php?alert=Cannot delete this record!");
        }
    }
?>