<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php require_once "./Asset/boostrap.php";
           include_once "./Asset/dbconnection.php";
           include "./Asset/font.php";
     ?>
     <link rel="stylesheet" href="./Asset/css/style.css">
     <title>Home Page</title>
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
      <ul class="nav-list">
                  <li>
                        <a href="">
                              <i class='bx bx-search'></i>
                              <input type="text" placeholder="Search">
                        </a>
                        <!-- <i class='tool' ></i> -->
                  </li>
                  <li>
                        <a href="">
                              <i class='bx bxs-dashboard' ></i>
                              Dashboard
                        </a>
                        <!-- <i class='tool' ></i> -->
                  </li>
                  <li>
                        <a href="">
                              <i class='bx bx-category' ></i>
                              Category
                        </a>
                        <!-- <i class='tool' ></i> -->
                  </li>
                  <li>
                        <a href="">
                              <i class='bx bxs-user-detail' ></i>
                              Author
                        </a>
                        <!-- <i class='tool' ></i> -->
                  </li>
                  <li>
                        <a href="">
                              <i class='bx bxs-book' ></i>
                              Book
                        </a>
                        <!-- <i class='tool' ></i> -->
                  </li>
                  <li>
                        <a href="">
                              <i class='bx bxs-key' ></i>
                              Issue
                        </a>
                        <!-- <i class='tool' ></i> -->
                  </li>
            </ul>

            <!-- @profile -->
            <div class="profile-content">
                  <div class="profile">
                        <div class="profile-detail">

                        </div>
                  </div>
            </div>
     </div>
</body>
</html>