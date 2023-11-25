<?php include('includes/config.php') ?>
<?php include('header.php') ?>

<!--Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand mx-4" href="index.php">EDUTO</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
            style="background-color: #3F51B5;">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="teacher.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Cource Catalouge</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">My Cources</a>
                </li>

                <!-- Add other navigation items as needed -->
            </ul>
            <ul class="navbar-nav ml-auto nav-flex-icons">

                <li class="nav-item dropdown">
                    
                    
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    
                   
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--/.Navbar -->

<div class="slideshow-container">

    <!-- Full-width images with number and caption text -->


    <div class="mySlides">
        <img src="./image2.png" style="width:100%">
    </div>

    <div class="mySlides">
        <img src="./image3.png" style="width:100%">
    </div>

    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>

<!-- The dots/circles -->
<div style="text-align:center">
    <!-- <span class="dot" onclick="currentSlide(1)"></span> -->
    <!-- <span class="dot" onclick="currentSlide(2)"></span> -->
    <!-- <span class="dot" onclick="currentSlide(3)"></span> -->
</div>

<!-- JavaScript for the slideshow -->
<script>
var slideIndex = 0;
showSlides();

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1
    }
    slides[slideIndex - 1].style.display = "block";
    setTimeout(showSlides, 2000); // Change slide every 3 seconds
}
</script>


<style>
  .course-image {
    width: 100%;
    height: 220px; /* Adjust the height as needed */
    object-fit: cover;
  }

  .card {
    position: relative;
    height: 100%;
  }

  .card-body {
    text-align: center;
    height: 100%;
  }

  h4 {
    font-size: 1.5rem;
  }

  .instructor {
    font-weight: 400;
    font-size: 16px;
    font-family: 'Roboto', 'sans-serif';
  }

  p {
    color: #747373;
    font-size: 0.9rem;
    font-weight: 400;
    margin-top: 0;
    margin-bottom: 1rem;
  }

  .btn-md {
    padding: 0.7rem 1.6rem;
    font-size: 0.7rem;
  }

  .waves-effect,
  .waves-light {
    display: inline-block;
    border-radius: 0.125rem;
    cursor: pointer;
    text-transform: uppercase;
    white-space: normal;
    word-wrap: break-word;
    color: inherit;
  }

  .waves-effect {
    position: relative;
    overflow: hidden;
    display: inline-block;
    -webkit-tap-highlight-color: transparent;
}

<style>
  .waves-effect {
    position: relative;
    overflow: hidden;
    display: inline-block;
    -webkit-tap-highlight-color: transparent;
  }

  .btn {
    text-align: center;
    vertical-align: middle;
    background-color: transparent;
    line-height: 1.5;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
    margin: 0.375rem;
    border: 0;
    border-radius: 0.125rem;
    cursor: pointer;
    text-transform: uppercase;
    white-space: normal;
    word-wrap: break-word;
    color: inherit;
  }

  .btn.btn-md {
    padding: 0.7rem 1.6rem;
    font-size: 0.7rem;
  }

  a.waves-effect, a.waves-light {
    display: inline-block;
  }
</style>



<!-- Our Courses -->
<section class="py-5 ">
  <div class="text-center mb-5">
    <h2 class="font-weight-bold">Our Courses</h2>
  </div>

  <div class="container">
    <div class="row">
      <?php 
      $query = mysqli_query($db_conn, "SELECT * FROM courses ORDER BY id DESC LIMIT 0, 8");
      while ($course = mysqli_fetch_object($query)) {?>
        <div class="col-lg-4 mb-4">
          <div class="card">
            <div>
              <img src="./dist/uploads/<?php echo $course->image ?>" alt="" class="img-fluid rounded-top course-image">
            </div>
            <div class="card-body">
              <h4><?php echo $course->name ?></h4>
              <p class="instructor"><?php echo $course->instructor ?></p>
              <p class="instructor"><?php echo $course->session ?></p>
              <p class="card-text">
                <b></b> <?php echo $course->description ?> <br>
              </p>
              <a href="#" class="btn btn-md waves-effect waves-light">Read More</a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>









<!-- Teachers -->
<section class="py-5 bg-light">
    <div class="text-center mb-5">
        <h2 class="font-weight-bold" style= "color:#3F51B5;font: size 30px;">Our Teachers</h2>
      
    </div>

    <div class="container">
        <div class="row">
            <?php for ($i = 0; $i < 6; $i++){ ?>
            <div class="col-lg-4 my-5">
                <div class="card">
                    <div class="col-5 position-absolute" style="top:-50px">
                        <img src="./teacher.jpg" alt="" class="mw-100 border rounded-circle">
                    </div>
                    <div class="card-body pt-5 mt-4">
                        <h5 class="card-title mb-0">Teacher's Name</h5>
                        <p><i class="fa fa-star text-warning"></i> <i class="fa fa-star text-warning"></i> <i
                                class="fa fa-star text-warning"></i> <i class="fa fa-star text-warning"></i> <i
                                class="fa fa-star text-warning"></i></p>
                        <p class="card-text">
                            <!-- <b>Courses: </b> 5 <br> -->
                            <b>Ratings: </b>                          
                        </p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>


<!-- Footer -->

<section class="py-2 text-light" style="background-color: #3F51B5; text-align: center">
  <div class="container-fluid">
    <div class="social-icons">
      <div>
        <span class="fa-stack">
          <i class="fa fa-circle fa-stack-2x"></i>
          <i class="fab fa-facebook-f fa-stack-1x fa-inverse text-dark"></i>
        </span>
        <span class="fa-stack">
          <i class="fa fa-circle fa-stack-2x"></i>
          <i class="fab fa-instagram fa-stack-1x fa-inverse text-dark"></i>
        </span>
        <span class="fa-stack">
          <i class="fa fa-circle fa-stack-2x"></i>
          <i class="fab fa-twitter fa-stack-1x fa-inverse text-dark"></i>
        </span>
        <span class="fa-stack">
          <i class="fa fa-circle fa-stack-2x"></i>
          <i class="fab fa-linkedin fa-stack-1x fa-inverse text-dark"></i>
        </span>
        <span class="fa-stack">
          <i class="fa fa-circle fa-stack-2x"></i>
          <i class="fab fa-youtube fa-stack-1x fa-inverse text-dark"></i>
        </span>
      </div>
    </div>
  </div>
</section>
<section class="py-2  text-light"  style= "background-color:#334191;text-align:center">
    <div class="container-fluid">
       @2023 Copyright  All Rights Reseved. <a href="#" class="text-light"></a>
    </div>
</section>




<?php include('footer.php') ?>