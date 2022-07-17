<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Book page</title>
     <?php include_once './../Asset/boostrap.php';
               include_once './../Users/function.php';
               include_once './../Asset/dbconnection.php' ?>
</head>
<body>
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
                         <button id="new" class="accordion-button collapsed text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" >
                              Create New Author
                         </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                         <div class="accordion-body">
                              <form action="./create.book.php" method="post">
                                   <div class="row">
                                        <div class="col">
                                             <div class="input-group mb-2">
                                                  
                                                  <label for="booktitle" class="input-group-text">Book's Title</label>
                                                  <input type="text" name="booktitle" id="booktitle" class="form-control" placeholder="Title ...">
                                             </div>
                                        </div>
                                        <div class="col">
                                             <div class="input-group mb-2">
                                                  <label for="isbn" class="input-group-text">Book's ISBN</label>
                                                  <input type="text" name="isbn" id="isbn" class="form-control" placeholder="ISBN ...">
                                             </div>
                                        </div>
                                   </div>
                                   <div class="row">
                                        <div class="col">
                                             <div class="input-group mb-2">
                                                  <label for="author" class="input-group-text">Authors</label>
                                                  <select name="author" class="form-control" id="author">
                                                       <?php echo fill_author($conn); ?>
                                                  </select>
                                             </div>
                                        </div>
                                        <div class="col">
                                             <div class="input-group mb-2">
                                                  <label for="category" class="input-group-text">Category</label>
                                                  <select name="category" class="form-control" id="category">
                                                       <?php echo fill_category($conn); ?>
                                                  </select>
                                             </div>
                                        </div>
                                   </div>
                                  
                                   <div class="input-group mb-2">
                                        <label for="language" class="input-group-text">Book's Language</label>
                                        <select name="language" class="form-control" id="language">
                                             <?php echo languege_list(); ?>
                                        </select>
                                   </div>
                                   <div class="input-group mb-2">
                                        <label for="year" class="input-group-text">Release Year</label>
                                        <input type="number" name="year" id="year" class="form-control" placeholder="Year ...">
                                   </div>
                                   
                                   <div class="input-group mb-2">
                                        <label for="edition" class="input-group-text">Book's Edition</label>
                                        <select name="edition" class="form-control" id="edition">
                                             <?php echo edition_list(); ?>
                                        </select>
                                   </div>
                                   <div class="input-group mb-2">
                                        <label for="photo" class="input-group-text">Book Image</label>
                                        <input type="file" name="photo" id="photo" class="form-control" placeholder="Upload image ...">
                                   </div>
                                   <div class="input-group mb-2">
                                        <label for="desc" class="input-group-text">Description</label>
                                        <textarea name="desc" style="height: 70px;" class="form-control" id="desc" cols="30" rows="10"></textarea>
                                   </div>
                                   <div class="row">
                                        <div class="col">
                                             <div class="input-group mb-2">
                                                  <label for="createdate" class="input-group-text">Create Date</label>
                                                  <input type="date" name="createdate" id="createdate" class="form-control" placeholder="Date ...">
                                             </div>
                                        </div>
                                        <div class="col">
                                             <div class="input-group mb-3">
                                                  <label for="createby" class="input-group-text">Create By</label>
                                                  <select name="createby" class="form-control" id="createby">
                                                       <?php echo fill_user_acc($conn); ?>
                                                  </select>
                                             </div>
                                        </div>
                                   </div>
                                   
                                   
                                   <div class="mb-4">
                                        <button type="submit" class="btn btn-primary">Create Now</button>
                                   </div>
                              </form>
                         </div>
                    </div>
               </div>
          </div>
          <!-- Show books -->
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
                        <h3>Books's Information</h3>
                    </div>
                    <div class="">
                         <table class="table table-hover table-striped table-bordered">
                              <tr>
                              
                                   <th>ID</th>
                                   <th>Title</th>
                                   <th>ISBN</th>
                                   <th>Author</th>
                                   <th>Category</th>
                                   <th>Language</th>
                                   <th>Release</th>
                                   <th>Edition</th>
                                   <th>Image</th>
                                   <th>CreateDate</th>
                                   <th>CreateBy</th>
                                   <th style="width: 100px;">Action</th>
                                   <?php
                                        $sql="SELECT * FROM books";
                                        $stm=$conn->query($sql);
                                        if($stm->rowCount()>0){
                                             while($book=$stm->fetch()):
                                             
                                   ?>
                              </tr>
                              <tr>
                                   
                                             <td><?php echo $book['bookId']; ?></td>
                                             <td><?php echo $book['bookTitle']; ?></td>
                                             <td><?php echo $book['isbn']; ?></td>
                                             <td><?php echo $book['authorsId']; ?></td>
                                             <td><?php echo $book['categoryId']; ?></td>
                                             <td><?php echo $book['languages']; ?></td>
                                             <td><?php echo $book['releaseYear']; ?></td>
                                             <td><?php echo $book['bookEdition']; ?></td>
                                             <td style="width: 55px;height:70px;"><?php echo $book['photos']; ?></td>
                                             <td><?php echo $book['createDate']; ?></td>
                                             <td><?php echo $book['createBy']; ?></td>
                                             <td  >
                                                  <a onclick="return confirm('Do want to delete this record?')" href="./delete.book.php?id=<?php echo $book['bookId'];?>" class="bi bi-trash"></a>
                                                  <?php echo " | " ?>
                                                  <a  href="./update.book.php?id=<?php echo $book['bookId'];?>" class="bi bi-file-earmark-medical"></a>
                                                  <?php echo " | " ?>
                                                  <a  href="./detail.book.php?id=<?php echo $book['bookId'];?>" class="bi bi-card-text"></a>
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
        </div>
     </div>
</body>
</html>