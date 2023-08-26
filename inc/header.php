  <!-- navbar section -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <div class="">
            <img
              src="./images/favicon.ico"
              alt=""
              width="50px"
              class="img-fluid"
            />
            Bloging Site
          </div>
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse navbar-collapse justify-content-end"
          id="navbarSupportedContent"
        >
          <ul class="navbar-nav mb-2 mb-lg-0 justify-content-end">
            <li class="nav-item me-3">
              <a class="nav-link" href="index.php"
                ><i class="fa fa-home" aria-hidden="true"></i> Home</a
              >
            </li>

            <li class="nav-item dropdown me-3">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                ><i class="fa fa-list-alt" aria-hidden="true"></i> Categories
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">


                    <!-- fetch category data using query -->
                      <?php  
                      $query =" SELECT * FROM Categories ORDER BY Id DESC";
                      $run = mysqli_query($conn, $query);
                      if(mysqli_num_rows($run)  >  0){
                        while ($row = mysqli_fetch_array($run)) {
                          $category = ucfirst($row['category']);
                          $id = $row['id'];
                          echo   "<li><a class='dropdown-item' href='index.php?cat=".$id."'>$category</a></li>";
                        }
                      }else{
                        echo   "<li><a class='dropdown-item' href='#'> No Categories Yet</a></li>";
                      }
                      
                      ?>



                <!-- <li><a class="dropdown-item" href="#">Category 1</a></li>
                <li><a class="dropdown-item" href="#">Category 2</a></li> -->
              </ul>
            </li>
            <li class="nav-item me-3">
              <a class="nav-link" href="contact-us.php">
                <i class="fa fa-phone" aria-hidden="true"></i> Contact-Us</a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>