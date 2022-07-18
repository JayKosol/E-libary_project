
<div class="container">
          <?php if (isset($_GET['error'])) { ?>
               <div class="alert alert-danger" role="alert">
               <?=htmlspecialchars($_GET['error'])?>
               </div>
          <?php } ?>
          
          <!-- pop menu create new users -->
          <div class="accordion accordion-flush" id="accordionFlushExample">
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
                        <h3>Authors's Information</h3>
                    </div>
                    
                <?php 
               
                    $sql="SELECT * FROM authors";
                    $auth=$conn->query($sql);

                    if($auth->rowCount()>0){
                        echo "<table class='table table-striped table-hover'>";
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
                    <div class="card-footer">
                        <div class="mb-1 mt-1">
                            <a href="">
                                <!-- <label for="#new" class="text-info" style="font-szie: 20px;" >Create New Admin</label> -->
                            </a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>