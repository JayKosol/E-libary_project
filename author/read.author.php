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
     <title>Author</title>
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
                  <a class="navbar-brand" href="#">Authors</a>
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
<div class="container-fluid mt-3 ">
          <?php if (isset($_GET['error'])) { ?>
               <div class="alert alert-danger" role="alert">
               <?=htmlspecialchars($_GET['error'])?>
               </div>
          <?php } ?>
          
          <!-- pop menu create new users -->
          <div class="accordion accordion-flush" id="accordionFlushExample" >
               <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                         <button id="new" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" >
                              Create New Author
                         </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                         <div class="accordion-body">
                              <form action="./create.author.php" method="post">
                                   <div class="row">
                                        <div class="col">
                                             <div class="input-group mb-2">
                                                  <label for="authorName" class="input-group-text">Author's name</label>
                                                  <input type="text" name="authorName" id="authorName" class="form-control" placeholder="Author's name">
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
                                        <label for="bookqty" class="input-group-text">Book</label>
                                        <input type="text" name="bookqty" id="bookqty" class="form-control" placeholder="Qty">
                                   </div>
                                   <div class="input-group mb-2">
                                        <label for="contact" class="input-group-text">Contact</label>
                                        <input type="text" name="contact" id="contact" class="form-control" placeholder="Phone or Email">
                                   </div>
                                   <div class="input-group mb-2">
                                        <label for="desc" class="input-group-text">Description</label>
                                        <textarea name="desc" style="height: 100px;" class="form-control" id="desc" cols="30" rows="10"></textarea>
                                   </div>
                                   <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Create Now</button>
                                   </div>
                              </form>
                         </div>
                    </div>
               </div>
          </div>
          <!-- form show data from Database -->
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
                              
                              <div class="input-group" style="width: 155px;float:right;">
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
                        <h3>Authors's Information</h3>
                    </div>
                    
                <?php 
               
                    $sql="SELECT * FROM authors WHERE LOWER(authorName) LIKE LOWER('%$s%') ORDER BY authorId $sortBy LIMIT $limit OFFSET $offset";
                    $queryCount="SELECT * FROM authors WHERE LOWER(authorName) LIKE LOWER('%$s%')";
                    $reCount=$conn->query($queryCount);
                    $count=$reCount->rowCount();
                    $countPage=ceil($count /$limit);

                    $auth=$conn->query($sql);

                    if($auth->rowCount()>0){
                        echo "<table class='table table-striped table-hover table-bordered'>";
                        echo "<thead>";
                        echo "<tr>";
                            echo "<th>ID</th>";
                            echo "<th>Author's Name</th>";
                            //echo "<th>LastName</th>";
                            echo "<th>Book Qty</th>";
                            echo "<th>Contact</th>";
                            echo "<th>Description</th>";
                            echo "<th>Action</th>";
                            
                           
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while($au=$auth->fetch()){
                            echo "<tr>";
                                echo "<td>".$au['authorId']."</td>";
                                echo "<td>".$au['authorName']."</td>";
                                //echo "<td>".$au['lastName']."</td>";
                                echo "<td>".$au['bookQty']." ក្បាល"."</td>";
                                echo "<td>".$au['contact']."</td>";
                                echo "<td>".$au['description']."</td>";
                                
                                
                                echo "<td>";
                                   // if($ad['status']==0){
                                   //      echo "<a href='delete.user.php?id=".$ad['id']."&status=1'>Enable</a>";
                                   // }else{
                                   //      echo "<a href='delete.user.php?id=".$ad['id']."&status=0' class=''>Disable</a>";
                                   // }
                                    echo "<a href='./delete.author.php?id=".$au['authorId']."'' class='bi bi-trash'></a>";
                                   //  echo nl2br("\t");
                                   //  echo "<a href='' class='bi bi-card-text'></a>";
                                    echo nl2br("\t| ");
                                    echo "<a href='./update.author.php?id=".$au['authorId']."'' class='bi bi-file-earmark-medical'></a>";
                                echo "</td>";
                                
                            echo "</tr>";
                        }
                        echo "</tbody>";

                        echo "</table>";
                    }else{
                        echo "Datas not found!";
                    }

                ?>
                    
                </div>
                <nav aria-label="Page navigation example ">
                    <ul class="pagination justify-content-center mt-2">
                         <li class="page-item <?php echo $pagination ==1 ? 'disabled':''; ?>">
                              <a class="page-link" href="./read.author.php?limit=<?php echo $limit?>&page=<?php echo $pagination-1?>">Previous</a>
                         </li>

                         <?php
                              for($i=1; $i<=$countPage;$i++){
                                   ?>
                                   <li class="page-item <?php echo $pagination ==$i ?'active':''; ?>"><a class="page-link"
                                   href="./read.author.php?limit=<?php echo $limit?>&page=<?php echo $i;?>"><?php echo $i ?></a></li>
                                   <?php
                              }
                         ?>
                         
                    
                         
                         <li class="page-item <?php echo $pagination >= $countPage ? 'disabled':''; ?>">
                              <a class="page-link" href="./read.author.php?limit=<?php echo $limit?>&page=<?php echo $pagination+1?>">Next</a>
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
               window.location.href=`read.author.php?limit=${value}&page=0`;
          });

          const searchBar=document.querySelector("#search_box");
          const searchValue=searchBar.querySelector("#search_input");
          searchBar.addEventListener("submit",function(e){
               e.preventDefault();
               window.location.href=`read.author.php?limit=<?= $limit; ?>&page=0&s=${searchValue.value}&sortBy=<?= $sort ?>`;

          });
          searchValue.addEventListener("input",function(e){
               const value=e.currentTarget.value;
               if(value.length===0) window.location.href=`read.author.php?limit=<?= $limit; ?>&page=0&s=`;
          });

          const sortBy=document.querySelector("#page_sort");
          sortBy.addEventListener("change",function(e){
               const value=e.currentTarget.value;
               window.location.href=`read.author.php?limit=<?= $limit; ?>&page=0&s=${searchValue.value}&sortBy=${value}`;
          });

     </script>
     </div>
     <script src="../Asset/home.js"></script>
</body>
</html>

