<?php
    require_once './../Asset/dbconnection.php';
    
    // $id=$_GET['id'];
    // $status=$_GET['status'];
    // $q="UPDATE admins SET `status`=$status WHERE id=$id";

    // $q->exec();
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql="DELETE FROM user_account WHERE userId=$id";
        if($conn->exec($sql)){
          header("Location:./read.user.php?alert=One record has been delete!");
        }else{
          header("Location:./read.user.php?alert=Cannot delete this record!");
        }
    }
?>