<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDUKO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/RegisterScreenStyles.css">
</head>

<body class="gradient-custom form">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card card-registration">
                    <div class="card-body p-4 p-md-5 px-5 py-4">
                        <div class="d-flex justify-content-center">
                            <a class="navbar-brand mx-4" href="/"
                                style="font-size: 36px; display: inline-block; font-weight: bolder; margin-bottom: 10px; color: #3f51b5;">EDUTO</a>
                        </div>
                        <h3 class="text-center mb-4" style="font-weight: 400; font-size: 20px; color: black;">Register a
                            New Account</h3>

                        <form id="registerform" novalidate="novalidate" action="sign-up.php"
                            enctype="multipart/form-data">

                            <div class="validation-summary-valid text-danger" data-valmsg-summary="true">
                                <ul>
                                    <li style="display:none"></li>
                                </ul>
                            </div>
                            <div class="text-danger" id="regErr"></div>

                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="md-form form-lg md-outline">
                                        <label class="form-lg" for="Full Name" style="font-size: 16px;">Full
                                            Name</label>
                                        <input class="form-control form-control-lg" data-val="true"
                                            data-val-email="The Email field is not a valid e-mail address."
                                            data-val-required="The Name field is required." id="fullName"
                                            name="fullName" style="font-size: 16px;" type="text"
                                            placeholder="Full Name">
                                        <span class="field-validation-valid text-danger" data-valmsg-for="Email"
                                            data-valmsg-replace="true" style="font-size: 16px;"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="md-form form-lg md-outline">
                                        <label class="form-lg" for="role" style="font-size: 16px;">Role</label>
                                        <input class="form-control form-control-lg" data-val="true"
                                            data-val-email="The Email field is not a valid e-mail address."
                                            data-val-required="The Role field is required." id="role" name="role"
                                            style="font-size: 16px;" type="text" placeholder="Role">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="md-form form-lg md-outline">
                                        <label class="form-lg" for="email" style="font-size: 16px;">Email</label>
                                        <input class="form-control form-control-lg" data-val="true"
                                            data-val-email="The Email field is not a valid e-mail address."
                                            data-val-required="The Email field is required." id="email" name="email"
                                            style="font-size: 16px;" type="text" placeholder="Email">
                                        <span class="field-validation-valid text-danger" data-valmsg-for="email"
                                            data-valmsg-replace="true" style="font-size: 16px;"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="md-form form-lg md-outline">
                                        <label class="form-lg" for="RegNo" style="font-size: 16px;">Registration
                                            Number</label>
                                        <input class="form-control form-control-lg" data-val="true"
                                            data-val-required="The Registration Number field is required."
                                            id="registrationNumber" name="registrationNumber" required="required"
                                            style="font-size: 16px;" type="text" placeholder="Registration Number">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="md-form form-lg md-outline">
                                        <label class="form-lg" for="Password" style="font-size: 16px;">Password</label>
                                        <input class="form-control form-control-lg" data-val="true"
                                            data-val-length="The Password must be at least 6 characters long."
                                            data-val-length-max="100" data-val-length-min="6"
                                            data-val-required="The Password field is required." id="password"
                                            name="password" required="required" style="font-size: 16px;" type="password"
                                            placeholder="Password">
                                        <span class="field-validation-valid text-danger" data-valmsg-for="Password"
                                            data-valmsg-replace="true" style="font-size: 16px;"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="md-form form-lg md-outline">
                                        <label class="form-lg" for="ConfirmPassword" style="font-size: 16px;">Confirm
                                            password</label>
                                        <input class="form-control form-control-lg" data-val="true"
                                            data-val-equalto="The password and confirmation password do not match."
                                            data-val-equalto-other="*.Password" id="confirmPassword"
                                            name="confirmPassword" required="required" style="font-size: 16px;"
                                            type="password" placeholder="Confirm Password">
                                        <span class="field-validation-valid text-danger"
                                            data-valmsg-for="ConfirmPassword" data-valmsg-replace="true"
                                            style="font-size: 16px;"></span>
                                    </div>
                                </div>
                            </div>
                            <div
                                style="justify-content: space-between;flex-direction: row-reverse;display: flex;align-items: center;margin-top: 25px;">
                                <div class="submit">
                                    <button type="button" value="Register"
                                        class="btn btn-primary btn-md waves-effect waves-light" id="registerBtn"
                                        style="background-color: #3f51b5;">Register</button>
                                </div>
                                <a href="index.php"
                                    style="font-weight: bolder; text-decoration: none; color: #3f51b5;">Sign in
                                    instead</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="myModal" class="modal">
        <div class="modal-content">
            <div id="modalHeader" class="modal-header">
                <span class="close" id="modalCloseBtn">&times;</span>
            </div>
            <div id="modalContent" class="modal-body"></div>
        </div>
    </div>


    <script src="register.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>