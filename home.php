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
                        <a href="./Users/read.user.php" data-switcher data-tab="6">
                              <i class='bi bi-people-fill' ></i>
                              <span class="link_name">Users</span>
                        </a>
                        <!-- <i class='tool' ></i> -->
                  </li>
            </ul>

            <?php include_once "./profile.php" ?>

            
     </div>
     
     <!-- style="background-color: #DFFFFF;" -->
     <div id="home_content" class="pages" >
            <nav class="navbar navbar-expand-lg bg-light" >
            <div class="container-fluid" >
                  <a class="navbar-brand" href="#">Dashboard</a>
            </div>
            </nav>   

            <div class="container-fluid">
                  <div class="block-content row mt-3">
                  <!-- @card-box -->
                        <div class="col-xl-3 col-md-6 mb-4">
                              <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                          <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                            Book Capacity</div>
                                                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo total_book($conn) ?></div>
                                                </div>
                                                <div class="col-auto">
                                                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                                </div>
                                          </div>
                                    </div>
                                    </div>
                              </div>
                  <!-- @card-box -->
                        <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                          <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                      <div class="col mr-2">
                                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                                  Book Category</div>
                                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo total_category($conn) ?></div>
                                                      </div>
                                                      <div class="col-auto">
                                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                        </div>
                  <!-- @card-box -->
                        <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                          <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                      <div class="col mr-2">
                                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                                  Reader</div>
                                                            <div class="h5 mb-0 font-weight-bold text-gray-800">100,00</div>
                                                      </div>
                                                      <div class="col-auto">
                                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                        </div>
                  <!-- @card-box -->
                        <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                          <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                      <div class="col mr-2">
                                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                                  Author</div>
                                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo total_author($conn) ?></div>
                                                      </div>
                                                      <div class="col-auto">
                                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                        </div>

                  </div>
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
                  <!-- @table-bookcontent -->
                  <div class="table-book">

                        <h3>Book</h3>
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
                              
                              <div class="input-group" style="width: 170px;float:right;">
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
                        <table class="table table-bordered bg-light shadow">

                                    <tr class="table-dark">
                                          <th scope="col">ID</th>
                                          <th scope="col">Book Title</th>
                                          <th scope="col">Category</th>
                                          <th scope="col">Authors</th>
                                          <th scope="col">Language</th>
                                          <th scope="col">Image</th>
                                          <?php
                                                $sql="SELECT b.*,a.authorName,c.categoryName FROM books b INNER JOIN authors a ON b.authorsId=a.authorId INNER JOIN category c ON b.categoryId=c.categoryId  
                                                WHERE LOWER(bookTitle) LIKE LOWER('%$s%') ORDER BY bookId $sortBy LIMIT $limit OFFSET $offset";
                                                $queryCount="SELECT * FROM books WHERE LOWER(bookTitle) LIKE LOWER('%$s%')";
                                                $reCount=$conn->query($queryCount);
                                                $count=$reCount->rowCount();
                                                $countPage=ceil($count /$limit);

                                                $stm=$conn->query($sql);
                                                if($stm->rowCount()>0){
                                                      while($book=$stm->fetch()):    
                                          ?>
                                    </tr>
                              <tr>

                                    <td><?= $book['bookId']  ?></td>
                                    <td><?= $book['bookTitle']  ?></td>
                                    <td><?= $book['categoryName']  ?></td>
                                    <td><?= $book['authorName']  ?></td>
                                    <td><?= $book['languages']  ?></td>
                                    <td>
                                          <img style="width: 55px;height:55px;" src="<?php echo $book['photos']; ?>"/>
                                          
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
                        <nav aria-label="Page navigation example ">
                    <ul class="pagination justify-content-center mt-2">
                         <li class="page-item <?php echo $pagination ==1 ? 'disabled':''; ?>">
                              <a class="page-link" href="./home.php?limit=<?php echo $limit?>&page=<?php echo $pagination-1?>">Previous</a>
                         </li>

                         <?php
                              for($i=1; $i<=$countPage;$i++){
                                   ?>
                                   <li class="page-item <?php echo $pagination ==$i ?'active':''; ?>"><a class="page-link"
                                   href="./home.php?limit=<?php echo $limit?>&page=<?php echo $i;?>"><?php echo $i ?></a></li>
                                   <?php
                              }
                         ?>
                         
                    
                         
                         <li class="page-item <?php echo $pagination >= $countPage ? 'disabled':''; ?>">
                              <a class="page-link" href="./home.php?limit=<?php echo $limit?>&page=<?php echo $pagination+1?>">Next</a>
                         </li>
                    </ul>
               </nav>
                  </div>
                  <!-- @table-Author -->
                  <!-- <div class="table-author">
                        <h3>Author</h3>
                        <table class="table border bg-light shadow">
                              <thead class="table-dark">
                                    <tr>
                                          <th scope="col">ID</th>
                                          <th scope="col">Author Name</th>
                                          <th scope="col">Category</th>
                                          <th scope="col">Authors</th>
                                    </tr>
                              </thead>
                              <tbody>
                              <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                              </tr>
                              <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                              </tr>
                              <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                              </tr>
                              <tr>
                                    <th scope="row">4</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                              </tr>
                              <tr>
                                    <th scope="row">5</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                              </tr>
                              <tr>
                                    <th scope="row">6</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                              </tr>
                              </tbody>
                        </table>
                  </div> -->

            </div>

            
     </div>
     <script src="./Asset/home.js"></script>
     <script>
          const pageLilit=document.querySelector("#page_limit");
          pageLilit.addEventListener("change", function(e){
               const value=e.currentTarget.value;
               window.location.href=`home.php?limit=${value}&page=0`;
          });

          const searchBar=document.querySelector("#search_box");
          const searchValue=searchBar.querySelector("#search_input");
          searchBar.addEventListener("submit",function(e){
               e.preventDefault();
               window.location.href=`home.php?limit=<?= $limit; ?>&page=0&s=${searchValue.value}&sortBy=<?= $sort ?>`;

          });
          searchValue.addEventListener("input",function(e){
               const value=e.currentTarget.value;
               if(value.length===0) window.location.href=`home.php?limit=<?= $limit; ?>&page=0&s=`;
          });

          const sortBy=document.querySelector("#page_sort");
          sortBy.addEventListener("change",function(e){
               const value=e.currentTarget.value;
               window.location.href=`home.php?limit=<?= $limit; ?>&page=0&s=${searchValue.value}&sortBy=${value}`;
          });

     </script>
</body>
</html>