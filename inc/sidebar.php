<div class="widgets">
          <form action="index.php" method="post">
              <div class="input-group">
              
        <input type="text" id="form1" name= "search_title" class="form-control" placeholder="search for.."/>
            <span class="input-group-btn">
                  <input type="submit" value="Go" class="btn btn-primary" name="search">
                  <!-- <button class="btn btn-primary" type="button">GO!</button> -->
                </span>
              </div>
              </form>
            </div>
            <!-- widget close -->
   

            <!-- popular posts -->
            <div class="widgets">
              <div class="popular">
                <h3>Popular Posts</h3>

                <?php
                $p_query = "SELECT * FROM posts WHERE STATUS = 'publish' ORDER BY views DESC LIMIT 5";
                $p_run  = mysqli_query($conn, $p_query);
                if (mysqli_num_rows($p_run) > 0){
                   while ($p_row = mysqli_fetch_array($p_run)) {
                        $p_id = $p_row['id'];
                        $p_date = getdate($p_row['date']);
                        $p_day = $p_date['mday'];
                        $p_month = $p_date['month'];
                        $p_year = $p_date['year'];
                        $p_title = $p_row['title'];
                        $p_image = $p_row['image'];
                   
                ?>
                <hr />
                <div class="row">
                  <div class="col-xs-4 col-md-4 col-sm-4">
                    <a href="post.php?post_id=<?php echo $p_id; ?>"
                      ><img
                        src="./images/<?php echo $p_image; ?>"
                        alt="image 1"
                        class="img-fluid"
                    /></a>
                  </div>
                  <div class="col-xs-8 col-md-8 col-sm-8 details">
                    <a href="post.php?post_id=<?php echo $p_id; ?>"><h5><?php echo $p_title; ?></h5></a>
                    <p>
                      <i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo "$p_day $p_month $p_year"; ?>
                    </p>
                  </div>
                </div>

                <?php
                      }
                    }
                    else {
                     
                      echo  "<h3>No Posts Available Yet </h3>";
                     
                    }
                ?>

              </div>
            </div>
            <!-- widget close -->



            <!-- recent posts -->
            <div class="widgets">
              <div class="popular">
                <h3>Recent Posts</h3>

                <?php
                $p_query = "SELECT * FROM posts WHERE STATUS = 'publish' ORDER BY id DESC LIMIT 5";
                $p_run  = mysqli_query($conn, $p_query);
                if (mysqli_num_rows($p_run) > 0){
                   while ($p_row = mysqli_fetch_array($p_run)) {
                        $p_id = $p_row['id'];
                        $p_date = getdate($p_row['date']);
                        $p_day = $p_date['mday'];
                        $p_month = $p_date['month'];
                        $p_year = $p_date['year'];
                        $p_title = $p_row['title'];
                        $p_image = $p_row['image'];
                   
                ?>
                <hr />
                <div class="row">
                  <div class="col-xs-4 col-md-4 col-sm-4">
                    <a href="post.php?post_id=<?php echo $p_id; ?>"
                      ><img
                        src="./images/<?php echo $p_image; ?>"
                        alt="image 1"
                        class="img-fluid"
                    /></a>
                  </div>
                  <div class="col-xs-8 col-md-8 col-sm-8 details">
                    <a href="post.php?post_id=<?php echo $p_id; ?>"><h5><?php echo $p_title; ?></h5></a>
                    <p>
                      <i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo "$p_day $p_month $p_year"; ?>
                    </p>
                  </div>
                </div>

                <?php
                      }
                    }
                    else {
                     
                      echo  "<h3>No Posts Available Yet </h3>";
                     
                    }
                ?>

              </div>
            </div>
            <!-- widget close -->
 
            <!-- categories section -->
            <div class="widgets">
              <div class="popular">
                <h3>Categories</h3>
                <hr />
                <div class="row category">
                  <div class="col-xs-6 col-md-6 col-sm-6">
                    <ul class="category">
                      <?php
                      $c_query = "SELECT * FROM categories";
                      $c_run = mysqli_query($conn, $c_query);
                      if (mysqli_num_rows($c_run) >  0) {

                        $count = 2;
                        while($c_row  = mysqli_fetch_array($c_run))
                           {
                        $c_id = $c_row['id'];
                        $c_category= $c_row['category'];
                        $count = $count + 1;
                        if (($count % 2)==1) {
                          echo " <li><a href='index.php?cat=".$c_id."'>".(ucfirst($c_category))."</a></li>";
                        } 
                        
                      }
                    }
                      else {
                        echo "<p>NO Category</p>";
                      }
                      

                      ?>
                    </ul>
                  </div>
                  <div class="col-xs-6 col-md-6 col-sm-6">
                    <ul class="category">
                    <?php
                      $c_query = "SELECT * FROM categories";
                      $c_run = mysqli_query($conn, $c_query);
                      if (mysqli_num_rows($c_run) >  0) {

                        $count = 2;
                        while($c_row  = mysqli_fetch_array($c_run))
                           {
                        $c_id = $c_row['id'];
                        $c_category= $c_row['category'];
                        $count = $count + 1;
                        if (($count % 2) == 0) {
                          echo " <li><a href='index.php?cat=".$c_id."'>".(ucfirst($c_category))."</a></li>";
                        } 
                        
                      }
                    }
                      else {
                        echo "<p>NO Category</p>";
                      }
                      

                      ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- widget close -->


            <!-- social icons -->
            <div class="widgets">
              <div class="popular categories">
                <h3>Social Icons</h3>
                <hr />
                <div class="row mt-4 pb-3 category">
                  <div class="col-xs-4 col-md-4 col-sm-4">
                    <a href="http://www.facebookk.com"
                      ><img
                        src="./images/facebook.png"
                        alt="facebook"
                        class="img-fluid"
                    /></a>
                  </div>
                  <div class="col-xs-4 col-md-4 col-sm-4">
                    <a href="http:www.twitter.com"
                      ><img
                        src="./images/twitter.png"
                        alt="twitter"
                        class="img-fluid"
                    /></a>
                  </div>
                  <div class="col-xs-4 col-md-4 col-sm-4">
                    <a href="hhttp:www.google.com"
                      ><img
                        src="./images/google.png"
                        alt="google"
                        class="img-fluid"
                    /></a>
                  </div>
                </div>

                <hr />
                <div class="row mt-4 pb-3">
                  <div class="col-xs-4 col-md-4 col-sm-4">
                    <a href="http:www.linkedin.com"
                      ><img
                        src="./images/linkedin.png"
                        alt="linkedin"
                        class="img-fluid social-icons"
                    /></a>
                  </div>
                  <div class="col-xs-4 col-md-4 col-sm-4">
                    <a href="http:www.skype.com"
                      ><img
                        src="./images/skype.png"
                        alt="skype"
                        class="img-fluid social-icons"
                    /></a>
                  </div>
                  <div class="col-xs-4 col-md-4 col-sm-4">
                    <a href="http:www.youtube.com"
                      ><img
                        src="./images/youtube.png"
                        alt="youtube"
                        class="img-fluid social-icons"
                    /></a>
                  </div>
                </div>
              </div>
            </div>
            <!-- widget close -->