<?php
session_start();

if(isset($_SESSION['username'])){
   // echo "delete";
    setcookie("logincookie",'',time()-36000);
    //delet session
    unset($_SESSION['username']);
    session_destroy();
    header("Location:./index.php");
    exit;
}else{
    echo "failed";
}