
<?php
     include_once "../Asset/dbconnection.php";
     if(isset($_GET['id']) && !empty($_GET['id'])){
          $id=$_GET['id'];
          $sql="SELECT b.*,a.authorName,c.categoryName FROM books b INNER JOIN authors a ON b.authorsId=a.authorId INNER JOIN category c ON b.categoryId=c.categoryId WHERE bookId=:id";
          $stm=$conn->prepare($sql);
          $stm->bindParam("id",$p_id);
          $p_id=$id;
          if($stm->execute()){
               if($stm->rowCount()==1){
                    $re=$stm->fetch();
                    $btitle=$re['bookTitle'];
                    $isbn=$re['isbn'];
                    $author=$re['authorName'];
                    $category=$re['categoryName'];
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
     if(isset($_POST['id']) && !empty($_POST['id'])){
          $query="UPDATE books SET bookTitle=:title, isbn=:isbn, authorsId=:author,categoryId=:category,
          languages=:lang, releaseYear=:year, bookEdition=:edition, photos=:photo, `desc`=:desc, createDate=:cDate, createBy=:cBy WHERE bookId=:id";
          $stm=$conn->prepare($query);

          $btitle=$_POST['booktitle'];
          $isbn=$_POST['isbn'];
          $author=$_POST['author'];
          $category=$_POST['category'];
          $language=$_POST['language'];
          $year=$_POST['year'];
          $edition=$_POST['edition']; 
          
     
          $desc=$_POST['desc'];
          $create_date=$_POST['createdate'];
          $create_by=$_POST['createby'];
          $id=$_POST['id'];

           $stm->bindParam("title",$btitle);
           $stm->bindParam("isbn",$isbn);
           $stm->bindParam("author",$author);
           $stm->bindParam("category",$category);
           $stm->bindParam("lang",$language);
           $stm->bindParam("year",$year);
           $stm->bindParam("edition",$edition);
           $stm->bindParam("photo",$photo);
           $stm->bindParam("desc",$desc);
           $stm->bindParam("cDate",$create_date);
           $stm->bindParam("cBy",$create_by);
           $stm->bindParam("id",$id);
           
           $dest = "../img/".basename($_FILES['photo']['name']);
           
          if (move_uploaded_file($_FILES['photo']['tmp_name'], $dest)) {
               $photo=$dest;
               if ($stmt->execute()) {
                    header("Location:./read.cate.php?alert=One record has been update!");
                    exit;
               }
          }
     }
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
                        <a href="../Users/read.user.php" data-switcher data-tab="6">
                              <i class='bi bi-people-fill' ></i>
                              <span class="link_name">Users</span>
                        </a>
                        <!-- <i class='tool' ></i> -->
                  </li>
            </ul>

            <!-- @profile -->
            <!-- <div class="profile-content">
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
            </div> -->
     </div>
     

     <div id="home_content" class="pages">
     <nav class="navbar navbar-expand-lg bg-light" >
            <div class="container-fluid" >
                  <a class="navbar-brand" href="#">Update Book</a>
            </div>
            </nav> 

<div class="container-fluid mt-4">
     <form action="" method="post">
          <div class="row">
               <div class="col">
                    <div class="input-group mb-2">
                         <input type="hidden" name="id" value="<?=  $id?>">
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
               <input type="number" value="<?= $year ?>" name="year" id="year" class="form-control" placeholder="Year ...">
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
               <input type="file" value="<?= $photo ?>" name="photo" id="photo" class="form-control" placeholder="Upload image ...">
          </div>
          <div class="input-group mb-2">
               <label for="desc" class="input-group-text">Description</label>
               <textarea name="desc" style="height: 70px;" class="form-control" id="desc" cols="30" rows="10"><?= $desc ?></textarea>
          </div>
          <div class="row">
               <div class="col">
                    <div class="input-group mb-2">
                         <label for="createdate" class="input-group-text">Create Date</label>
                         <input type="date" value="<?= $create_date ?>" name="createdate" id="createdate" class="form-control" placeholder="Date ...">
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
