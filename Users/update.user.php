<?php  
     include_once './../Asset/dbconnection.php';
     include_once './function.php';
     //get data from users to show
     if(isset($_GET['id'])&& !empty($_GET['id'])){
          $id=$_GET['id'];
          //echo $id;
          $sql="SELECT * FROM user_account WHERE id=:id";
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
          $pw=password_hash($_POST['password'],PASSWORD_DEFAULT);
          $position=$_POST['position'];
          $cd=$_POST['createdate'];
          $desc=$_POST['description'];

          $sqlUp="UPDATE user_account SET userTypes=:utype, username=:uname, `password`=:pw, position=:position, createDate=:cd, `description`=:desc WHERE id=:id";
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
     <?php include_once "../Asset/boostrap.php";
           //include_once "../Asset/dbconnection.php";
           include_once "../Asset/font.php";
           //include_once "../Users/function.php";
     ?>
     <link rel="stylesheet" href="../Asset/css/style.css">
     <title>Update</title>
</head>
<body>
     <div class="sidebar">
      <div class="logo-content">
            <div class="logo">
                  <i class='bx bxl-html5' ></i>
                  <div class="logo_name">E-Libary</div>
            </div>
            <i class='bx bx-menu' id="btn"></i>
      </div>
      <ul class="nav-list tabs">
                  <li>
                        <a href="#">
                              <i class='i bx bx-search'></i>
                              <input type="text" id="search" placeholder="Search">
                        </a>
                        <!-- <i class='tool' ></i> -->
                  </li> 
                  <li class="tab is-active">
                        <a href="../home.php" data-switcher data-tab="1">
                              <i class='bx bxs-dashboard i' ></i>
                              <span class="link_name">Dashboard</span>
                        </a>
                        <!-- <i class='tool' ></i> -->
                  </li>
                  <li  class="tab">
                        <a href="../category/read.cate.php" data-switcher data-tab="2">
                              <i class='bx bx-category i' ></i>
                              <span class="link_name">Category</span>
                        </a>
                        <!-- <i class='tool' ></i> -->
                  </li>
                  <li  class="tab">
                        <a href="../author/read.author.php" data-switcher data-tab="3">
                              <i class='bx bxs-user-detail i' ></i>
                              <span class="link_name">Author</span>
                        </a>
                        <!-- <i class='tool' ></i> -->
                  </li>
                  <li  class="tab">
                        <a href="../book/read.book.php" data-switcher data-tab="4">
                              <i class='bx bxs-book i' ></i>
                              <span class="link_name">Book</span>
                        </a>
                        <!-- <i class='tool' ></i> -->
                  </li>
                  <li  class="tab">
                        <a href="#" data-switcher data-tab="5">
                              <i class='bx bxs-key i' ></i>
                              <span class="link_name">Issue</span>
                        </a>
                        <!-- <i class='tool' ></i> -->
                  </li>
                  <li  class="tab">
                        <a href="./read.user.php" data-switcher data-tab="6">
                              <i class='bi bi-people-fill' ></i>
                              <span class="link_name">Users</span>
                        </a>
                        <!-- <i class='tool' ></i> -->
                  </li>
            </ul>

            <?php include_once "../profile.php" ?>
     </div>
     <div id="home_content" class="pages">
     <nav class="navbar navbar-expand-lg bg-light" >
            <div class="container-fluid" >
                  <a class="navbar-brand" href="#">Update Users</a>
            </div>
            </nav> 
          <div class="container-fluid">
               <div class="row">
                    <div class="col-md-12">
                         <form action="" method="post">
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
                                   <button onclick="return confirm('Do want to update this record?')" type="submit" class="btn btn-primary">Update Now</button>
                                   <a href="./read.user.php" class="btn btn-primary" style="float: right;">Back</a>
                              </div>
                         </form>
                    </div>
               </div>
          </div>
          <script src="../Asset/home.js"></script>
</body>
</html>
