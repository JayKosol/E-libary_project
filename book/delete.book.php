<?php
    include_once './../Asset/dbconnection.php';
    
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql="DELETE FROM books WHERE bookId=$id";
        $stm=$conn->prepare($sql);
        if($stm->execute()){
          header("Location:./read.book.php?alert=One record has been delete!");
        }else{
          header("Location:./read.book.php?alert=Cannot delete this record!");
        }
    }
?>