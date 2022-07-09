<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php require_once "./Asset/boostrap.php";
           include_once "./Asset/dbconnection.php";
     ?>
     <link rel="stylesheet" href="./Asset/css/style.css">
     <title>Home Page</title>
</head>
<body class="skin-base animate">
      <!-- @navigationbar -->
      <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                  <!-- Navbar content -->
                  <div class="left">
                        <button class="bg-dark">
                              <img src="./img/menu.png">
                        </button>
                        <a href="" >E-Libary</a>
                  </div>

                  <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
            </div>
      </nav>
       <!-- @sidebar -->
       <div class="sidebar">
            <div class="sidebar-header">
                  <nav class="nav-sidebar">
                        <a href="" class="nav-link active"><i data-feather="package"></i><span>Dashboard</span></a>
                        <a href="" class="nav-link"><i data-feather="monitor"></i><span>Site Analytics</span></a>
                        <a href="" class="nav-link"><i data-feather="shopping-bag"></i><span>Sales Monitoring</span></a>
                        <a href="" class="nav-link"><i data-feather="file-text"></i><span>Documents</span></a>
                        <a href="" class="nav-link"><i data-feather="calendar"></i><span>Calendar</span></a>
                        <a href="" class="nav-link"><i data-feather="briefcase"></i><span>Customers</span></a>
                  </nav>                    
            </div>
      </div>
      <!-- @endsidebar -->
</body>
</html>