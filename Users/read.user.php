
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php require_once "./../Asset/dbconnection.php";
           include_once "./../Asset/boostrap.php";
     ?>
     <title>Read User</title>
     <style>
          .card{
               font-size: 15px;
          }
     </style>
</head>
<body>
     <div class="container">
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
                              Create New User
                         </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                         <div class="accordion-body">
                              <form action="./create_user.php" method="post">
                                   <div class="mb-2">
                                        <label for="usertype" class="form-label">User Types</label>
                                        <select class="form-select" name="usertype" aria-label="Default select example">
                                             <option selected style="display: none;">Please Select User Types</option>
                                             <option value="Admin">Admin</option>
                                             <option value="Librarain">Librarain</option>
                                        </select>
                                   </div>
                                   <div class="mb-2">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                                   </div>
                                   <div class="mb-2">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                   </div>
                                   <div class="mb-2">
                                        <label for="position" class="form-label">Position</label>
                                        <input type="text" name="position" id="position" class="form-control" placeholder="Position">
                                   </div>
                                   <div class="mb-2">
                                        <label for="createdate" class="form-label">Create Date</label>
                                        <input type="date" name="createdate" id="createdate" class="form-control" placeholder="">
                                   </div>
                                   <div class="mb-2">
                                        <label for="description" class="form-label">Description</label>
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
               
                <div class="card">
                    <div class="card-header">
                        <h2>Users</h2>
                    </div>
                    
                <?php 
               
                    $sql="SELECT * FROM users";
                    $user=$conn->query($sql);

                    if($user->rowCount()>0){
                        echo "<table class='table table-striped table-hover'>";
                        echo "<thead>";
                        echo "<tr>";
                            echo "<th>ID</th>";
                            echo "<th>User Types</th>";
                            echo "<th>Password</th>";
                            echo "<th>Position</th>";
                            echo "<th>Create Date</th>";
                            echo "<th>Description</th>";
                            echo "<th>Action</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while($u=$user->fetch()){
                            echo "<tr>";
                                echo "<td>".$u['userId']."</td>";
                                echo "<td>".$u['userTypes']."</td>";
                                echo "<td>".$u['password']."</td>";
                                echo "<td>".$u['position']."</td>";
                                echo "<td>".$u['createDate']."</td>";
                                echo "<td>".$u['description']."</td>";
                                
                                echo "<td>";
                                    echo "<a href='' class='bi bi-trash'></a>";
                                    // echo nl2br("\t");
                                    // echo "<a href='' class='bi bi-card-text'></a>";
                                    echo nl2br("\t| ");
                                    echo "<a href='' class='bi bi-file-earmark-medical'></a>";
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
                                <label for="#new" class="text-info" style="font-size: 20px;" >Create New Admin</label>
                            </a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
</body>
</html>