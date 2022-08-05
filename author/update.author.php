<?php
      include_once "../Asset/dbconnection.php";
      include_once "../Users/function.php";
     if(isset($_GET['id'])&& !empty($_GET['id'])){
          $id=$_GET['id'];
          //echo $id;
          $sql="SELECT * FROM authors WHERE authorId=:id";
          $presql=$conn->prepare($sql);
          
          $presql->bindParam(":id",$pa_id);
          $pa_id=$id;
          $presql->execute();
          if($presql->rowCount()==1){
              $result=$presql->fetch(PDO::FETCH_ASSOC);
              
              $fname=$result['authorName'];
              //$lname=$result['lastName'];
              $bookqty=$result['bookQty'];
              $contact=$result['contact'];
              $desc=$result['description'];
          }else{
              echo "not found!";
          }
      }

     //update data to Mysql 
     if(isset($_POST['id'])&& !empty($_POST['id'])){
          $id=$_POST['id'];
          $fname=$_POST['authorName'];
          //$lname=$_POST['lname'];
          $bookqty=$_POST['bookqty'];
          $contact=$_POST['contact'];
          $desc=$_POST['desc'];

          $sqlUp="UPDATE authors SET authorName=:a_name, bookQty=:bqty, contact=:contact, `description`=:desc WHERE authorId=:id";
          $stm=$conn->prepare($sqlUp);

          $stm->bindParam(":a_name",$pa_a_name);
          //$stm->bindParam(":lname",$pa_lname);
          $stm->bindParam(":bqty",$pa_bqty);
          $stm->bindParam(":contact",$pa_contact);
          $stm->bindParam(":desc",$pa_desc);
          $stm->bindParam(":id",$pa_id);

          $pa_a_name=$fname;
          //$pa_lname=$lname;
          $pa_bqty=$bookqty;
          $pa_contact=$contact;
          $pa_desc=$desc;
          $pa_id=$id;

          if($stm->execute()){                
               header("Location: ./read.author.php?alert=One record has been updated!");
               exit;
          }
          else{
               header("Location: ./read.author.php?alert=Cannot update this record!");
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

           include_once "../Asset/font.php";
           include_once "../Users/function.php";
     ?>
     <link rel="stylesheet" href="../Asset/css/style.css">
     <title>Update Author</title>
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
                        <a href="./read.author.php" data-switcher data-tab="3">
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
                        <a href="../Users/read.user.php" data-switcher data-tab="6">
                              <i class='bi bi-people-fill' ></i>
                              <span class="link_name">Users</span>
                        </a>
                        <!-- <i class='tool' ></i> -->
                  </li>
            </ul>

            <?php include_once "../profile.php"; ?>
     </div>
     

     <div id="home_content" class="pages">
     <nav class="navbar navbar-expand-lg bg-light" >
            <div class="container-fluid" >
                  <a class="navbar-brand" href="#">Update Author</a>
            </div>
      </nav> 

<div class="container-fluid">
<form action="" method="post" class="mt-2">
     <div class="row">
          <div class="col">
               <div class="input-group mb-2">
                    <input type="hidden" value="<?php echo $id; ?>" name="id">
                    <label for="authorName" class="input-group-text">Full Name</label>
                    <input type="text" value="<?php echo $fname; ?>" name="authorName" id="authorName" class="form-control" placeholder="First Name">
               </div>
          </div>
          <!-- <div class="col">
               <div class="input-group mb-2">
                    <label for="lname" class="input-group-text">Last Name</label>
                    <input type="text" value="<?php //echo $lname; ?>" name="lname" id="lname" class="form-control" placeholder="Last Name">
               </div>
          </div> -->
     </div>
     
     
     <div class="input-group mb-2">
          <label for="bookqty" class="input-group-text">Book</label>
          <input type="text" value="<?php echo $bookqty; ?>" name="bookqty" id="bookqty" class="form-control" placeholder="Qty">
     </div>
     <div class="input-group mb-2">
          <label for="contact" class="input-group-text">Contact</label>
          <input type="text" value="<?php echo $contact; ?>" name="contact" id="contact" class="form-control" placeholder="Phone or Email">
     </div>
     <div class="input-group mb-2">
          <label for="desc" class="input-group-text">Description</label>
          <textarea name="desc"  style="height: 100px;" class="form-control" id="desc" cols="30" rows="10"><?php echo $desc; ?></textarea>
     </div>
     <div class="mb-3">
          <button onclick="return confirm('Do want to update this record?')" type="submit" class="btn btn-primary">Update Now</button>
          <a href="./read.author.php" style="float: right ;" class="btn btn-primary">Back</a>
     </div>
</form>
</div>
     </div>
     <script src="../Asset/home.js"></script>
</body>
</html>

