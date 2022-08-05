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
     <title>Book</title>
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
                  <a class="navbar-brand" href="#">Book</a>
            </div>
            </nav> 
     <?php 
          
     if(isset($_GET['limit'])){
          $lim=$_GET['limit'];
     }else{
         $lim=""; 
     }
     if($lim==0 || empty($lim)){
          $limit=5;
     }else{
          $limit=$lim;
     }
     //echo $limit;
     if(isset($_GET['page'])){
          $pag=$_GET['page'];
     }else{
          $pag="";
     }
     if($pag==0 || empty($pag)){
          $page=0;
     }else{
          $page=$pag;
     }
     if($page == 0){
          $pagination=1;
     }else{
          $pagination=$page;
     }
     $offset= ceil($pagination * $limit)-$limit;

     if(isset($_GET['s'])){
          $s=$_GET['s'];
     }else{
          $s="";
     }

     if(isset($_GET['sortBy'])){
          $sort=$_GET['sortBy'];
     }else{
          $sort="";
     }
     if(empty($sort)){
          $sortBy='DESC';
     }elseif($sort==='Old'){
          $sortBy='ASC';
     }else{
          $sortBy='DESC';
     }
?>
     <div class="container-fluid mt-3">
          <?php if (isset($_GET['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                    <?=htmlspecialchars($_GET['error'])?>
                    </div>
          <?php } ?>
          
          <!-- pop menu create new users -->
          <div class="accordion accordion-flush" id="accordionFlushExample">
               <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                         <button id="new" class="accordion-button collapsed text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" >
                              Create New Books
                         </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                         <div class="accordion-body">
                              <form action="./create.book.php" method="post" enctype="multipart/form-data">
                                   <div class="row">
                                        <div class="col">
                                             <div class="input-group mb-2">
                                                  
                                                  <label for="booktitle" class="input-group-text">Book's Title</label>
                                                  <input type="text" name="booktitle" id="booktitle" class="form-control" placeholder="Title ...">
                                             </div>
                                        </div>
                                        <div class="col">
                                             <div class="input-group mb-2">
                                                  <label for="isbn" class="input-group-text">Book's ISBN</label>
                                                  <input type="text" name="isbn" id="isbn" class="form-control" placeholder="ISBN ...">
                                             </div>
                                        </div>
                                   </div>
                                   <div class="row">
                                        <div class="col">
                                             <div class="input-group mb-2">
                                                  <label for="author" class="input-group-text">Authors</label>
                                                  <select name="author" class="form-control" id="author">
                                                       <?php echo fill_author($conn); ?>
                                                  </select>
                                             </div>
                                        </div>
                                        <div class="col">
                                             <div class="input-group mb-2">
                                                  <label for="category" class="input-group-text">Category</label>
                                                  <select name="category" class="form-control" id="category">
                                                       <?php echo fill_category($conn); ?>
                                                  </select>
                                             </div>
                                        </div>
                                   </div>
                                  
                                   <div class="input-group mb-2">
                                        <label for="language" class="input-group-text">Book's Language</label>
                                        <select name="language" class="form-control" id="language">
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
                                                       <?php echo fill_user_acc($conn); ?>
                                                  </select>
                                             </div>
                                        </div>
                                   </div>
                                   
                                   
                                   <div class="mb-4">
                                        <button type="submit" class="btn btn-primary">Create Now</button>
                                   </div>
                              </form>
                         </div>
                    </div>
               </div>
          </div>
          <!-- Show books -->
          <div class="row">
            <div class="col-md-12">
            <div class=" mt-3 mb-1">
                    <div class="row g-6">
                         <div class="col-md-8">
                              <form id="search_box">
                                   <div class="input-group d-flex">
                                        <label for="search" class="input-group-text">Search</label>
                                        <input type="search" value="<?= $s; ?>" name="search" id="search_input" placeholder="Search by name ..." class="form-control me-2">
                                        <button class="btn btn-primary">Search</button>
                                   </div>
                              </form>
                             
                              
                         </div>
                         <div class="col-md-2">
                              
                              <div class="input-group" style="width: 170px;float:right;">
                                   <label for="sortBy" class="input-group-text">Sort By</label>
                                   <select class="form-select" id="page_sort">
                                        <option style="display: none;" ><?php echo $sort === ""?"New": $sort; ?></option>
                                        <option >New</option>
                                        <option >Old</option>
                                   </select>
                                   
                              </div>
                         </div>
                         
                         <div class="col" >
                              <div class="input-group" style="width: 140px;float:right;" >
                                   <label for="search"  class="input-group-text">Page/</label>
                                   <select class="form-select" id="page_limit">
                                        <option style="display: none;" ><?php echo $limit; ?></option>
                                        <option >5</option>
                                        <option >15</option>
                                        <option >25</option>
                                        <option >50</option>
                                   </select>
                              </div>
                              
                         </div>
                    </div>
                </div>
               <?php if (isset($_GET['alert'])) { ?>
                    <div class="alert alert-info" role="alert">
                    <?=htmlspecialchars($_GET['alert'])?>
                    </div>
               <?php } ?>
                <div class="card">
                    <div class="card-header">
                        <h3>Books's Information</h3>
                    </div>
                    <div class="">
                         <table class="table table-hover table-striped table-bordered">
                              <tr>
                              
                                   <th>ID</th>
                                   <th>Title</th>
                                   <th>ISBN</th>
                                   <th>Author</th>
                                   <th>Category</th>
                                   <th>Language</th>
                                   <th>Release</th>
                                   <th>Edition</th>
                                   <th>Image</th>
                                   <th>CreateDate</th>
                                   <th>CreateBy</th>
                                   <th style="width: 110px;">Action</th>
                                   <?php
                                        $sql="SELECT b.*,a.authorName,c.categoryName FROM books b INNER JOIN authors a ON b.authorsId=a.authorId INNER JOIN category c ON b.categoryId=c.categoryId  
                                        WHERE LOWER(bookTitle) LIKE LOWER('%$s%') ORDER BY bookId $sortBy LIMIT $limit OFFSET $offset";
                                        $queryCount="SELECT * FROM books WHERE LOWER(bookTitle) LIKE LOWER('%$s%')";
                                        $reCount=$conn->query($queryCount);
                                        $count=$reCount->rowCount();
                                        $countPage=ceil($count /$limit);

                                        $stm=$conn->query($sql);
                                        if($stm->rowCount()>0){
                                             while($book=$stm->fetch()):
                                             
                                   ?>
                              </tr>
                              <tr>
                                   
                                             <td><?php echo $book['bookId']; ?></td>
                                             <td><?php echo $book['bookTitle']; ?></td>
                                             <td><?php echo $book['isbn']; ?></td>
                                             <td><?php echo $book['authorName']; ?></td>
                                             <td><?php echo $book['categoryName']; ?></td>
                                             <td><?php echo $book['languages']; ?></td>
                                             <td><?php echo $book['releaseYear']; ?></td>
                                             <td><?php echo $book['bookEdition']; ?></td>
                                             <td>
                                                 <img style="width: 55px;height:70px;" src="<?php echo $book['photos']; ?>"/>
                                                 
                                             </td>
                                             <td><?php echo $book['createDate']; ?></td>
                                             <td><?php echo $book['createBy']; ?></td>
                                             <td style="display: flex;" >
                                                  <form action="./delete.book.php" method="post">
                                                       <input type="hidden" name="id" value="<?php echo $book['bookId'];?>">
                                                       
                                                       <button type="submit" style="color: blue;border:none;" onclick="return confirm('Do want to delete this record?')">
                                                       <i  class="bi bi-trash" ></i>
                                                       </button>
                                                       
                                                  </form>
                                                  
                                                  <?php echo " " ?>
                                                  <a style="padding-right: 10px;" href="./update.book.php?id=<?php echo $book['bookId'];?>" class="bi bi-file-earmark-medical"></a>
                                                  <?php echo " " ?>
                                                  <a  href="./detail.book.php?id=<?php echo $book['bookId'];?>" class="bi bi-card-text"></a>
                                             </td>

                                   <?php 
                                             endwhile;
                                        }
                                        else{
                                             echo "Not found datas!";
                                        }
                                   ?>
                              </tr>
                         </table>
                    </div>

                    

                </div>
                <nav aria-label="Page navigation example ">
                    <ul class="pagination justify-content-center mt-2">
                         <li class="page-item <?php echo $pagination ==1 ? 'disabled':''; ?>">
                              <a class="page-link" href="./read.book.php?limit=<?php echo $limit?>&page=<?php echo $pagination-1?>">Previous</a>
                         </li>

                         <?php
                              for($i=1; $i<=$countPage;$i++){
                                   ?>
                                   <li class="page-item <?php echo $pagination ==$i ?'active':''; ?>"><a class="page-link"
                                   href="./read.book.php?limit=<?php echo $limit?>&page=<?php echo $i;?>"><?php echo $i ?></a></li>
                                   <?php
                              }
                         ?>
                         
                    
                         
                         <li class="page-item <?php echo $pagination >= $countPage ? 'disabled':''; ?>">
                              <a class="page-link" href="./read.book.php?limit=<?php echo $limit?>&page=<?php echo $pagination+1?>">Next</a>
                         </li>
                    </ul>
               </nav>
            </div>
        </div>
     </div>
     <script>
          const pageLilit=document.querySelector("#page_limit");
          pageLilit.addEventListener("change", function(e){
               const value=e.currentTarget.value;
               window.location.href=`read.book.php?limit=${value}&page=0`;
          });

          const searchBar=document.querySelector("#search_box");
          const searchValue=searchBar.querySelector("#search_input");
          searchBar.addEventListener("submit",function(e){
               e.preventDefault();
               window.location.href=`read.book.php?limit=<?= $limit; ?>&page=0&s=${searchValue.value}&sortBy=<?= $sort ?>`;

          });
          searchValue.addEventListener("input",function(e){
               const value=e.currentTarget.value;
               if(value.length===0) window.location.href=`read.book.php?limit=<?= $limit; ?>&page=0&s=`;
          });

          const sortBy=document.querySelector("#page_sort");
          sortBy.addEventListener("change",function(e){
               const value=e.currentTarget.value;
               window.location.href=`read.book.php?limit=<?= $limit; ?>&page=0&s=${searchValue.value}&sortBy=${value}`;
          });

     </script>
     </div>
     <script src="../Asset/home.js"></script>
</body>
</html>

