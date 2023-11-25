<?php 
session_start();
include 'db.php';

$id = $_SESSION['id'];
if (empty($id)) {
   header("Location: ./index.php");
}
$qry = mysqli_query($conn, "SELECT * FROM users WHERE id = '{$id}'");
if (mysqli_num_rows($qry) > 0) {
   $row = mysqli_fetch_assoc($qry);
   if ($row) {
    $_SESSION['verificationStatus'] = $row['verificationStatus'];
    $_SESSION['role'] = $row['role']; // Assuming the 'role' field exists in the 'users' table

    if ($row['verificationStatus'] == "Verified") {
        header("Location: dashboardsDifferentiator.php");
        exit();
    }
      
   }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/verify.css">
</head>

<body class="gradient-custom">

    <!-- Login Section -->
    <div class="container py-5 h-100 form">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card card-registration">
                    <div class="card-body"
                        style="background-color: #FFFFFF; border-radius: 15px; width: -webkit-fill-available; font-size: 14px;">
                        <!-- Card body content goes here -->
                        <div class="d-flex justify-content-center">
                            <a class="navbar-brand mx-4" href="/"
                                style="font-size: 26px; display: inline-block; font-weight: bolder; margin-bottom: 10px; color: #3f51b5; margin-top:20px">Verify
                                Your Account</a>
                        </div>
                        <h5 class="text-center mb-4"
                            style="font-weight: 400; font-size: 20px; color: black; font-size: 16px;">We emailed
                            you the
                            four digit otp code to Enter the code below to continue you email address...
                        </h5>
                        <form action="./otp.php" method="post" autocomplete="off">                            
                                <input type="number" name="opt1" class="otp_field" placeholder="0" min="0" max="9"
                                    required onpaste="false">
                                <input type="number" name="opt2" class="otp_field" placeholder="0" min="0" max="9"
                                    required onpaste="false">
                                <input type="number" name="opt3" class="otp_field" placeholder="0" min="0" max="9"
                                    required onpaste="false">
                                <input type="number" name="opt4" class="otp_field" placeholder="0" min="0" max="9"
                                    required onpaste="false">
                            </div>
                            <div class="submit">
                                <input type="submit" value="Verify Now"
                                    class="btn btn-primary btn-md waves-effect waves-light button"
                                    style="background-color: #3f51b5; margin-top:15px; margin-bottom:15px;margin-left:200px">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Using a module script tag -->
<!-- <script type="module" src="verify.js"></script> -->

    <script src="./verify.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html> 