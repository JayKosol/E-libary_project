<?php
     require_once "./../Asset/dbconnection.php";
     include_once './function.php';
     $e_uType="";
     $alert="";
     if($_SERVER['REQUEST_METHOD']=="POST"){
          
          $uType=$_POST['usertype'];
          $uname=$_POST['username'];
          $pw=password_hash($_POST['password'],PASSWORD_DEFAULT);
          $position=$_POST['position'];
          $createdate=$_POST['createdate'];
          $desc=$_POST['description'];
          if(empty($uType)){
               header("Location:./read.user.php?error=User Type is required");
          }
          elseif(empty($uname)){
               header("Location:./read.user.php?error=Username is required");
          }
          elseif(empty($pw)){
               header("Location:./read.user.php?error=Password is required");
          }
          elseif(empty($position)){
               header("Location:./read.user.php?error=Position is required");
          }elseif(empty($createdate)){
               header("Location:./read.user.php?error=Create Date is required");
          }else{

               $sql="INSERT INTO users(userTypes,username,password,position,createDate,description)";
               $sql.="VALUES (?,?,?,?,?,?)";
               if(insertData($conn,$sql,[$uType,$uname,$pw,$position,$createdate,$desc])){
                    header("Location:./read.user.php?error=One record has been added!");
               }else{
                    header("Location:./read.user.php?error=Connot create new record!");
               }
          }
     }