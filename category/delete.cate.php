<?php
    require_once './../Asset/dbconnection.php';
    
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql="DELETE FROM category WHERE categoryId=$id";
        if($conn->exec($sql)){
          header("Location:./read.cate.php?alert=One record has been delete!");
          exit;
        }else{
          header("Location:./read.cate.php?alert=Cannot delete this record!");
          exit;
        }
    }
?>

