
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
                              <form action="./users/create_user.php" method="post">
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
          <form action="" method="post">
          <div class="row">
            <div class="col-md-12">
               
                    <div class="input-group mb-3">
                         <label for="search" class="input-group-text">Search</label>
                         <input type="text" name="search" id="" class="form-control">
                         <input type="submit" value="Submit" class="btn btn-primary">
                         
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
                    
                <?php 
               
                    //$sql="SELECT * FROM user_account";
                    $sql="SELECT * FROM user_account";
                    $user=$conn->query($sql);



                    if($user->rowCount()>0){
                        echo "<table class='table table-striped table-hover'>";
                        echo "<thead>";
                        echo "<tr>";
                            echo "<th>ID</th>";
                            echo "<th>User Types</th>";
                            echo "<th>Username</th>";
                            //echo "<th>Password</th>";
                            echo "<th>Position</th>";
                            echo "<th>Create Date</th>";
                            echo "<th>Description</th>";
                            //echo "<th>Photo</th>";
                            echo "<th>Action</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while($u=$user->fetch()){
                            echo "<tr>";
                                echo "<td>".$u['id']."</td>";
                                echo "<td>".$u['userTypes']."</td>";
                                echo "<td>".$u['username']."</td>";
                                //echo "<td>".$u['password']."</td>";
                                echo "<td>".$u['position']."</td>";
                                echo "<td>".$u['createDate']."</td>";
                                echo "<td>".$u['description']."</td>";
                                //echo "<td>".$u['photo']."</td>";
                                
                                echo "<td>";
                                    echo "<a href='delete.user.php?id=".$u['id']."'' class='bi bi-trash'></a>";
                                    // echo nl2br("\t");
                                    // echo "<a href='' class='bi bi-card-text'></a>";
                                    echo nl2br("\t| ");
                                    echo "<a href='update.user.php?id=".$u['id']."'' class='bi bi-file-earmark-medical'></a>";
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
        </form>
     </div>