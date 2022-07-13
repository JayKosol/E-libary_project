<?php
    require_once './../Asset/dbconnection.php';
    
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql="DELETE FROM users WHERE id=$id";
        if($conn->exec($sql)){
          header("Location:./read.admin.php?alert=One record has been delete!");
        }else{
          header("Location:./read.admin.php?alert=Cannot delete this record!");
        }
    }
?>