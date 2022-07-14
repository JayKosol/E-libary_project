<?php  
     require_once './../Asset/dbconnection.php';
     //get data from users to show
     if(isset($_GET['id'])&& !empty($_GET['id'])){
          $id=$_GET['id'];
          //echo $id;
          $sql="SELECT * FROM user_account WHERE userId=:id";
          $presql=$conn->prepare($sql);
          
          $presql->bindParam(":id",$pa_id);
          $pa_id=$id;
          $presql->execute();
          if($presql->rowCount()==1){
              $result=$presql->fetch(PDO::FETCH_ASSOC);
              
              $uType=$result['userTypes'];
              $uname=$result['username'];
              $pw=$result['password'];
              $position=$result['position'];
              $cd=$result['createDate'];
              $desc=$result['description'];
          }else{
              echo "not found!";
          }
      }

     //update data to Mysql 
     if(isset($_POST['id'])&& !empty($_POST['id'])){
          $id=$_POST['id'];
          $uType=$_POST['usertype'];
          $uname=$_POST['username'];
          $pw=$_POST['password'];
          $position=$_POST['position'];
          $cd=$_POST['createdate'];
          $desc=$_POST['description'];

          $sqlUp="UPDATE user_account SET userTypes=:utype, username=:uname, `password`=:pw, position=:position, createDate=:cd, `description`=:desc WHERE userId=:id";
          $stm=$conn->prepare($sqlUp);

          $stm->bindParam(":utype",$pa_utype);
          $stm->bindParam(":uname",$pa_name);
          $stm->bindParam(":pw",$pa_pw);
          $stm->bindParam(":position",$pa_pos);
          $stm->bindParam(":cd",$pa_cd);
          $stm->bindParam(":desc",$pa_desc);
          $stm->bindParam(":id",$pa_id);

          $pa_utype=$uType;
          $pa_name=$uname;
          $pa_pw=$pw;
          $pa_pos=$position;
          $pa_cd=$cd;
          $pa_desc=$desc;
          $pa_id=$id;

          if($stm->execute()){                
               header("Location: ./read.user.php?alert=One record has been updated!");
               exit;
          }
          else{
               echo "Cannot update!";
          }
     }
     // }else{
     //      echo "Try again!";
     // }
      
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Update Users</title>
     <?php 
          include_once './../Asset/boostrap.php';
          
     ?>
</head>
<body>
     <div class="container">
          <div class="row">
               <div class="col-md-12">
                    <form action="" method="post">
                         <div class="mb-2">
                              <h4>Update Users</h4>
                         </div>
                         <div class="mb-2">
                              <input type="hidden" name="id" value="<?php echo $id; ?>">
                              <label for="usertype" class="form-label">User Types</label>
                              <input type="text" name="usertype" value="<?php echo $uType; ?>" class="form-control">
                         </div>
                         <div class="mb-2">
                              <label for="username" class="form-label">Username</label>
                              <input type="text" value="<?php echo $uname; ?>" name="username" id="username" class="form-control" placeholder="Username">
                         </div>
                         <div class="mb-2">
                              <label for="password" class="form-label">Password</label>
                              <input type="password" value="<?php echo $pw; ?>" name="password" id="password" class="form-control" placeholder="Password">
                         </div>
                         <div class="mb-2">
                              <label for="position" class="form-label">Position</label>
                              <input type="text" value="<?php echo $position; ?>" name="position" id="position" class="form-control" placeholder="Position">
                         </div>
                         <div class="mb-2">
                              <label for="createdate" class="form-label">Create Date</label>
                              <input type="date" value="<?php echo $cd; ?>" name="createdate" id="createdate" class="form-control" placeholder="">
                         </div>
                         <div class="mb-2">
                              <label for="description" class="form-label">Description</label>
                              <textarea name="description" id="description" class="form-control" 
                              cols="30" rows="10" style="height:100px ;"><?php echo $desc; ?></textarea>
                         </div>
                         <div class="mb-2">
                              <button type="submit" class="btn btn-primary">Update Now</button>
                         </div>
                    </form>
               </div>
          </div>
     </div>
</body>
</html>