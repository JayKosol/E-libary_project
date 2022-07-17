<?php
    require_once './../Asset/dbconnection.php';
    
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql="DELETE FROM books WHERE bookId=$id";
        if($conn->exec($sql)){
          header("Location:./read.book.php?alert=One record has been delete!");
        }else{
          header("Location:./read.book.php?alert=Cannot delete this record!");
        }
    }
?>