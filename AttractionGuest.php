<?php
session_start();
$email = "";
$password = "";
if (isset($_POST["login-email"])&&isset($_POST["login-password"])) {
    $email = $_POST["login-email"];
    $password = $_POST["login-password"];


    $emailresult = check_login_email($email);


    if ($emailresult == "") {
        ?>

        <div class="alert alert-danger">
            <strong>no matched email or password!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <?php
    } else {
        $passwordresult = check_login_password($password);
        if($passwordresult == ""){
            ?>

            <div class="alert alert-danger">
                <strong>no matched email or password!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?php
        }
        else {
            ?>


            <div class="alert alert-success">
                <strong>login successfully</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>



            <?php
            $_SESSION['ismember']=1;
            $_SESSION['email']=$email;
            $_SESSION['firstName'] = "";
            $_SESSION['lastName']="";
            $_SESSION['fullName']="";
            $_SESSION['phoneNumber']="";
            $_SESSION['country']="";
            $_SESSION['bio']="";
            header("Location:AttractionUser.php");
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/d2dd247174.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Attraction.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Rajdhani:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet"> <meta charset="UTF-8">


    <script src="https://kit.fontawesome.com/d2dd247174.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Rajdhani:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet"> <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Outdoors</title>
</head>

<body style="margin-top: 60px;">
<header>
<!--    navbar-->
    <nav class="navbar navbar-expand-sm navbar-fixed-top myNavbar mt-5">
        <button class="navbar-toggler show-hided  fa fa-bars btn" style="margin-top: 10px;margin-left: 10px;" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container-fluid collapse navbar-collapse" id="collapsibleNavbar">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Outdoors</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="travelGuest.php">Home</a></li>
                <li><a href="#">Attraction</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!--                signup -->
                <li><a data-toggle="modal" data-target="#exampleModal" href="#"> <span
                        class=" glyphicon glyphicon-user "> </span>Sign Up</a></li>
                <!--                sign in-->
                <li><a data-toggle="modal" data-target="#exampleModalCenter" href="#"><span
                        class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </nav>
    <!--    /navbar-->

    <!--      sign in   -->
    <div class="modal fade sign-in" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title " style="display: inline-block" id="exampleModalLongTitle">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="shape">
                        <div class="form-outline mb-4 control-container">
                            <label class="form-label " for="form2Example1">Email address</label>
                            <input type="email" id="form2Example1" class="form-control"/>
                        </div>
                        <!-- Password input -->
                        <div class="form-outline mb-4 control-container">
                            <label class="form-label" for="form2Example2">Password</label>
                            <input type="password" id="form2Example2" class="form-control"/>
                        </div>

                        <!-- 2 column grid layout for inline styling -->
                        <div class="row mb-4 control-container">
                            <div class="col d-flex justify-content-center">
                                <!-- Checkbox -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="form2Example31"
                                           checked/>
                                    <label class="form-check-label" for="form2Example31"> Remember me </label>
                                </div>
                            </div>

                            <div class="col">
                                <!-- forgetting password -->
                                <a href="#!">Forgot password?</a>
                            </div>
                        </div>

                        <!-- Submit button -->
                        <button type="button" class="btn btn-block mb-4 control-container main-color">Sign
                            in
                        </button>

                        <!-- Register buttons -->
                        <div class="text-center">
                            <p>Not a member? <a class="btn" data-toggle="modal" data-target="#exampleModal"
                                                class="close" data-dismiss="modal" aria-label="Close"
                                                href="#">Register</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--      /sign in   -->

    <!--      register   -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 style="display: inline-block">Sign Up</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="signup-form popup-design">
                        <p>Please fill in this form to create an account!</p>
                        <form action="/examples/actions/confirmation.php" method="post">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-6"><input type="text" class="form-control" name="first_name"
                                                                 placeholder="First Name" required="required"></div>
                                    <div class="col-xs-6"><input type="text" class="form-control" name="last_name"
                                                                 placeholder="Last Name" required="required"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email"
                                       required="required">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password"
                                       required="required">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="confirm_password"
                                       placeholder="Confirm Password" required="required">
                            </div>
                            <div class="form-group">
                                <label class="checkbox-inline"><input type="checkbox" required="required"> I accept the
                                    <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg">Sign Up</button>
                            </div>
                        </form>
                        <div class="hint-text">Already have an account? <a class="btn " data-toggle="modal"
                                                                           data-target="#exampleModalCenter"
                                                                           class="close" data-dismiss="modal" href="#">Login
                            here</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--      /register  -->

</header>

<div class="attraction text-center mt-4"style="margin-top: 50px">
    <div class="container mt-4">
        <div class="main-title position-relative">
            <img src="pics/icons/topDest.png">
            <h2 class="mt-4 pt-4 d-block">Top Destination</h2>
            <p>Some text</p>
        </div>

    </div>

</div>
<div class="Destenation text-center">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-3 imgpadding">
            <div class="box bg-white"  style="margin: 5px;padding-bottom: 0px;" data-work="London">
                <a style="width:100%; height: 100%; position: absolute " data-toggle="modal" data-target="#edit-delete" href="#"></a>
                <img src="pics/attraction/londn.jpeg" alt="" class="img-fluid">
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 imgpadding">
            <div class="box bg-white"  style="margin: 5px;padding-bottom: 0px;" data-work="Maldives">
                <a style="width:100%; height: 100%; position: absolute " data-toggle="modal" data-target="#edit-delete" href="#"></a>
                <img src="pics/attraction/maldives.jpg" alt="" class="img-fluid">
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 imgpadding">
            <div class="box bg-white"  style="margin: 5px;padding-bottom: 0px;" data-work="Berlin">
                <a style="width:100%; height: 100%; position: absolute " data-toggle="modal" data-target="#edit-delete" href="#"></a>
                <img src="pics/attraction/berlin.jpg" alt="" class="img-fluid">
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 imgpadding">
            <div class="box bg-white"  style="margin: 5px;padding-bottom: 0px;" data-work="Humburg">
                <a style="width:100%; height: 100%; position: absolute " data-toggle="modal" data-target="#edit-delete" href="#"></a>
                <img src="pics/attraction/humburg.jpg" alt="" class="img-fluid">
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 imgpadding">
            <div class="box bg-white"  style="margin: 5px;padding-bottom: 0px;" data-work="Istanbul">
                <a style="width:100%; height: 100%; position: absolute " data-toggle="modal" data-target="#edit-delete" href="#"></a>
                <img src="pics/attraction/istanbul.jpg" alt="" class="img-fluid">
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 imgpadding">
            <div class="box bg-white"  style="margin: 5px;padding-bottom: 0px;" data-work="Oslo">
                <a style="width:100%; height: 100%; position: absolute " data-toggle="modal" data-target="#edit-delete" href="#"></a>
                <img src="pics/attraction/oslo.jpg" alt="" class="img-fluid">
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 imgpadding">
            <div class="box bg-white"  style="margin: 5px;padding-bottom: 0px;" data-work="Palermo">
                <a style="width:100%; height: 100%; position: absolute " data-toggle="modal" data-target="#edit-delete" href="#"></a>
                <img src="pics/attraction/palermo.jpg" alt="" class="img-fluid">
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 imgpadding">
            <div class="box bg-white"  style="margin: 5px;padding-bottom: 0px;" data-work="Paris">
                <a style="width:100%; height: 100%; position: absolute " data-toggle="modal" data-target="#edit-delete" href="#"></a>
                <img src="pics/attraction/paris.jpg" alt="" class="img-fluid">
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 imgpadding">
            <div class="box bg-white"  style="margin: 5px;padding-bottom: 0px;" data-work="Pula">
                <a style="width:100%; height: 100%; position: absolute " data-toggle="modal" data-target="#edit-delete" href="#"></a>
                <img src="pics/attraction/pula.jpg" alt="" class="img-fluid">
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 imgpadding">
            <div class="box bg-white"  style="margin: 5px;padding-bottom: 0px;" data-work="Rome">
                <a style="width:100%; height: 100%; position: absolute " data-toggle="modal" data-target="#edit-delete" href="#"></a>
                <img src="pics/attraction/rome.jpg" alt="" class="img-fluid">
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 imgpadding">
            <div class="box bg-white"  style="margin: 5px;padding-bottom: 0px;" data-work="Sofia">
                <a style="width:100%; height: 100%; position: absolute " data-toggle="modal" data-target="#edit-delete" href="#"></a>
                <img src="pics/attraction/sofia.jpg" alt="" class="img-fluid">
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 imgpadding">
            <div class="box bg-white"  style="margin: 5px;padding-bottom: 0px;" data-work="Stockholm">
                <a style="width:100%; height: 100%; position: absolute " data-toggle="modal" data-target="#edit-delete" href="#"></a>
                <img src="pics/attraction/stockholm.jpg" alt="" class="img-fluid">
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 imgpadding">
            <div class="box bg-white"  style="margin: 5px;padding-bottom: 0px;" data-work="Vienna">
                <a style="width:100%; height: 100%; position: absolute " data-toggle="modal" data-target="#edit-delete" href="#"></a>
                <img src="pics/attraction/veina.jpg" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</div>

</body>
</html>