<?php

     include_once './../Asset/dbconnection.php';
     include_once './../Users/function.php';
     if($_SERVER['REQUEST_METHOD']=="POST"){
          $btitle=$_POST['booktitle'];
          $isbn=$_POST['isbn'];
          $author=$_POST['author'];
          $category=$_POST['category'];
          $language=$_POST['language'];
          $year=$_POST['year']; 
          $edition=$_POST['edition']; 
          $img="../img/".basename($_FILES['photo']['name']);
          if(move_uploaded_file($_FILES['photo']['tmp_name'],$img)){
               
               //echo $img;
               $photo=$img; 
               $desc=$_POST['desc'];
               $create_date=$_POST['createdate'];
               $create_by=$_POST['createby'];
     
               if(empty($btitle)){
                    header("Location:./read.book.php?error=Book's title is required");
               }
               elseif(empty($isbn)){
                    header("Location:./read.book.php?error=Book's ISBN is required");
               }
               elseif(empty($author)){
                    header("Location:./read.book.php?error=Author is required");
               }
               elseif(empty($category)){
                    header("Location:./read.book.php?error=Category is required");
               }elseif(empty($language)){
                    header("Location:./read.book.php?error=Book's language is required");
               }
               elseif(empty($year)){
                    header("Location:./read.book.php?error=Release year is required");
               }
               elseif(empty($edition)){
                    header("Location:./read.book.php?error=Book's edition is required");
               }
               // elseif(empty($photo)){
               //      header("Location:./read.book.php?error=Book Cover image is required");
               // }
               elseif(empty($create_date)){
                    header("Location:./read.book.php?error=Create date is required");
               }elseif(empty($create_by)){
                    header("Location:./read.book.php?error=Create by is required");
               }
               else{

                    $sql="INSERT INTO books(bookTitle,isbn,authorsId,categoryId,languages,releaseYear,createDate,createBy,photos,`desc`,bookEdition)";
                    $sql.="VALUES (?,?,?,?,?,?,?,?,?,?,?)";
                    if(insertData($conn,$sql,[$btitle,$isbn,$author,$category,$language,$year,$create_date,$create_by,$img,$desc,$edition])){
                         header("Location:./read.book.php?alert=One record has been added!");
                    }else{
                         header("Location:./read.book.php?alert=Connot create new record!");
                    }
               }
          }
     }