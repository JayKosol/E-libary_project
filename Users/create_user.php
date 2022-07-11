<?php
     require_once "./../Asset/dbconnection.php";
     include_once './function.php';
     $e_uType="";
     $alert="";
     if($_SERVER['REQUEST_METHOD']=="POST"){
          $uType=$_POST['usertype'];
          $uname=$_POST['username'];
          $pw=$_POST['password'];
          $position=$_POST['position'];
          $createdate=$_POST['createdate'];
          $desc=$_POST['description'];

          $sql="INSERT INTO users(userTypes,username,password,position,createDate,description)";
          $sql.="VALUES (?,?,?,?,?,?)";
          if(insertData($conn,$sql,[$uType,$uname,$pw,$position,$createdate,$desc])){
               header("Location:./read.user.php");
          }
     }