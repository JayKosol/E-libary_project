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
     <title>UpdateBook</title>
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
                        <a href="./read.book.php" data-switcher data-tab="4">
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
                        <a href="../Users/read.admin.php" data-switcher data-tab="6">
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
     if(isset($_GET['id']) && !empty($_GET['id'])){
          $id=$_GET['id'];
          $sql="SELECT * FROM books WHERE bookId=:id";
          $stm=$conn->prepare($sql);
          $stm->bindParam("id",$p_id);
          $p_id=$id;
          if($stm->execute()){
               if($stm->rowCount()==1){
                    $re=$stm->fetch();
                    $btitle=$re['bookTitle'];
                    $isbn=$re['isbn'];
                    $author=$re['authorsId'];
                    $category=$re['categoryId'];
                    $language=$re['languages'];
                    $year=$re['releaseYear'];
                    $edition=$re['bookEdition']; 
                    $photo =$re['photos'];
               
                    $desc=$re['desc'];
                    $create_date=$re['createDate'];
                    $create_by=$re['createBy'];
                    $id=$re['bookId'];
               }else{
                    echo "Not found!";
               }
          }else{
               echo "Error";
          }
          

     }

?>
<div class="container mt-4">
     <form action="./create.book.php" method="post">
          <div class="row">
               <div class="col">
                    <div class="input-group mb-2">
                         <input type="hidden" name="id" value="<?php echo $id; ?>">
                         <label for="booktitle" class="input-group-text">Book's Title</label>
                         <input type="text" value="<?php echo $btitle; ?>" name="booktitle" id="booktitle" class="form-control" placeholder="Title ...">
                    </div>
               </div>
               <div class="col">
                    <div class="input-group mb-2">
                         <label for="isbn" class="input-group-text">Book's ISBN</label>
                         <input type="text" value="<?php echo $isbn; ?>" name="isbn" id="isbn" class="form-control" placeholder="ISBN ...">
                    </div>
               </div>
          </div>
          <div class="row">
               <div class="col">
                    <div class="input-group mb-2">
                         <label for="author" class="input-group-text">Authors</label>
                         <select name="author" class="form-control" id="author">
                              <option style="display: none;" value="<?php echo $author; ?>"><?php echo $author; ?></option>
                              <?php echo fill_author($conn); ?>
                         </select>
                    </div>
               </div>
               <div class="col">
                    <div class="input-group mb-2">
                         <label for="category" class="input-group-text">Category</label>
                         <select name="category" class="form-control" id="category">
                              <option style="display: none;" value="<?= $category ?>"><?= $category ?></option>
                              <?php echo fill_category($conn); ?>
                         </select>
                    </div>
               </div>
          </div>
          
          <div class="input-group mb-2">
               <label for="language" class="input-group-text">Book's Language</label>
               <select name="language" class="form-control" id="language">
                    <option style="display: none;" value="<?= $language ?>"><?= $language ?></option>
                    <?php echo languege_list(); ?>
               </select>
          </div>
          <div class="input-group mb-2">
               <label for="year" class="input-group-text">Release Year</label>
               <input type="number" name="year" id="year" class="form-control" placeholder="Year ...">
          </div>
          
          <div class="input-group mb-2">
               <label for="edition" class="input-group-text">Book's Edition</label>
               <select name="edition" class="form-control" id="edition">
               <option style="display: none;" value="<?= $edition ?>"><?= $edition ?></option>
                    <?php echo edition_list(); ?>
               </select>
          </div>
          <div class="input-group mb-2">
               <label for="photo" class="input-group-text">Book Image</label>
               <input type="file" name="photo" id="photo" class="form-control" placeholder="Upload image ...">
          </div>
          <div class="input-group mb-2">
               <label for="desc" class="input-group-text">Description</label>
               <textarea name="desc" style="height: 70px;" class="form-control" id="desc" cols="30" rows="10"></textarea>
          </div>
          <div class="row">
               <div class="col">
                    <div class="input-group mb-2">
                         <label for="createdate" class="input-group-text">Create Date</label>
                         <input type="date" name="createdate" id="createdate" class="form-control" placeholder="Date ...">
                    </div>
               </div>
               <div class="col">
                    <div class="input-group mb-3">
                         <label for="createby" class="input-group-text">Create By</label>
                         <select name="createby" class="form-control" id="createby">
                              <option style="display: none;" value="<?= $create_by ?>"><?= $create_by ?></option>
                              <?php echo fill_user_acc($conn); ?>
                         </select>
                    </div>
               </div>
          </div>
          
          
          <div class="mb-4">
               <button onclick="return confirm('Do you want to update this record!')" type="submit" class="btn btn-primary">Create Now</button>
               <a href="./read.book.php" style="float:right;" class="btn btn-info" >Back</a>
          </div>
     </form>
</div>
     </div>
     <script src="../Asset/home.js"></script>
</body>
</html>
