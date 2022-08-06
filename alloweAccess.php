<?php

     include_once './Asset/dbconnection.php';

     if(!isset($_COOKIE['logincookie']) && !$_SESSION['username']){
          $identity=unserialize($_COOKIE['logincookie']);
          $username=$identity['username'];
          header("location:./index.php");
          exit;
     }