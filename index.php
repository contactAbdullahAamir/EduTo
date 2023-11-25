<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDUTO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/style.css">
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
                                style="font-size: 36px; display: inline-block; font-weight: bolder; margin-bottom: 10px; color: #3f51b5; margin-top:20px">EDUKO</a>
                        </div>
                        <h3 class="text-center mb-4" style="font-weight: 400; font-size: 20px; color: black;">Login to
                            Your Account</h3>

                            <form id="form" novalidate="novalidate" class="form" action="login.php">
                            <!-- Your login form fields go here -->
                            <div class="mb-3">
                                <input type="email" class="form-control form-control-lg" id="email" name="email"
                                    placeholder="Email" style="font-size: 16px; margin-top: 50px;">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control form-control-lg" id="password"
                                    name="password" placeholder="Password" style="font-size: 16px; ; margin-top: 20px;">
                            </div>
                            <div class="mb-3">
                                <input class="form-control form-control-lg" id="role" name="role" placeholder="Role"
                                    style="font-size: 16px; ; margin-top: 20px;">
                            </div>

                            <div class="text-center mt-3" style="margin-bottom:50px">
                                <a href="#"
                                    style="font-weight: bolder; text-decoration: none; color: #3f51b5; margin-top: 50px;">Forgot
                                    your password?</a>
                                <p style="font-size: 14px; color: black; margin-top: 5px;">If your email is not
                                    confirmed,
                                    <a href="#" style="color: black;">click here</a> to resend email.
                                </p>
                            </div>
                            <div
                                style="display: flex; justify-content: space-between; align-items: center; margin-top: 25px;">
                                <a href="register.php"
                                    style="font-weight: bolder; text-decoration: none; color: #3f51b5;">Create
                                    Account</a>
                                <div class="submit">
                                <button type="button" value="Login" class="btn btn-primary btn-md waves-effect waves-light button" style="background-color: #3f51b5; margin-bottom:30px">Login</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>