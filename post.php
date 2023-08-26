<?php require_once('inc/top.php');?>
  </head>
  <!--body satrts here  -->
  <body>
  
<?php require_once('inc/header.php');?>
       <!--------- fetch data for popular posts -------->
<?php
if(isset($_GET['post_id'])){

  $post_id = $_GET['post_id'];


  //views 
 $views_query= "UPDATE `posts` SET `views` = views + 1 WHERE `posts`.`id` = $post_id";
 mysqli_query($conn,$views_query);
  

  $query  = "SELECT * FROM posts  WHERE status = 'publish' and id = $post_id";
  $run = mysqli_query($conn, $query);
  if(mysqli_num_rows($run) > 0){
    $row = mysqli_fetch_array($run);
          
    $id = $row['id'];
    $date = getdate($row['date']);
    $day = $date['mday'];
    $month = $date['month'];
    $year = $date['year'];
    $title = $row['title'];
    $image = $row['image'];
    $author_image = $row['author_image'];
    $author = $row['author'];
    $categories = $row['categories'];
    $post_data = $row['post_data'];
  }

}
else{
  header('Location: index.php');
}
?>


    <div class="jumbotron jumbotron-fluid">
      <div class="container animate__slideOutUp">
        <div id="details" class="animate__animated animate__fadeInLeft">
          <h1 class="display-4">Custom <span>Posts</span></h1>
          <p class="lead">
            We Are Available 24/7. Here You Can Put YOur Tag Line To Make It
            More Attractive.
          </p>
        </div>
      </div>
      <img src="./images/blogging.jpg" alt="image here" class="img-fluid" />
    </div>
    <section class="my-5">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <!------------------------ posts start here ------------------>
       
            <div class="post">
              <div class="row">
                <div class="col-md-2 post-date">
                  <div class="day"><?php echo $day;?></div>
                  <div class="month"><?php echo $month;?></div>
                  <div class="year"><?php echo $year;?></div>
                </div>
                <div class="col-md-8 post-title">
                  <a href="post.php?post_id=<?php echo $id;?>"><h1><?php echo $title;?></h1></a>
                  <p>Written by: <span><?php echo ucfirst($author);?></span></p>
                </div>
                <div class="col-md-2 profile-picture">
                  <img
                    src="./images/<?php echo $author_image;?>"
                    alt=""
                    class="rounded-circle img-fluid"
                  />
                </div>
              </div>
              <a href="images/<?php echo $image;?>"
                ><img src="./images/<?php echo $image;?>" alt="" class="img-fluid"
              /></a>
              <p class="desc">
              <?php echo $post_data;?>
              </p>
              <div class="bottom p-3 pt-2">
                <span class="first me-5"
                  ><i class="fa fa-folder-open" aria-hidden="true"></i
                  ><a href="#"> <?php echo ucfirst($categories);?></a></span
                >
                |
                <span class="second ms-5"
                  ><i class="fa fa-commenting" aria-hidden="true"></i>
                  <a href="#">Comment</a></span
                >
              </div>
            </div>
            <!-------------- related post section ------->
            <div class="related-posts">
              <div class="row">
                <h2>Related Posts</h2>
                <hr />

                <!-- fetch related posts data -->
                <?php
                
                $r_query = "SELECT * FROM posts WHERE status = 'publish' AND title LIKE '%$title%' LIMIT 3";
                $r_run = mysqli_query($conn, $r_query);
                while ($r_row= mysqli_fetch_array($r_run)) {
                  $r_id = $r_row['id'];
                  $r_title= $r_row['title'];
                  $r_image = $r_row['image'];
              
                ?>
                <div class="col-sm-4">
                  <a href="post.php?post_id=<?php echo $r_id;?>">
                    <img src="./images/<?php echo $r_image;?>" alt="" class="img-fluid" />
                    <h4>
                    <?php echo $r_title;?>
                    </h4>
                  </a>
                </div>
               <?php 
                    }  
               ?>
              </div>
            </div>
            <!---------------- author bio section ----------------------->
            <div class="author">
              <div class="row">
                <div class="col-sm-3">
                  <img
                    src="./images/<?php echo $author_image;?>"
                    alt=""
                    class="img-fluid users-img"
                  />
                </div>
                <div class="col-sm-9">
                  <h4><?php echo ucfirst($author);?></h4>
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Dolores, non libero quod facilis quaerat, molestias cumque
                    officia porro quae et ab fugit assumenda excepturi vitae
                    iusto voluptatibus iure animi adipisci!
                  </p>
                </div>
              </div>
            </div>
            <!----------------- comment section --------------------->
           
            <?php        
            $c_query =  " SELECT * FROM comments WHERE status = 'approve' and post_id = $post_id ORDER BY id DESC";
            $c_run = mysqli_query($conn, $c_query);
            if (mysqli_num_rows($c_run)> 0 ) {
            ?>
            <div class="comment">         
             <h3>Comments</h3>
               <?php 
               while($c_row = mysqli_fetch_array($c_run)){
                      $c_id = $c_row['id'];
                      $c_name = $c_row['name'];
                      $c_username = $c_row['username'];
                      $c_image = $c_row['image'];
                      $c_comment = $c_row['comment'];
               ?>
                <hr />
                <div class="row single-comment">
                <div class="col-sm-2">
                  <img
                    src="./images/<?php echo $c_image;?>"
                    alt="profile image"
                    class="img-fluid users-img "
                  />
                </div>
                <div class="col-sm-10">
                  <h4><?php echo ucfirst($c_name);?></h4>
                  <p>
                  <?php echo $c_comment;?>
                  </p>
                </div>
              </div>
              <?php      }  ?>
            </div>
            <?php   } 
            if(isset($_POST['submit'])){
              $cs_name = $_POST['name'];
              $cs_email = $_POST['email'];
              $cs_website = $_POST['website'];
              $cs_comment = $_POST['comment'];
              $cs_date = time();
              if (empty($cs_name) or empty($cs_email) or empty($cs_comment)) {
                $error_msg = "All (*) fields are Required";
              } else {
               $cs_query = "INSERT INTO `comments` (`id`, `date`, `name`, `username`, `post_id`, `email`, 
               `website`, `image`, `comment`, `status`) VALUES (NULL, '$cs_date', '$cs_name', 'user', '$post_id',
                '$cs_email', '$cs_website', 'unknown user.png', '$cs_comment', 'pending')";

                if (mysqli_query($conn,$cs_query)) {

                 $msg = "Comment Submited and Waiting for Approval";

                 $cs_name = "";
                 $cs_email = "";
                 $cs_website ="";
                 $cs_comment = "";

                } else {
                  $error_msg = "Comment Has not be submited";
                }
                
              
              }
              

            }
            
            
            ?>


      <!----------------------------- comment box starts here ------------------------------------>
            <div class="comment-box">
              <div class="row">
                <div class="col-md-12 col-xs-12 contact-form">
                  <h2>Comment Form</h2>
                  <hr />
                  <form action=""  method="post">
                    <div class="form-group">
                      <label for="full-name">Full Name*:</label>
                      <input
                        type="text"
                        value="<?php  if(isset ($cs_name)){
                          echo $cs_name;
                        }?>"
                        id="full-name"
                        class="form-control"
                        name="name"
                        value="<?php if(isset($cs_name)){ echo  $cs_name;} ?>"
                        placeholder="Full-Name"
                      />
                    </div>
                    <div class="form-group mt-3">
                      <label for="email">Email*:</label>
                      <input
                        type="text"
                        id="email"
                        value="<?php if(isset($cs_email)){ echo  $cs_email;} ?>"
                        class="form-control"
                        name="email"
                        placeholder="Email"
                      />
                    </div>
                    <div class="form-group mt-3">
                      <label for="Website">Website:</label>
                      <input
                        type="text"
                        id="Website"
                        value="<?php if(isset($cs_website)){ echo  $cs_website;} ?>"
                        class="form-control"
                        name="website"
                        placeholder="Website URL"
                      />
                    </div>
                    <div class="form-group mt-3">
                      <label for="comment">Comment*:</label>
                      <textarea
                        id="comment"
                        cols="30"
                        rows="10"
                        class="form-control"
                        name="comment"
                        placeholder="Your Comment Should be here"
                      ><?php if(isset($cs_comment)){ echo  $cs_comment;} ?></textarea>
                    </div>
                    <div class="mt-3">
                      <input
                        type="submit"
                        name="submit"
                        value="Submit Comment"
                        class="btn btn-primary"
                      />
                      <?php  
                      if(isset($error_msg)){
                        echo " <span style = 'color:red;' class='pull-right'>$error_msg</span>";
                      }if(isset($msg)){
                        echo " <span style = 'color:green;' class='pull-right'>$msg</span>";
                      }
                      ?>
                      
                     
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- sidebar section -->
          <div class="col-md-4">
             <?php require_once('inc/sidebar.php');?>
          </div>
        </div>
      </div>
    </section>

<?php require_once('inc/footer.php');?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
