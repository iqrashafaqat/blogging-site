<?php require_once('inc/top.php');?>
  </head>
  <!--body satrts here  -->
  <body>
    <!-- navbar section -->
    <?php require_once('inc/header.php');?>

    <div class="jumbotron jumbotron-fluid">
      <div class="container animate__slideOutUp">
        <div id="details" class="animate__animated animate__fadeInLeft">
          <h1 class="display-4">Contact <span>Us</span></h1>
          <p class="lead">We Are Available 24/7. So Feel Free To Contact Us.</p>
        </div>
      </div>
      <img src="./images/blogging.jpg" alt="image here" class="img-fluid" />
    </div>
    <section class="my-5">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-12">
                <iframe
                  width="100%"
                  height="400"
                  frameborder="0"
                  scrolling="no"
                  marginheight="0"
                  marginwidth="0"
                  id="gmap_canvas"
                  src="https://maps.google.com/maps?width=100%&amp;height=400&amp;hl=en&amp;q=street%20no.1%20Lahore+(Lahore%20gulbarg%20town)&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                ></iframe
                ><a href="https://maps-generator.com/"></a>
              </div>
              <div class="col-md-12 contact-form">
                <h2>Contact Form</h2>
                <hr />
                <form action="">
                  <div class="form-group">
                    <label for="full-name">Full Name*:</label>
                    <input
                      type="text"
                      id="full-name"
                      class="form-control"
                      placeholder="Full-Name"
                    />
                  </div>
                  <div class="form-group mt-3">
                    <label for="email">Email*:</label>
                    <input
                      type="text"
                      id="email"
                      class="form-control"
                      placeholder="Email"
                    />
                  </div>
                  <div class="form-group mt-3">
                    <label for="Website">Website:</label>
                    <input
                      type="text"
                      id="Website"
                      class="form-control"
                      placeholder="Website Url"
                    />
                  </div>
                  <div class="form-group mt-3">
                    <label for="message">Message:</label>
                    <textarea
                      id="message"
                      cols="30"
                      rows="10"
                      class="form-control"
                      placeholder="Your message here"
                    ></textarea>
                  </div>
                  <div class="mt-3">
                    <input
                      type="submit"
                      name="submit"
                      value="submit"
                      class="btn btn-primary"
                    />
                  </div>
                </form>
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
