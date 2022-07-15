<?php
     require_once "./../Asset/dbconnection.php";
     include_once './../Users/function.php';

     if($_SERVER['REQUEST_METHOD']=="POST"){
          
          $fname=$_POST['authorName'];
          //$lname=$_POST['lname'];
          //$pw=$_POST['password'];
          
          $bookqty=$_POST['bookqty'];
          $contact=$_POST['contact'];
          $desc=$_POST['desc'];
          if(empty($fname)){
               header("Location:./read.author.php?error=Author's name is required");
          }
          elseif(empty($bookqty)){
               header("Location:./read.author.php?error=Book qty is required");
          }
          elseif(empty($contact)){
               header("Location:./read.author.php?error=Contact is required");
          }else{

               $sql="INSERT INTO authors(authorName,bookQty,contact,`description`)";
               $sql.="VALUES (?,?,?,?)";
               if(insertData($conn,$sql,[$fname,$bookqty,$contact,$desc])){
                    header("Location:./read.author.php?alert=One record has been added!");
               }else{
                    header("Location:./read.author.php?error=Connot create new record!");
               }
          }
     }