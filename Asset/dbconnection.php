<?php 
     define("DNS","mysql:host=localhost;dbname=elibraryms;port=3306;");
     define("USERNAME",'root');
     define("PASSWORD",'12345');

     $options=[
          PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
          PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
     ];
     try{
          $conn=new PDO(DNS,USERNAME,PASSWORD,$options);
     }catch(Exception $ex){
          die($ex->getMessage());
     }

?>