<?php 
     require_once './../Asset/dbconnection.php';
     if(isset($_GET['id']) && !empty($_GET['id'])){
          $id=$_GET['id'];
          $sql="SELECT * FROM category WHERE categoryId=:id";
          $presql=$conn->prepare($sql);
          
          $presql->bindParam(":id",$pa_id);
          $pa_id=$id;
          $presql->execute();
          if($presql->rowCount()==1){
              $result=$presql->fetch(PDO::FETCH_ASSOC);
              
              $catename=$result['categoryName'];
              //$lname=$result['lastName'];
              $createD=$result['createDate'];
              $createB=$result['createBy'];
              $desc=$result['description'];
          }else{
              echo "not found!";
          }

     }
     if(isset($_POST['id']) && !empty($_POST['id'])){
          $id=$_POST['id'];
          $cateName=$_POST['cateName'];
          $createD=$_POST['createDate'];
          $createB=$_POST['createBy'];
          $desc=$_POST['desc'];

          $stm="UPDATE category SET categoryName=:catename, createDate=:cd,createBy=:cb,`description`=:desc Where categoryId=:id";
          $stmt=$conn->prepare($stm);

          $stmt->bindParam(":catename",$p_name);
          $stmt->bindParam(":cd",$p_cd);
          $stmt->bindParam(":cb",$p_cb);
          $stmt->bindParam(":desc",$p_desc);
          $stmt->bindParam(":id",$p_id);
          $p_id=$id;
          $p_cd=$createD;
          $p_cb=$createB;
          $p_desc=$desc;
          $p_name=$cateName;
          if($stmt->execute()){
               header("Location: ./read.cate.php?alert=One record has been update!");
               exit;
          }else{
               header("Location: ./read.cate.php?alert=This record cannot update!");
               exit;
          }

     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Category page</title>
     <?php include_once './../Asset/boostrap.php';
          
          include_once './../Users/function.php' ?>
</head>
<body>
     <div class="container mt-3">
          <div class="mb-3">
               <h4>Update Category</h4>
          </div>
          
          <form action="" method="post">
               <div class="row">
                    <div class="col">
                         <div class="input-group mb-2">
                              <input type="hidden" name="id" value="<?php echo $id; ?>">
                              <label for="cateName" class="input-group-text">Category's name</label>
                              <input type="text" value="<?php echo $catename; ?>" name="cateName" id="cateName" class="form-control" placeholder="Category's name">
                         </div>
                    </div>
                    <!-- <div class="col">
                         <div class="input-group mb-2">
                              <label for="lname" class="input-group-text">Last Name</label>
                              <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name">
                         </div>
                    </div> -->
               </div>
               
               
               <div class="input-group mb-2">
                    <label for="createDate" class="input-group-text">createDate</label>
                    <input type="date" value="<?php echo $createD; ?>" name="createDate" id="createDate" class="form-control" placeholder="">
               </div>
               <div class="input-group mb-2">
                    <label for="createBy" class="input-group-text">Create By</label>
                    <select name="createBy" class="form-control" id="createBy">
                         <option style="display: none;" value="<?php echo $createB;?>"><?php echo $createB; ?></option>
                         <?php echo fill_user_acc($conn); ?>
                    </select>
               </div>
               <div class="input-group mb-2">
                    <label for="desc" class="input-group-text">Description</label>
                    <textarea name="desc" style="height: 100px;" class="form-control" id="desc" cols="30" rows="10"><?php echo $desc; ?></textarea>
               </div>
               <div class="mb-4">
                    <button type="submit" onclick="return confirm('Do want to update this record?')" class="btn btn-primary">Update Now</button>
                    <a href="./read.cate.php">
                         <p style="float: right ;" class="btn btn-primary">Back</p>
                    </a>
                    
               </div>
          </form>

        
     </div>
</body>
</html>