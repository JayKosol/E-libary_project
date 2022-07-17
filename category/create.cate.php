<?php 
require_once './../Asset/dbconnection.php';
include_once './../Users/function.php';
     if($_SERVER['REQUEST_METHOD']=="POST"){
          $cateName=$_POST['cateName'];
          $createDate=$_POST['createDate'];
          $createBy=$_POST['createBy'];
          $desc=$_POST['desc'];
          if(empty($cateName)){
               header("Location: ./read.cate.php?error=Category name is required!");
          }elseif(empty($createDate)){
               header("Location: ./read.cate.php?error=Create date is required!");
          }elseif(empty($createBy)){
               header("Location: ./read.cate.php?error=Create by is required!");
          }elseif(empty($desc)){
               header("Location: ./read.cate.php?error=Description is required!");
          }else{
               $sql="INSERT INTO category(categoryName,createDate,createBy,`description`)";
               $sql.="VALUES (?,?,?,?)";
               if(insertData($conn,$sql,[$cateName,$createDate,$createBy,$desc])){
                    header("Location: ./read.cate.php?alert=One record has been created!");
                    exit;
               }else{
                    header("Location: ./read.cate.php?alert=Cannot create category!");
                    exit;
               }
          }

     }