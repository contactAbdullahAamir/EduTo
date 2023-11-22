<?php include('header.php') ?>
<style>
.gradient-custom {
    background: #FAFAFA;
    /* Change the background color of the entire page */
    margin-left: 24%;
    margin-right: 24%;
}


.card-registration,
.card-login {
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    /* Adjust the margin bottom to create space between cards */
}

.card-body {
    background-color: #FFFFFF;
    border-radius: 15px;
    width: -webkit-fill-available;
    font-size: 14px;
    /* padding: 15px; Adjust top, right, bottom, and left padding */
    margin-left: 25px;
    margin-right: 25px;

    margin-top: 20px;
}

.card-body h3 {
    font-weight: 400;
    font-size: 20px;
    color: black;
    margin-bottom: 10px;
    /* Adjust the margin bottom for the heading */
}

.form-label {
    font-size: 16px;
}

.form-control-lg {
    font-size: 14px;
    /* Adjust the font size of form controls */
}

.btn-primary {
    background-color: #3f51b5 !important;
}

/* Add styles for the login form */
#loginform {
    max-width: 400px;
    /* Set the maximum width of the login form */
    margin: 0 auto;
    /* Center the form horizontally */
}

#loginform .form-control-lg {
    margin-bottom: 15px;
    /* Adjust the margin bottom for form controls */
}
</style>
<div class="bg-light">
    <section class="gradient-custom bg-light">
        <div class="container py-5 h-100 form">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card card-registration">
                        <div class="card-body"
                            style="background-color: #FFFFFF; border-radius: 15px; width: -webkit-fill-available; font-size: 14px;">
                            <!-- Card body content goes here -->
                            <div class="d-flex justify-content-center">
                                <a class="mx-4" href="./index.php"
                                    style="font-size: 36px; display: inline-block; font-weight: bolder; margin-bottom: 10px; color: #3f51b5; margin-top:20px">EDUTO</a>
                            </div>
                            <h3 class="text-center mb-4" style="font-weight: 400; font-size: 20px; color: black;">Login
                                to
                                Your Account</h3>

                            <form id="form" novalidate="novalidate" class="form" action="Actions/login.php"
                                method="POST">
                                <!-- Your login form fields go here -->
                                <div class="mb-3">
                                    <input type="email" class="form-control form-control-lg" id="email" name="email"
                                        placeholder="Email" style="font-size: 16px; margin-top: 50px;">
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control form-control-lg" id="password"
                                        name="password" placeholder="Password"
                                        style="font-size: 16px; ; margin-top: 20px;">
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
                                        confirmed, <a href="#" style="color: black;">click here</a> to resend email.</p>
                                </div>
                                <div
                                    style="display: flex; justify-content: space-between; align-items: center; margin-top: 25px;">
                                    <a href="register.php"
                                        style="font-weight: bolder; text-decoration: none; color: #3f51b5;">Create
                                        Account</a>
                                    <div class="submit">
                                        <button name="login" type="submit"
                                            class="btn btn-primary btn-md waves-effect waves-light button"
                                            style="background-color: #3f51b5; margin-bottom:30px">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include('footer.php') ?>