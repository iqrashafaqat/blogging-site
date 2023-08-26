<!-- top section -->
<?php require_once('inc/top.php');?>
  </head>
  <!--body satrts here  -->
  <body>
<!-- navbar section -->
<?php require_once('inc/header.php');

              //pagination starts here
              $number_of_posts = 3;
              if (isset($_GET['page'])) {
                  $page_id = $_GET['page'];
              } else{
                  $page_id = 1;
              }
              if (isset($_GET['cat'])) {
                  $cat_id = $_GET['cat'];
                  $cat_query = "SELECT * FROM categories WHERE id = $cat_id";
                  $cat_run = mysqli_query($conn, $cat_query);
                  $cat_row = mysqli_fetch_array($cat_run);
                  $cat_name = $cat_row['category']; 
              }
              
              if (isset($_POST['search'])) {
                $search = $_POST['search_title'];
                $all_posts_query  ="SELECT * FROM posts WHERE status ='publish'";
                $all_posts_query .= " and tags LIKE '%$search%'";
                $all_posts_run = mysqli_query($conn, $all_posts_query);
                $all_posts = mysqli_num_rows($all_posts_run);
                $total_pages = ceil($all_posts / $number_of_posts);
                $posts_start_from  = ($page_id - 1) * $number_of_posts;
              }
              else{
                    $all_posts_query  ="SELECT * FROM posts WHERE status ='publish'";
                    if (isset($cat_name)) {
                      $all_posts_query .= " and categories = '$cat_name'";
                   }
                   $all_posts_run = mysqli_query($conn, $all_posts_query);
                   $all_posts = mysqli_num_rows($all_posts_run);
                   $total_pages = ceil($all_posts / $number_of_posts);
                   $posts_start_from  = ($page_id - 1) * $number_of_posts;
              }          

              // $all_posts_query = "SELECT * FROM posts WHERE status ='publish'";

              //   if(isset($cat_name)){
              //     $all_posts_query  .=  " and categories = '$cat_name'";
              //   }
              // $all_posts_run = mysqli_query($conn, $all_posts_query);
              // $all_posts = mysqli_num_rows($all_posts_run);
              // $total_pages = ceil($all_posts / $number_of_posts);
              //  $posts_start_from  = ($page_id - 1) * $number_of_posts;

