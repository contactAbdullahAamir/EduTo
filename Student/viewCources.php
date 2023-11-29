<?php
include '../Includes/dbcon.php';
include '../Includes/session.php';


$query = "SELECT tblclass.className,tblclassarms.classArmName 
    FROM tblstudents
    INNER JOIN tblclass ON tblclass.Id = tblstudents.classId
    INNER JOIN tblclassarms ON tblclassarms.Id = tblstudents.classArmId
    Where tblstudents.Id = '$_SESSION[userId]'";

$rs = $conn->query($query);
$num = $rs->num_rows;
$rrw = $rs->fetch_assoc();


$registrationNumberQuery = "SELECT admissionNumber FROM tblstudents WHERE Id = '$_SESSION[userId]'";
$registrationNumberResult = $conn->query($registrationNumberQuery);
$registrationNumberRow = $registrationNumberResult->fetch_assoc();
$registrationNumber = $registrationNumberRow['admissionNumber'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/attnlg.jpg" rel="icon">
  <title>Dashboard</title>
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">

  <style>
    .slideshow-container {
      margin-top: -24px;
      width: 100%;
      position: relative;
      overflow: hidden;
    }

    /* Hide the images by default */
    .mySlides {
      display: none;
      width: 100%;
      animation: fade 1s ease-in-out;
      /* Added fade animation */
    }
  </style>

  <script>
    function classArmDropdown(str) {
      if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
      } else {
        if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
        } else {
          // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtHint").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "ajaxClassArms2.php?cid=" + str, true);
        xmlhttp.send();
      }
    }
  </script>
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <?php include "Includes/topbar.php"; ?>
        <!-- Topbar -->
        <!-- admission number -->
      
        <div class="slideshow-container">

          <!-- Full-width images with number and caption text -->


          <div class="mySlides">
            <img src="../img/image2.png" style="width:100%">
          </div>

          <div class="mySlides">
            <img src="../img/image3.png" style="width:100%">
          </div>

          <!-- Next and previous buttons -->
         
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
        <!-- admission number -->
          <!-- Alert for Registration Number -->
          <div class="alert alert-primary" role="alert" style="background-color: #9BC3E5; color: #3F51B5; font-weight: bold; margin-left: 50px;  margin-right: 50px; margin-top:30px">
    Dear Student, Your registration number is <b><?php echo $registrationNumber; ?></b>. If your registration number is incorrect or the format is not correct, contact immediately to your instructor. Otherwise, you will not be able to view your result.
</div>

        <style>
          .course-image {
            width: 100%;
            height: 220px;
            /* Adjust the height as needed */
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
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .16), 0 2px 10px 0 rgba(0, 0, 0, .12);
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
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

          a.waves-effect,
          a.waves-light {
            display: inline-block;
          }
        </style>
        <!-- Cources -->
        <section class="py-5 ">
          <div class="text-center mb-5">
            <h2 class="font-weight-bold">Our Courses</h2>
          </div>

          <div class="container">
            <div class="row">
              <?php
              $query = "SELECT * FROM tblcource WHERE active = 1";
              $rs = $conn->query($query);
              $num = $rs->num_rows;
              $sn = 0;
              $status = "";
              if ($num > 0) {
                while ($rows = $rs->fetch_assoc()) {
                  $sn = $sn + 1;
                  echo '
          <div class="col-lg-4 mb-4">
            <div class="card">
            <div>
            <img src="../img/' . $rows['image'] . '" alt="thumbnail" style="max-width: 400px; max-height: 200px;" class="img-fluid rounded-top course-image">
        </div>
        
              <div class="card-body">
                <h4 style="font-weight: bolder; font-size: 22px; color:black">' . $rows['name'] . '</h4>
                <p class="instructor" style="font-weight: bold; font-size: 16px; ">' . $rows['instructor'] . '</p>
                <p class="instructor" style="">' . $rows['session'] . '</p>
                <p class="card-text">
                  ' . $rows['description'] . '
                </p>
                <a href="#" class="btn btn-md waves-effect waves-light">Read More</a>
              </div>
            </div>
          </div>';
                }
              }
              ?>
            </div>
          </div>

        </section>
        <!--  -->


        <section class="py-5 bg-light">
          <div class="text-center mb-5">
            <h2 class="font-weight-bold" style="color:#3F51B5;font: size 30px;">Our Teachers</h2>

          </div>

          <div class="container">
            <div class="row">
              <?php for ($i = 0; $i < 6; $i++) { ?>
                <div class="col-lg-4 my-5">
                  <div class="card">
                    <div class="col-5 position-absolute" style="top:-50px">
                      <img src="../img/teacher.jpg" alt="" class="mw-100 border rounded-circle">
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
        <section class="py-2  text-light" style="background-color:#334191;text-align:center">
          <div class="container-fluid">
            @2023 Copyright All Rights Reseved. <a href="#" class="text-light"></a>
          </div>
        </section>

        <!-- Container Fluid-->

      </div>
    </div>
    <!--Row-->



  </div>
  <!---Container Fluid-->
  </div>
  <!-- Footer -->
  <?php ?>
  <!-- Footer -->
  </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
</body>

</html>