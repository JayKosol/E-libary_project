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
          $joindate=$_POST['joindate'];
          $position=$_POST['position'];
          $salary=$_POST['salary'];
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
          elseif(empty($email)){
               header("Location:./read.admin.php?error=Email is required");
          }
          elseif(empty($joindate)){
               header("Location:./read.admin.php?error=Join Date is required");
          }
          elseif(empty($position)){
               header("Location:./read.admin.php?error=Position is required");
          }elseif(empty($salary)){
               header("Location:./read.admin.php?error=Salary is required");
          }
          else{

               $sql="INSERT INTO users(firstName,lastName,gender,dob,`address`,phone,email,`description`,joinDate,position,salary)";
               $sql.="VALUES (?,?,?,?,?,?,?,?,?,?,?)";
               if(insertData($conn,$sql,[$fname,$lname,$gender,$dob,$address,$phone,$email,$desc,$joindate,$position,$salary])){
                    header("Location:./read.admin.php?error=One record has been added!");
               }else{
                    header("Location:./read.admin.php?error=Connot create new record!");
               }
          }
     }