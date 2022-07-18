<?php 
     include_once './../Asset/boostrap.php';
     include_once './../Asset/dbconnection.php';
     include_once './../Users/function.php';
     if(isset($_GET['id']) && !empty($_GET['id'])){
          $id=$_GET['id'];
          $sql="SELECT * FROM books WHERE bookId=:id";
          $stm=$conn->prepare($sql);
          $stm->bindParam("id",$p_id);
          $p_id=$id;
          if($stm->execute()){
               if($stm->rowCount()==1){
                    $re=$stm->fetch();
                    $btitle=$re['bookTitle'];
                    $isbn=$re['isbn'];
                    $author=$re['authorsId'];
                    $category=$re['categoryId'];
                    $language=$re['languages'];
                    $year=$re['releaseYear'];
                    $edition=$re['bookEdition']; 
                    $photo =$re['photos'];
               
                    $desc=$re['desc'];
                    $create_date=$re['createDate'];
                    $create_by=$re['createBy'];
                    $id=$re['bookId'];
               }else{
                    echo "Not found!";
               }
          }else{
               echo "Error";
          }
          

     }

?>
<div class="container">
     <form action="./create.book.php" method="post">
          <div class="row">
               <div class="col">
                    <div class="input-group mb-2">
                         <input type="hidden" name="id" value="<?php echo $id; ?>">
                         <label for="booktitle" class="input-group-text">Book's Title</label>
                         <input type="text" value="<?php echo $btitle; ?>" name="booktitle" id="booktitle" class="form-control" placeholder="Title ...">
                    </div>
               </div>
               <div class="col">
                    <div class="input-group mb-2">
                         <label for="isbn" class="input-group-text">Book's ISBN</label>
                         <input type="text" value="<?php echo $isbn; ?>" name="isbn" id="isbn" class="form-control" placeholder="ISBN ...">
                    </div>
               </div>
          </div>
          <div class="row">
               <div class="col">
                    <div class="input-group mb-2">
                         <label for="author" class="input-group-text">Authors</label>
                         <select name="author" class="form-control" id="author">
                              <option value="<?php echo $author; ?>"><?php echo $author; ?></option>
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
               <button onclick="return confirm('Do you want to update this record!')" type="submit" class="btn btn-primary">Create Now</button>
               <a href="./read.book.php" style="float:right;" class="btn btn-info" >Back</a>
          </div>
     </form>
</div>