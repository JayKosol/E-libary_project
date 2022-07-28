




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
     <title>User</title>
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
     <div id="home_content" class="pages" style="background-color: #DFFFFF;">
     <?php 
     // include_once './../Asset/dbconnection.php';
     // include_once './../Asset/boostrap.php';
     // include_once './function.php';
          
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
     <div class="container mt-3">
          <?php if (isset($_GET['error'])) { ?>
               <div class="alert alert-danger" role="alert">
               <?=htmlspecialchars($_GET['error'])?>
               </div>
          <?php } ?>
          <div>
               <p class="text-info">
                    <!-- <?php echo $alert;  ?> -->
               </p>
          </div>
          <!-- pop menu create new users -->
          <div class="accordion accordion-flush" id="accordionFlushExample">
               <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                         <button id="new" class="accordion-button collapsed text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" >
                              Create New User
                         </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                         <div class="accordion-body">
                              <form action="./create.user.php" method="post">
                                   <div class="row">
                                        <div class="col">
                                             <div class="input-group mb-2">
                                             <label for="usertype" class="input-group-text">User Types</label>
                                             <select class="form-select" name="usertype" aria-label="Default select example">
                                                  <option style="display: none;">Please Select User Types</option>
                                                  <option value="Admin">Admin</option>
                                                  <option value="Librarain">Librarain</option>
                                             </select>
                                             </div>
                                        </div>
                                        <div class="col">
                                             <div class="input-group mb-2">
                                                  <label for="username" class="input-group-text">Username</label>
                                                  <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                                             </div>
                                        </div>
                                       
                                   </div>
                                   <div class="row">
                                        
                                        <div class="col">
                                             <div class="input-group mb-2">
                                                  <label for="position" class="input-group-text">Position</label>
                                                  <input type="text" name="position" id="position" class="form-control" placeholder="Position">
                                             </div>
                                        </div>
                                        <div class="col">
                                             <div class="input-group mb-2">
                                                  <label for="password" class="input-group-text">Password</label>
                                                  <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                             </div>
                                        </div>
                                   </div>
                                   
                                   
                                   
                                  
                                   <div class="mb-2">
                                        <label for="createdate" class="form-label">Create Date</label>
                                        <input type="date" name="createdate" id="createdate" class="form-control" placeholder="">
                                   </div>
                                   <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea name="description" id="description" class="form-control" 
                                        cols="30" rows="10" style="height:100px ;"></textarea>
                                   </div>
                                   <div class="mb-2">
                                        <button  type="submit" class="btn btn-primary">Create Now</button>
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
                        <h2>Users</h2>
                    </div>
                    <div class="">
                         <table class="table table-striped table-hover table-bordered">
                              <tr>
                                   <th>ID</th>
                                   <th>User Type</th>
                                   <th>Username</th>
                                   <th style="width:100px ;">Password</th>
                                   <th>Position</th>
                                   <th>Create Date</th>
                                   <th>Description</th>
                                   <th >Action</th>

                                   <?php 
               
                                   //$sql="SELECT * FROM user_account";
                                   $sql="SELECT * FROM user_account WHERE LOWER(username) LIKE LOWER('%$s%') ORDER BY id $sortBy LIMIT $limit OFFSET $offset";
                                   $queryCount="SELECT * FROM user_account WHERE LOWER(username) LIKE LOWER('%$s%')";
                                   $reCount=$conn->query($queryCount);
                                   $count=$reCount->rowCount();
                                   $countPage=ceil($count /$limit);


                                   $user=$conn->query($sql);
                                   if($user->rowCount()>0){
                                        while($u=$user->fetch()):
                                   ?>
                              </tr>
                              <tr>
                                   <td><?= $u['id']; ?></td>
                                   <td><?= $u['userTypes']; ?></td>
                                   <td><?= $u['username']; ?></td>
                                   <td ><?= $u['password']; ?></td>
                                   <td><?= $u['position']; ?></td>
                                   <td><?= $u['createDate']; ?></td>
                                   <td><?= $u['description']; ?></td>
                                   <td>
                                        <a onclick="return confirm('Do want to delete this record?')" href="./delete.user.php?id=<?php echo $u['id'];?>" class="bi bi-trash"></a>
                                        <?php echo " | " ?>
                                        <a  href="./update.user.php?id=<?php echo $u['id'];?>" class="bi bi-file-earmark-medical"></a>
                                   </td>

                                   <?php 
                                   
                                             endwhile;
                                        }else{
                                             echo "error!";
                                        }
                                   ?>
                              </tr>
                         </table>
                    </div>
                    
                
                        
                                


                    <!-- <div class="card-footer">
                        <div class="mb-1 mt-1">
                            <a href="">
                                 <label for="#new" class="text-info" style="font-size: 20px;" >Create New Admin</label> 
                            </a>
                            
                        </div>
                    </div> -->
                </div>
            </div>
            <nav aria-label="Page navigation example ">
               <ul class="pagination justify-content-center mt-2">
                    <li class="page-item <?php echo $pagination ==1 ? 'disabled':''; ?>">
                         <a class="page-link" href="./read.user.php?limit=<?php echo $limit?>&page=<?php echo $pagination-1?>">Previous</a>
                    </li>

                    <?php
                         for($i=1; $i<=$countPage;$i++){
                              ?>
                              <li class="page-item <?php echo $pagination ==$i ?'active':''; ?>"><a class="page-link"
                               href="./read.user.php?limit=<?php echo $limit?>&page=<?php echo $i;?>"><?php echo $i ?></a></li>
                              <?php
                         }
                    ?>
                    
                   
                    
                    <li class="page-item <?php echo $pagination >= $countPage ? 'disabled':''; ?>">
                         <a class="page-link" href="./read.user.php?limit=<?php echo $limit?>&page=<?php echo $pagination+1?>">Next</a>
                    </li>
               </ul>
          </nav>
        </div>

     </div>
     <script>
          const pageLilit=document.querySelector("#page_limit");
          pageLilit.addEventListener("change", function(e){
               const value=e.currentTarget.value;
               window.location.href=`read.user.php?limit=${value}&page=0`;
          });

          const searchBar=document.querySelector("#search_box");
          const searchValue=searchBar.querySelector("#search_input");
          searchBar.addEventListener("submit",function(e){
               e.preventDefault();
               window.location.href=`read.user.php?limit=<?= $limit; ?>&page=0&s=${searchValue.value}&sortBy=<?= $sort ?>`;

          });
          searchValue.addEventListener("input",function(e){
               const value=e.currentTarget.value;
               if(value.length===0) window.location.href=`read.user.php?limit=<?= $limit; ?>&page=0&s=`;
          });

          const sortBy=document.querySelector("#page_sort");
          sortBy.addEventListener("change",function(e){
               const value=e.currentTarget.value;
               window.location.href=`read.user.php?limit=<?= $limit; ?>&page=0&s=${searchValue.value}&sortBy=${value}`;
          });

     </script>
     </div>
     <script src="../Asset/home.js"></script>
</body>
</html>