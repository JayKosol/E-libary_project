<?php
    require_once './../Asset/dbconnection.php';
    
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql="DELETE FROM users WHERE userId=$id";
        if($conn->exec($sql)){
          header("Location:./read.user.php?alert=One record has been delete!");
        }else{
          header("Location:./read.user.php?alert=Cannot delete this record!");
        }
    }
?>