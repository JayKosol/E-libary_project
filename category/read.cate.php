

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Category page</title>
     <?php 
          include_once './../Asset/boostrap.php';
          require_once './../Asset/dbconnection.php';
          include_once './../Users/function.php';
     ?>
</head>
<body>

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
     $offset= ceil($pagination*$limit)-$limit;
?>
     <div class="container mt-3">
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
                              <form action="./create.cate.php" method="post">
                                   <div class="row">
                                        <div class="col">
                                             <div class="input-group mb-2">
                                                  
                                                  <label for="cateName" class="input-group-text">Category's name</label>
                                                  <input type="text" name="cateName" id="cateName" class="form-control" placeholder="Category's name">
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
                                        <label for="createDate" class="input-group-text">createDate</label>
                                        <input type="date" name="createDate" id="createDate" class="form-control" placeholder="">
                                   </div>
                                   <div class="input-group mb-2">
                                        <label for="createBy" class="input-group-text">Create By</label>
                                        <select name="createBy" class="form-control" id="createBy">
                                             <?php echo fill_user_acc($conn); ?>
                                        </select>
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
          <div class="row g-3">
            <div class="col-md-12">
                <div class=" mt-3 mb-2">
                    <div class="row g-6">
                         <div class="col-md-8">
                              <div class="input-group">
                                   <label for="search" class="input-group-text">Search</label>
                                   <input type="text" name="search" id="" class="form-control">
                              </div>
                              
                         </div>
                         <div class="col-md-2">
                              <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
                         </div>
                         <div class="col" >
                              <div class="input-group">
                                   <label for="search" class="input-group-text">Page/</label>
                                   <select class="form-select" aria-label="Default select example">
                                   
                                        <option value="1">5</option>
                                        <option value="2">15</option>
                                        <option value="3">25</option>
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
                        <h3>Category's Information</h3>
                    </div>
                    <div class="">
                         <table class="table table-hover table-striped table-bordered">
                              <tr>
                              
                                   <th>ID</th>
                                   <th>Category Name</th>
                                   <th>Create Date</th>
                                   <th>Create By</th>
                                   <th style="width: 440px;">Description</th>
                                   <th>Action</th>
                                   <?php
                                        $sql="SELECT * FROM category LIMIT $limit OFFSET $offset";
                                        $queryCount="SELECT * FROM category";
                                        $reCount=$conn->query($queryCount);
                                        $count=$reCount->rowCount();
                                        $countPage=ceil($count /$limit);

                                        //echo $count;

                                        $stm=$conn->query($sql);
                                        if($stm->rowCount()>0){
                                             while($cate=$stm->fetch()):
                                             
                                   ?>
                              </tr>
                              <tr>
                                   
                                             <td><?php echo $cate['categoryId']; ?></td>
                                             <td><?php echo $cate['categoryName']; ?></td>
                                             <td><?php echo $cate['createDate']; ?></td>
                                             <td><?php echo $cate['createBy']; ?></td>
                                             <td><?php echo $cate['description']; ?></td>
                                             <td >
                                                  <a onclick="return confirm('Do want to delete this record?')" href="./delete.cate.php?id=<?php echo $cate['categoryId'];?>" class="bi bi-trash"></a>
                                                  <?php echo " | " ?>
                                                  <a  href="./update.cate.php?id=<?php echo $cate['categoryId'];?>" class="bi bi-file-earmark-medical"></a>
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
            </div>
          <nav aria-label="Page navigation example ">
               <ul class="pagination justify-content-center mt-2">
               <li class="page-item <?php echo $pagination ==1 ? 'disabled':''; ?>">
                         <a class="page-link" href="./read.cate.php?limit=<?php echo $limit?>&page=<?php echo $pagination-1?>">Previous</a>
                    </li>

                    <?php
                         for($i=1; $i<=$countPage;$i++){
                              ?>
                              <li class="page-item <?php echo $pagination ==$i ?'active':''; ?>"><a class="page-link"
                               href="./read.cate.php?limit=<?php echo $limit?>&page=<?php echo $i;?>"><?php echo $i ?></a></li>
                              <?php
                         }
                    ?>
                    
                   
                    
                    <li class="page-item <?php echo $pagination >= $countPage ? 'disabled':''; ?>">
                         <a class="page-link" href="./read.cate.php?limit=<?php echo $limit?>&page=<?php echo $pagination+1?>">Next</a>
                    </li>
               </ul>
          </nav>
        </div>
        
     </div>
</body>
</html>