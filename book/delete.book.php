<?php
    include_once './../Asset/dbconnection.php';
    
    if(isset($_POST['id'])){
        $id=$_POST['id'];
        $sql="DELETE FROM books WHERE bookId=?";
        $stm=$conn->prepare($sql);
        $stm->bindValue(1,$id,PDO::PARAM_INT);
        if($stm->execute()){
          header("Location:./read.book.php?alert=One record has been delete!");
        }else{
          header("Location:./read.book.php?alert=Cannot delete this record!");
        }
    }
?>