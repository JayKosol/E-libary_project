<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php include_once "../Asset/boostrap.php";
           include_once "../Asset/dbconnection.php";
           include_once "../Asset/font.php";
           include_once "../Users/function.php";
     ?>
     <link rel="stylesheet" href="../Asset/css/style.css">
     <title>Updae admin</title>
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
                        <a href="./read.admin.php" data-switcher data-tab="6">
                              <i class='bi bi-people-fill' ></i>
                              <span class="link_name">Users</span>
                        </a>
                        <!-- <i class='tool' ></i> -->
                  </li>
            </ul>

            <!-- @profile -->
            <div class="profile-content">
                  <div class="profile">
                        <img src="../img/default.png" alt="">
                        <div class="profile-detail">
                              <div class="name_job">
                                    <div class="name">Username</div>
                                    <div class="job">
                                          <span>Administrator</span>
                                          <i class='bx bx-log-out' id="btn_logout"></i>
                                    </div>
                                         
                              </div>
                              
                        </div>
                  </div>
            </div>
     </div>
     

     <div id="home_content" class="pages">
     <?php  
     //get data from users to show
     if(isset($_GET['id'])&& !empty($_GET['id'])){
          $id=$_GET['id'];
          //echo $id;
          $sql="SELECT * FROM users WHERE id=:id";
          $presql=$conn->prepare($sql);
          
          $presql->bindParam(":id",$pa_id);
          $pa_id=$id;
          $presql->execute();
          if($presql->rowCount()==1){
              $result=$presql->fetch();
              
              $fname=$result['firstName'];
              $lname=$result['lastName'];
              $gender=$result['gender'];
              $dob=$result['dob'];
              $address=$result['address'];
              $phone=$result['phone'];
              $email=$result['email'];
              $joindate=$result['joinDate'];
              $position=$result['position'];
              $salary=$result['salary'];
              $desc=$result['description'];
              
          }else{
              echo "not found!";
          }
      }

     //update data to Mysql 
     if(isset($_POST['id'])&& !empty($_POST['id'])){
          $id=$_POST['id'];
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
          

          $sqlUp="UPDATE users SET firstName=:fname, lastName=:lname, gender=:gender, dob=:dob, `address`=:address, phone=:phone, email=:email, `description`=:desc, joinDate=:joinD, position=:position, salary=:salary WHERE id=:id";
          $stm=$conn->prepare($sqlUp);

          $stm->bindParam(":fname",$pa_fname);
          $stm->bindParam(":lname",$pa_lname);
          $stm->bindParam(":gender",$pa_gender);
          $stm->bindParam(":dob",$pa_dob);
          $stm->bindParam(":address",$pa_add);
          $stm->bindParam(":phone",$pa_phone);
          $stm->bindParam(":email",$pa_email);
          $stm->bindParam(":desc",$pa_desc);
          $stm->bindParam(":joinD",$pa_join);
          $stm->bindParam(":position",$pa_pos);
          $stm->bindParam(":salary",$pa_salary);
          $stm->bindParam(":id",$pa_id);

          $pa_fname=$fname;
          $pa_lname=$lname;
          $pa_gender=$gender;
          $pa_dob=$dob;
          $pa_add=$address;
          $pa_phone=$phone;
          $pa_email=$email;
          $pa_desc=$desc;
          $pa_join=$joindate;
          $pa_pos=$position;
          $pa_salary=$salary;
          $pa_id=$id;
          if($stm->execute()){                
               header("Location: ./read.admin.php?alert=One record has been updated!");
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
<div class="container">
     <div class="text-info">
          <h4>Update Users</h4>
     </div>


     <form action="" method="post">
          <div class="row">
               <div class="col">
                    <div class="input-group mb-2">
                         <input type="hidden" name="id" value="<?php echo $id;?>" >

                         <label for="fname" class="input-group-text">First Name</label>
                         <input type="text" value="<?php echo $fname;  ?>" name="fname" id="fname" class="form-control" placeholder="First Name">
                    </div>
               </div>
               <div class="col">
                    <div class="input-group mb-2">
                         <label for="lname" class="input-group-text">Last Name</label>
                         <input type="text" value="<?php echo $lname;  ?>" name="lname" id="lname" class="form-control" placeholder="Last Name">
                    </div>
               </div>
          </div>
          <div class="row">
               <div class="col">
                    <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">Gender</label>
                    <!-- <input type="text" value="<?php //echo $gender;  ?>" name="gender" id="" class="form-control" placeholder="Gender"> -->
                         
                         <select class="form-select" name="gender" aria-label="Default select example">
                              <option style="display: none;" value="<?php echo $gender;  ?>">Select Gender</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                              <option value="Others">Others</option>
                         </select>
                    </div>
               </div>
               <div class="col">
               <div class="input-group mb-2">
                         <label for="dob" class="input-group-text">Date of Birth</label>
                         <input type="date" value="<?php echo $dob;  ?>" name="dob" id="dob" class="form-control" placeholder="Password">
                    </div>
               </div>
          </div>
          
          <div class="input-group mb-2">
               <label for="address" class="input-group-text">Address</label>
               <input type="text" value="<?php echo $address;  ?>" name="address" id="address" class="form-control" placeholder="Address">
          </div>
          <div class="input-group mb-2">
               <label for="phone" class="input-group-text">Phone</label>
               <input type="tel" value="<?php echo $phone;  ?>" name="phone" id="phone" class="form-control" placeholder="Phone">
          </div>
          <div class="input-group mb-2">
               <label for="email" class="input-group-text">Email</label>
               <input type="email" value="<?php echo $email;  ?>" name="email" id="email" class="form-control" placeholder="Email">
          </div>
          <div class="input-group mb-2">
               <label for="joindate" class="input-group-text">Join Date</label>
               <input type="date" value="<?php echo $joindate;  ?>" name="joindate" id="joindate" class="form-control" placeholder="Join Date">
          </div>
          <div class="input-group mb-2">
               <label for="position" class="input-group-text">Position</label>
               <input type="text" value="<?php echo $position;  ?>" name="position" id="position" class="form-control" placeholder="Position">
          </div>
          <div class="input-group mb-2">
               <label for="salary" class="input-group-text">Salary</label>
               <input type="text" value="<?php echo $salary;  ?>" name="salary" id="salary" class="form-control" placeholder="Salary">
          </div>
          
          <div class="input-group mb-2">
               <label for="description" class="input-group-text">Description</label>
               <textarea name="description" id="description" class="form-control" 
               cols="30" rows="10" style="height:100px ;"><?php echo $desc;  ?></textarea>
          </div>
          <div class="mb-2">
               <button onclick="return confirm('Do want to update this record?')" type="submit" class="btn btn-primary">Update Now</button>
               <a href="./read.admin.php" class="btn btn-primary" style="float: right;">Back</a>
          </div>
     </form>
</div>
     </div>
     <script src="../Asset/home.js"></script>
</body>
</html>
