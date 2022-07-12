<?php
     require_once "./../Asset/dbconnection.php";
     include_once './function.php';
     
     if($_SERVER['REQUEST_METHOD']=="POST"){
          $fname=$_POST['fname'];
          $lname=$_POST['lname'];
          $gender=$_POST['gender'];
          $dob=$_POST['dob'];
          $address=$_POST['address'];
          $phone=$_POST['phone'];
          $email=$_POST['email'];
          $uname=$_POST['username'];
          $pw=$_POST['password'];
          $userid=$_POST['userid'];
          $desc=$_POST['description'];
          
          if(empty($fname)){
               header("Location:./read.admin.php?error=First Name is required");
          }
          elseif(empty($lname)){
               header("Location:./read.admin.php?error=Last Name is required");
          }
          elseif(empty($gender)){
               header("Location:./read.admin.php?error=Gender is required");
          }
          elseif(empty($dob)){
               header("Location:./read.admin.php?error=Date of Birth is required");
          }elseif(empty($address)){
               header("Location:./read.admin.php?error=Address is required");
          }
          elseif(empty($phone)){
               header("Location:./read.admin.php?error=Phone is required");
          }
          elseif(empty($uname)){
               header("Location:./read.admin.php?error=Username is required");
          }
          elseif(empty($pw)){
               header("Location:./read.admin.php?error=Password is required");
          }
          elseif(empty($userid)){
               header("Location:./read.admin.php?error=User ID is required");
          }
          else{

               $sql="INSERT INTO admins(firstName,lastName,gender,dob,`address`,phone,email,username,`password`,userId,`description`)";
               $sql.="VALUES (?,?,?,?,?,?,?,?,?,?,?)";
               if(insertData($conn,$sql,[$fname,$lname,$gender,$dob,$address,$phone,$email,$uname,$pw,$userid,$desc])){
                    header("Location:./read.admin.php?error=One record has been added!");
               }else{
                    header("Location:./read.admin.php?error=Connot create new record!");
               }
          }
     }