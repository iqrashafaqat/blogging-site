<!-- db connection -->
<?php require_once('inc/db.php');?>

<!-- top section -->
<?php require_once('inc/top.php');?>
  </head>

<!-- delete category from database -->
<?php
// if(isset($_POST['delete']))
// {
//   $category_id= $_POST['delete'];
//   $query= "DELETE FROM `categories` WHERE `categories`.`id` = $category_id";
//   $query_run = mysqli_query($conn,$query);
//   if ($query_run) { 
   
//     echo "category deleted successfully";
//     header('Location:categories.php');
//   } else {
//     echo "category not deleted";
//     header('Location:categories.php');
//   }
  
// }

?>
  <body>
    <div id="wrapper">
     <!-- navbar section -->

         <?php require_once('inc/navbar.php');?>
       

      <div class="container-fluid body-section">
        <div class="row">
          <div class="col-md-3">

          <!-- sidebar section -->
            <?php require_once('inc/sidebar.php')?>
          </div>

          <div class="col-md-9">
            <h1>
              <i class="fa fa-folder-open" aria-hidden="true"></i>Posts
              <small>Add Posts</small>
            </h1>
            <hr />
            <div class="scp-breadcrumb">
              <ol class="breadcrumb p-2">
                <li>
                  <a href="index.html" class="me-2"
                    ><i class="fa fa-tachometer" aria-hidden="true"></i>
                    Dashboard</a
                  >
                </li>
                <li class="active me-2">
                  <i class="fa fa-folder-open" aria-hidden="true"></i>
                  Posts
                </li>
                <!-- <li><a href="#" class="me-2">Products</a></li> -->
              </ol>
            </div>


                  <!------ fetch category data ------->
             <?php
            //  if(isset($_POST['submit'])){
            //   $cate_name = $_POST['category'];
            //   if (empty($cate_name)) {
            //     $error_msg = "All (*) fields are Required";
            //   } else {
            //    $cate_query = "INSERT INTO `categories` (`id`, `category`) VALUES (NULL, '$cate_name')";
            //   if (mysqli_query($conn, $cate_query)) {
            //      $msg = "Category Submited";
            //      $cate_name = ""; 
            //     } else {
            //       $error_msg = "Category Has not be submited";
            //     }
            //   }
            //  }
             ?>



            <div class="row justify-content-center">
              <div class="col-md-12">
              
             
              <?php
										if (isset($_POST['submit'])){
                    
                      $filename=$_FILES['author_image']['name'];
                      $filetmpname=$_FILES['author_image']['tmp_name'];
                      $folder ='images/';
                      move_uploaded_file($filetmpname, $folder.$filename);
											
                      $image_filename=$_FILES['image']['name'];
                      $image_filetmpname=$_FILES['image']['tmp_name'];
                      $image_folder ='images/';
                      move_uploaded_file($image_filetmpname, $image_folder.$image_filename);

											$date = date('Y-m-d',strtotime($_POST['date']));
											$title = $_POST['title'];
											$author = $_POST['author'];
											// $author_image = $_POST['author_image'];
											// $image = $_POST['image'];
                      // $filename=$_POST['author_image'];
											$categories = $_POST['categories'];
											$post_data = $_POST['post_data'];
											$status = $_POST['status'];	
											
										$query = mysqli_query($conn,"select * from posts where title = '$title' ")or die(mysqli_error());
										$count = mysqli_num_rows($query);

										if ($count > 0){ ?>
										<script>
										alert('Data Already Exist');
										</script>
										<?php
										}else{
                      mysqli_query($conn,"INSERT INTO `posts`( `date`,`title`, `author`, `author_image`, `image`, `categories`, `post_data`, `status`) 
                      values(' $date','$title','$author','$filename','$image_filename','$categories','$post_data','$status')")or die(mysqli_error());
										
                      // mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_username','Add Subject $course_name')")or die(mysqli_error());
                      
										?>
										<script>
										 window.location = "index.php";
										</script>
										<?php
										}
										}
										
										?>
									<div class="container justify-content-center align-items card">
                <div class="row">
                  <div class="col-md-12">
              <form class="form-horizontal" method="post"  enctype="multipart/form-data">

                    <!-- <div class="control-group">
                    <div class="controls">
                    <input name="image" class="input-file uniform_on" id="fileInput" type="file" required>
                    </div>
                    </div> -->
                    <div class="row">
                        <div class="col-md-6">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail"><b>Date</b></label>
                        <div class="controls">
                        <input class="input-field mt-2" type="text" name="date" id="inputEmail" placeholder="Date" value="<?php  if(isset ($date)){echo $date;}?> ">
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail"><b>Title</b></label>
                        <div class="controls">
                        <input class="input-field2 mt-2" type="text" name="title" id="inputEmail" value="<?php  if(isset ($title)){echo $title;}?>" placeholder="Title">
                        </div>
                    </div>
                    </div>
                    </div>
                    <div class="row mt-3">
                      <div class="col-md-12">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail"><b>Author</b></label>
                        <div class="controls">
                        <input  class="input-field1 mt-2" type="text" name="author" id="inputEmail" value="<?php  if(isset ($author)){echo $author;}?>" placeholder="Title">
                        </div>
                    </div>
                    </div>
                  </div>
                    <!-- author image -->
                    <div class="row mt-3">
                       <div class="col-md-6">
                          <div class="control-group">
                          <label class="control-label" for="inputPassword"><b>Author_Image</b></label>
                          <div class="controls">   
                          <input class="input-field mt-2" type="file" name="author_image" class="input-file uniform_on" id="fileInput" value="<?php  if(isset ($filename)){echo $filenamee;}?>" required>
                          </div>
                          </div>
                        </div>
                        <!-- post image -->
                        <div class="col-md-6">
                          <div class="control-group">
                          <label class="control-label" for="inputPassword"><b>Post_Image</b></label>
                          <div class="controls">
                          <input class="input-field mt-2" type="file" name="image" class="input-file uniform_on" id="fileInput" value="<?php  if(isset ($image_filename)){echo $image_filename;}?>" required>
                          </div>
                          </div>
                        </div>
                    </div>
                  
                    <!-- <div class="control-group">
                        <label class="control-label" for="inputPassword"><b>Tags</b></label>
                        <div class="controls">
                        <input type="text" class="span8" name="tags" id="inputPassword" placeholder="tags" required>
                        </div>
                    </div> -->
                    <div class="row mt-3">
                      <div class="col-md-12">
                        <div class="control-group">
                            <label class="control-label" for="inputPassword"><b>categories</b></label>
                            <div class="controls">
                            <input class="input-field1 mt-2" type="text" class="span8" name="categories" value="<?php  if(isset ($categories)){echo $categories;}?>"id="inputPassword" placeholder="Categories" required>
                            </div>
                        </div>
                       </div>
                    </div>

                     <div class="row mt-3">
                       <div class="col-md-12">
                        <div class="control-group">
                            <label class="control-label" for="inputPassword"><b>Post Data</b></label>
                            <div class="controls mt-2">
                                <textarea name="post_data" id="detail" class="tinymce input-field1 " value="<?php  if(isset ($post_data)){echo $post_data;}?>" placeholder="data here"></textarea>
                            </div>
                        </div> 
                       </div>
                    </div>
                 <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="control-group">
                            <label class="control-label" for="inputPassword"><b>Status</b></label>
                            <div class="controls">
                            <input  class="input-field1 mt-2" type="text" class="span8" name="status" value="<?php  if(isset ($status)){echo $status;}?>" id="inputPassword"  placeholder="insert status here" required>
                            </div>
                        </div>
                    </div>
                 </div>
                    <!-- <div class="control-group">
                        <label class="control-label" for="inputPassword">Course Months </label>
                        <div class="controls">
                        <input type="text" class="span8" name="course_month" id="inputPassword" placeholder="Course Title" required>
                        </div>
                    </div>

                        <div class="control-group">
                        <label class="control-label" for="inputPassword">Course Modules</label>
                        <div class="controls">
                            <select name="course_mod">
                                <option></option>
                            </select>
                        </div>
                    </div> -->
                    
                    <div class="row">
                      <div class="col-md-12 " style="float:right";>
                          <div class="control-group ">
                          <div class="controls text-end">
                          <a href="#">
                          <input type="submit" value="Post"  name="submit" class="btn btn-primary mt-3 " />
                          
                        </a>
                        <a href="view_posts.php">
                          <input type="button" value="View All Posts"  name="submit" class="btn btn-primary mt-3" />
                          
                        </a>
                          <!-- <button name="save" type="submit" class="btn btn-info"><i class="icon-save"></i> Save</button> -->
                          
                          <?php  
                            if(isset($error_msg)){
                              echo " <span style = 'color:red;' class='pull-right'>$error_msg</span>";
                            }if(isset($msg)){
                              echo " <span style = 'color:green;' class='pull-right'>$msg</span>";
                            }
                            ?>
                        </div>
                          </div>
                      </div>
                    </div>

                    </form>
                    </div>
                    </div>
                  </div>
              
                </div> 

            </div>
          </div>
        </div>
      </div>
      <!----------------------- footer start here --------------------------->
   <?php require_once('inc/footer.php')?>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
   <script src="js/tinymce_nightly_dev/tinymce/js/tinymce.min.js" ></script>
   <script src="js/tinymce_nightly_dev/tinymce/js/init-tinymce.js" ></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    
  </body>
</html>
