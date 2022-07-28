<?php 
      include_once './alloweAccess.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php include_once "./Asset/boostrap.php";
           include_once "./Asset/dbconnection.php";
           include_once "./Asset/font.php";
           include_once "./Users/function.php";
     ?>
     <link rel="stylesheet" href="./Asset/css/style.css">
     <title>Dashboard</title>
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
                        <a href="./home.php" data-switcher data-tab="1">
                              <i class='bx bxs-dashboard i' ></i>
                              <span class="link_name">Dashboard</span>
                        </a>
                        <!-- <i class='tool' ></i> -->
                  </li>
                  <li  class="tab">
                        <a href="./category/read.cate.php" data-switcher data-tab="2">
                              <i class='bx bx-category i' ></i>
                              <span class="link_name">Category</span>
                        </a>
                        <!-- <i class='tool' ></i> -->
                  </li>
                  <li  class="tab">
                        <a href="./author/read.author.php" data-switcher data-tab="3">
                              <i class='bx bxs-user-detail i' ></i>
                              <span class="link_name">Author</span>
                        </a>
                        <!-- <i class='tool' ></i> -->
                  </li>
                  <li  class="tab">
                        <a href="./book/read.book.php" data-switcher data-tab="4">
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
                        <a href="./Users/read.admin.php" data-switcher data-tab="6">
                              <i class='bi bi-people-fill' ></i>
                              <span class="link_name">Users</span>
                        </a>
                        <!-- <i class='tool' ></i> -->
                  </li>
            </ul>

            
     </div>
     

     <div id="home_content" class="pages" style="background-color: #DFFFFF;">
            <nav class="navbar navbar-expand-lg bg-light" >
            <div class="container-fluid" >
                  <a class="navbar-brand" href="#">Dashboard</a>
            </div>
            </nav>   

            <div class="block-content row mt-3">
                  <div class="card-block col-lg-6 col-md-8 col-sm-12  ">
                        <div class="my-card rounded shadow">
                              <div class="card-member">
                                    <div class="logo p-1"><img src="https://via.placeholder.com/32x32" alt=""></div>
                                    <div class="block-text">dfhjskafjdslajfklsf</div>
                              </div>
                              <div class="card-member p-1">Footer</div>
                        </div>
                  </div>
                  <div class="card-block col-lg-6 col-md-8 col-sm-12 ">
                        <div class="my-card rounded shadow">
                              <div class="card-member">
                                    <div class="logo p-1"><img src="https://via.placeholder.com/32x32" alt=""></div>
                                    <div class="block-text">dfhjskafjdslajfklsf</div>
                              </div>
                              <div class="card-member p-1">Footer</div>
                        </div>
                  </div>
                  <div class="card-block col-lg-6 col-md-8 col-sm-12 ">
                        <div class="my-card rounded shadow">
                              <div class="card-member">
                                    <div class="logo p-1"><img src="https://via.placeholder.com/32x32" alt=""></div>
                                    <div class="block-text">dfhjskafjdslajfklsf</div>
                              </div>
                              <div class="card-member p-1">Footer</div>
                        </div>
                  </div>
            </div>

            
     </div>
     <script src="./Asset/home.js"></script>
</body>
</html>