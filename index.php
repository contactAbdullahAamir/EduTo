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
                    <?php if (isset($_SESSION['login'])) { ?>
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user mr-2"></i>Account
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-default"
                        aria-labelledby="navbarDropdownMenuLink-333">
                        <a class="dropdown-item" href="/sms-project/admin/dashboard.php">Dashboard</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                    <?php } else { ?>
                    <a href="login.php" class="nav-link"><i class="fa fa-user mr-2"></i>User login</a>
                    <?php } ?>
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
    height: 170px !important;
    object-fit: cover;
    object-position: center;
}
</style>
<!-- Cources   -->
<section class="py-5 bg-light">
    <div class="text-center mb-5">
        <h2 class="font-weight-bold" style="color:#3F51B5">Our Courses</h2>
        <!-- <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus perspiciatis obcaecati facilis nulla</p> -->
    </div>

    <div class="container">
        <div class="row">
            <?php

            for($i=0; $i<8; $i++){

            ?>
           
            <div class="col-lg-3 mb-4">
                <div class="card">
                    <div>
                        <img src="./courceimage.jpg" alt="" class="img-fluid rounded-top">
                    </div>
                    <div class="card-body">
                        <b style="font: size 18px">Artifical Intelligance</b>
                        <p class="card-text" style="font: size 10px;">
                            <b>This course introduces representations, techniques, and architectures used to build
                                applied...</b>
                            <br>Price: 4000/-Rs</br>

                        </p>
                        <button class="btn btn-block btn-primary btn-sm">Enroll Now</button>

                    </div>

                </div>
            </div>
            <?php } ?>

            
            
            

            
        </div>
    </div>
</section>

<!-- Teachers -->
<section class="py-5 ">
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