?>

    <div class="jumbotron jumbotron-fluid">
      <div class="container animate__slideOutUp">
        <div id="details" class="animate__animated animate__fadeInLeft">
          <h1 class="display-4">Bloging <span>Website</span></h1>
          <p class="lead">Give your blog the perfect home.</p>
        </div>
      </div>
      <img src="./images/blogging.jpg" alt="image here" class="img-fluid" />
    </div>
    <section class="my-5">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
          
            <!-- carosoul starts here -->
            <?php 
            
            $slider_query = "SELECT * FROM posts WHERE status = 'publish'  ORDER BY id  DESC LIMIT 5";
            $slider_run = mysqli_query($conn, $slider_query );
            if (mysqli_num_rows($slider_run) > 0){
              $count = mysqli_num_rows($slider_run);

            ?>
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                  
              <?php  
              for($i = 0; $i < $count; $i++){

                if ($i == 0) {
             echo " <button type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide-to='".$i."' class='active' aria-current='true'  aria-label='Slide 1'></button>";
                } else {
                  echo " <button type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide-to='".$i."'  aria-current='true'  aria-label='Slide 1'></button>";
                }               
              }
              ?>
              </div>
              <div class="carousel-inner">

                <?php 
                $check = 0;
                while($slider_row = mysqli_fetch_array($slider_run)){
                  
                  $slider_id = $slider_row['id'];
                  $slider_image = $slider_row['image'];
                  $slider_title= $slider_row['title'];
                  $slider_detail= $slider_row['detail'];
                  $check = $check + 1;
                  if ($check == 1) {

                    echo "  <div class='carousel-item active'>";
                  } else {
                   echo " <div class='carousel-item'>";
                  }               
                ?>
               <a href="post.php?post_id=<?php echo  $slider_id; ?>">
                 <img
                    src="./images/<?php echo $slider_image ;?>"
                    class="d-block w-100"
                    alt="slider1"
                    class="img-fluid"
                  />
                  </a>
                  <div class="carousel-caption d-none d-md-block">
                  <h3>  
                    <?php echo $slider_title ;?>
                  
                  </h3>
                    <p>
                     <?php echo $slider_detail;?>
                    </p>
                  </div>
                </div>
             <?php
             
              }
             ?>

              </div>
              <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev"
              >
                <span
                  class="carousel-control-prev-icon"
                  aria-hidden="true"
                ></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next"
              >
                <span
                  class="carousel-control-next-icon"
                  aria-hidden="true"
                ></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>

              <!------------- fetch post data ------------->
 
              <?php 
              
                      }
                      if (isset($_POST['search'])) {
                        $search = $_POST['search_title'];
                        $query = "SELECT * FROM posts WHERE status = 'publish'";
                        $query .=" and tags Like '%$search%'";
                        $query .=" ORDER BY id DESC LIMIT $posts_start_from, $number_of_posts";
                      }
                      else{
                          $query = "SELECT * FROM posts WHERE status = 'publish'";
                          if (isset($cat_name)) {
                              $query .=" and categories='$cat_name'";
                          }
                        $query .=" ORDER BY id DESC LIMIT $posts_start_from, $number_of_posts";
                      }


           
                   $run = mysqli_query($conn, $query);
                   if(mysqli_num_rows($run)  >  0){
                    while ($row = mysqli_fetch_array($run)) {
                      $id  =  $row['id'];
                      $date  = getdate ($row['date']);
                      $day  =  $date['mday'];
                      $month  =  $date['month'];
                      $year  =  $date['year'];
                      $title  =  $row['title'];
                      $author  =  $row['author'];
                      $author_image  =  $row['author_image'];
                      $image  =  $row['image'];
                      $categories  =  $row['categories'];
                      $tags  =  $row['tags'];
                      $post_data  =  $row['post_data'];
                      $views  =  $row['views'];
                      $status  =  $row['status'];
                 

              ?>

            <div class="post">
              <div class="row">
                <div class="col-md-2 post-date">
                  <div class="day"><?php echo  $day; ?></div>
                  <div class="month"><?php echo  $month; ?></div>
                  <div class="year"><?php echo  $year; ?></div>
                </div>
                <div class="col-md-8 post-title">
                  <a href="post.php?post_id=<?php echo  $id; ?>"><h1><?php echo  $title; ?></h1></a>
                  <p>Written by: <span><?php  echo ucfirst($author);?></span></p>
                </div>
                <div class="col-md-2 profile-picture">
                  <img src="./images/<?php echo $author_image; ?>" alt="" class="img-fluid" />
                </div>
              </div>
              <a href="post.php?post_id=<?php echo  $id; ?>"
                ><img src="./images/<?php echo  $image; ?>" alt="" class="img-fluid"
              /></a>
              <p class="desc">
               <?php echo substr($post_data, 0,300)."......."; ?>
              </p>
              <a href="post.php?post_id=<?php echo  $id; ?>" class="btn btn-primary mx-3 my-2">Read More</a>
              <div class="bottom p-3 pt-2">
                <span class="first me-5"
                  ><i class="fa fa-folder-open" aria-hidden="true"></i
                  > <a href="#"><?php echo ucfirst($categories); ?></a></span
                >
                |
                <span class="second ms-5"
                  ><i class="fa fa-commenting" aria-hidden="true"></i>
                  <a href="#">Comment</a></span
                >
              </div>
            </div>
            <?php 
               }
              
          }else{

            echo "<center><h2>No posts Available Yet</h2></center>";
          }
            ?>

            <!-------- pagination starts ------->
            <!-- <div class=""> -->
            <nav aria-label="Page navigation">
                  <ul class="pagination">
                  <?php
                for($i=1; $i<=$total_pages; $i++){

                    echo "<li class='page-item ".($page_id == $i ? 'active':'')."'>
                    <a class='page-link' href='index.php?page=".$i."&".(isset($cat_name)?"cat=$cat_id":"")."'>$i</a></li>";
                }
                
                ?>
                  </ul>
            </nav>
            <!-- </div> -->
          </div>

          <!-- sidebar section -->
          <div class="col-md-4">
          <?php require_once('inc/sidebar.php');?>
          </div>
        </div>
      </div>
    </section>

    <!-- footer section -->
    <section class="mt-5">
    <?php require_once('inc/footer.php');?>
    </section>
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
