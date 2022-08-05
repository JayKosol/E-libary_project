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
                        <a href="./read.admin.php" data-switcher data-tab="6">
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
                  <a class="navbar-brand" href="#">Admin</a>
            </div>
            </nav> 
     <div class="container">
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
                         <button id="new" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" >
                              Create New Admin
                         </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                         <div class="accordion-body">
                              <form action="./create.admin.php" method="post">
                                   <div class="row">
                                        <div class="col">
                                             <div class="input-group mb-2">
                                                  <label for="fname" class="input-group-text">First Name</label>
                                                  <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name">
                                             </div>
                                        </div>
                                        <div class="col">
                                             <div class="input-group mb-2">
                                                  <label for="lname" class="input-group-text">Last Name</label>
                                                  <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name">
                                             </div>
                                        </div>
                                   </div>
                                   <div class="row">
                                        <div class="col">
                                             <div class="input-group mb-2">
                                             <label class="input-group-text" for="inputGroupSelect01">Gender</label>
                                             <select class="form-select" name="gender" aria-label="Default select example">
                                                  <option style="display: none;">Select Gender</option>
                                                  <option value="Male">Male</option>
                                                  <option value="Female">Female</option>
                                                  <option value="Others">Others</option>
                                             </select>
                                             </div>
                                        </div>
                                        <div class="col">
                                        <div class="input-group mb-2">
                                                  <label for="dob" class="input-group-text">Date of Birth</label>
                                                  <input type="date" name="dob" id="dob" class="form-control" placeholder="Password">
                                             </div>
                                        </div>
                                   </div>
                                   
                                   <div class="input-group mb-2">
                                        <label for="address" class="input-group-text">Address</label>
                                        <input type="text" name="address" id="address" class="form-control" placeholder="Address">
                                   </div>
                                   <div class="input-group mb-2">
                                        <label for="phone" class="input-group-text">Phone</label>
                                        <input type="tel" name="phone" id="phone" class="form-control" placeholder="Phone">
                                   </div>
                                   <div class="input-group mb-2">
                                        <label for="email" class="input-group-text">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                   </div>
                                   <div class="input-group mb-2">
                                        <label for="joindate" class="input-group-text">Join Date</label>
                                        <input type="date" name="joindate" id="joindate" class="form-control" placeholder="Join Date">
                                   </div>
                                   <div class="input-group mb-2">
                                        <label for="position" class="input-group-text">Position</label>
                                        <input type="text" name="position" id="position" class="form-control" placeholder="Position">
                                   </div>
                                   <div class="input-group mb-2">
                                        <label for="salary" class="input-group-text">Salary</label>
                                        <input type="text" name="salary" id="salary" class="form-control" placeholder="Salary">
                                   </div>
                                   
                                   <div class="input-group mb-2">
                                        <label for="description" class="input-group-text">Description</label>
                                        <textarea name="description" id="description" class="form-control" 
                                        cols="30" rows="10" style="height:100px ;"></textarea>
                                   </div>
                                   <div class="mb-2">
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
                <div class="input-group mb-3">
                    <label for="search" class="input-group-text">Search</label>
                    <input type="text" name="search" id="" class="form-control">
                    
                    
                </div>
               <?php if (isset($_GET['alert'])) { ?>
                    <div class="alert alert-info" role="alert">
                    <?=htmlspecialchars($_GET['alert'])?>
                    </div>
               <?php } ?>
                <div class="card">
                    <div class="card-header">
                        <h2>Administration Information</h2>
                    </div>
                    
                <?php 
               
                    $sql="SELECT * FROM users";
                    $admin=$conn->query($sql);

                    if($admin->rowCount()>0){
                        echo "<table class='table table-striped table-hover'>";
                        echo "<thead>";
                        echo "<tr>";
                            echo "<th>ID</th>";
                            echo "<th>FirstName</th>";
                            echo "<th>LastName</th>";
                            echo "<th>Gender</th>";
                            echo "<th>DOB</th>";
                            echo "<th>Address</th>";
                            echo "<th>Phone</th>";
                            echo "<th>Email</th>";
                            echo "<th>Join Date</th>";
                            echo "<th>Position</th>";
                            echo "<th>Salary</th>";
                            echo "<th>Description</th>";
                            echo "<th>Photo</th>";
                            echo "<th>Action</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while($ad=$admin->fetch()){
                            echo "<tr>";
                                echo "<td>".$ad['id']."</td>";
                                echo "<td>".$ad['firstName']."</td>";
                                echo "<td>".$ad['lastName']."</td>";
                                echo "<td>".$ad['gender']."</td>";
                                echo "<td>".$ad['dob']."</td>";
                                echo "<td>".$ad['address']."</td>";
                                echo "<td>".$ad['phone']."</td>";
                                echo "<td>".$ad['email']."</td>";
                                echo "<td>".$ad['joinDate']."</td>";
                                echo "<td>".$ad['position']."</td>";
                                echo "<td>".$ad['salary']."</td>";
                                echo "<td>".$ad['description']."</td>";
                                echo "<td>".$ad['photo']."</td>";
                                
                                echo "<td>";
                                   // if($ad['status']==0){
                                   //      echo "<a href='delete.user.php?id=".$ad['id']."&status=1'>Enable</a>";
                                   // }else{
                                   //      echo "<a href='delete.user.php?id=".$ad['id']."&status=0' class=''>Disable</a>";
                                   // }
                                    echo "<a href='delete.admin.php?id=".$ad['id']."'' class='bi bi-trash'></a>";
                                   //  echo nl2br("\t");
                                   //  echo "<a href='' class='bi bi-card-text'></a>";
                                    echo nl2br("\t| ");
                                    echo "<a href='update.admin.php?id=".$ad['id']."'' class='bi bi-file-earmark-medical'></a>";
                                echo "</td>";
                                
                            echo "</tr>";
                        }
                        echo "</tbody>";

                        echo "</table>";
                    }else{
                        echo "Datas not found!";
                    }

                ?>
                    <div class="card-footer">
                        <div class="mb-1 mt-1">
                            <a href="">
                                <!-- <label for="#new" class="text-info" style="font-size: 20px;" >Create New Admin</label> -->
                            </a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
     </div>
     <script src="../Asset/home.js"></script>
</body>
</html>

