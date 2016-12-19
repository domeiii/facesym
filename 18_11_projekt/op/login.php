<!DOCTYPE html>
<html lang="de" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Julia Flath">
    <meta name="keywords" content="Facesym">
    <meta name="description" content="Onlinegame Facesymetry">
    <title>FaceSym</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- scales the page ( for mobile) -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="../build/js/countrySelect.min.js"></script>


    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker3.min.css">
    <script type='text/javascript'
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="../build/css/countrySelect.css">
    <link rel="stylesheet" href="/styles/style.css">
    <link rel="stylesheet" href="/styles/styles_login.css">


    <script type='text/javascript'>
        $(function () {
            $('.input-daterange').datepicker({
                autoclose: true
            });

        });
    </script>



</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-default">
    <img src="/images/logo.png" alt="FaceSym Logo" id="beginning" width="224" height="64">

    <div class="container">

        <div class="navbar-header">
            <ul class="nav navbar-nav navbar-left">

                <li><a href="../index.php">Home</a></li>
                <li><a></a></li>
                <li><a href="info.html">Info</a></li>
            </ul>

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>

        <div class="collapse navbar-collapse" id="myNavbar">


            <ul class="nav navbar-nav navbar-right">

                <li><a href="login.php">Login</a></li>
                <li><a></a></li>
                <li><a href="profilepage.php">Profile</a></li>
            </ul>
        </div>
    </div>
</nav>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=facesym', 'root', '');
session_start();

if (isset ($_SESSION['username'])) {
    header("Location: ./red.php");
}

?>
<!-- REGISTER FORM -->
<div class="container-fluid">
    <divs class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-4">
            <div class="panel panel-info text-center">
                <div class="panel-heading">
                    <h2>Login</h2>
                </div>
                <div class="panel-body">
                    <form id="login" method="post" action="loginform.php">
                        <?php if(isset($_SESSION['generalError'])) { echo "<p>" . $_SESSION['generalError'] . "</p>"; unset($_SESSION['generalError']);} ?>
                        <input name="username" type="text" placeholder="Username" class="input pass" required="required" autofocus="autofocus"/>
                        <?php if(isset($_SESSION['usernameErrorLogin'])) { echo "<p>" . $_SESSION['usernameErrorLogin'] . "</p>"; unset($_SESSION['usernameErrorLogin']);} ?>
                        <input name="passwort" type="password" placeholder="Password" required="required"
                               class="input pass" autofocus="autofocus"/>
                        <?php if(isset( $_SESSION['pwdErrorLogin'])) { echo "<p>" .  $_SESSION['pwdErrorLogin'] . "</p>"; unset($_SESSION['pwdErrorLogin']);} ?>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="form-check-input" value="remember-me" name="angemeldet_bleiben" checked >
                                Stay logged in
                            </label>
                        </div>
                        <input type="submit" value="Einloggen!" class="inputButton"/>
                    </form>
                </div>
            </div>

        </div>

        <!--col-md-6-->

        <div class="col-sm-4">
            <div class="panel panel-info text-center">
                <div class="panel-heading">
                    <h2>Registration</h2>
                </div>
                <div class="panel-body">
                    <form id="register" method="post" action=register.php>
                        <?php if(isset($_SESSION[1])) { echo $_SESSION[1]; } ?>
                        <input name="username" type="text" placeholder="What's your username?" pattern="^[\w]{3,16}$"
                               autofocus="autofocus" required="required" class="input pass"/><?php if(isset($_SESSION['usernameError'])) { echo "<p>" . $_SESSION['usernameError'] . "</p>"; unset($_SESSION['usernameError']);} ?>
                        <input name="email" type="email" placeholder="Email address" class="input pass"/> <?php if(isset($_SESSION['mailError'])) { echo "<p>" . $_SESSION['mailError'] . "</p>"; unset($_SESSION['mailError']);} ?>
                        <input name="passwort" type="password" placeholder="Choose a password" required="required"
                               class="input pass"/><?php if(isset($_SESSION['pwdError'])) { echo "<p>" .$_SESSION['pwdError'] . "</p>"; unset($_SESSION['pwdError']); } ?>
                        <input name="passwort2" type="password" placeholder="Confirm password" required="required"
                               class="input pass"/>
                        <div class="form-group">
                            <input type="hidden" id="country_code"/>
                            <input name="country" type="text" placeholder="Pick your country?" id="country"
                                   required="required" class="input pass"/>
                        </div>
                        <script>
                            $("#country").countrySelect();
                        </script>
                        <div class="form-group">
                            <select class="input pass" id="sel1" required="required" name="sex"><?php if(isset( $_SESSION['sexError'])) { echo  "<p>" .$_SESSION['sexError'] . "</p>"; unset($_SESSION['sexError']);} ?>
                                <option value="">Choose your sex</option>
                                <option value="female">Female</option>
                                <option value="male">Male</option>
                            </select>
                        </div>
                        <input name="age" type="number" placeholder="Current age" class="input pass"/><?php if(isset( $_SESSION['ageError'])) { echo  "<p>" .$_SESSION['ageError'] . "</p>"; unset($_SESSION['ageError']);} ?>
                        <input type="submit" value="Abschicken" class="inputButton"/>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-2"></div>
    </divs>
</div>

<script type="text/javascript">

</script>


<!-- Footer -->
<footer class="text-center">
    <a class="up-arrow" href="#beginning" data-toggle="tooltip" title="TO TOP">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </a><br><br>
    <p><a href="mailto:S1510238016@students.fh-hagenberg.at?subject=Feedback%20FaceSym&amp;body=Liebes%20Pro3-Team,">
        <address>Wishes, suggestions, complaints,...?!</address>
    </a> <br>
        <br>
    <address><a id="autor">� Julia Flath, Dominik Kolberger, Matthias Roiss, Belinda Thaler</a><br></address>
    </p>
</footer>

<script>
    $(document).ready(function () {
        // Initialize Tooltip
        $('[data-toggle="tooltip"]').tooltip();
        // Add smooth scrolling to all links in navbar + footer link
        $(".navbar a, footer a[href='#beginning']").on('click', function (event) {
            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();
                // Store hash
                var hash = this.hash;
                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 900, function () {
                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
        });
    })
</script>

<script>
    $(document).ready(function () {
        // Initialize Tooltip
        $('[data-toggle="tooltip"]').tooltip();
        // Add smooth scrolling to all links in navbar + footer link
        $(".navbar a, footer a[href='#beginning']").on('click', function (event) {
            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();
                // Store hash
                var hash = this.hash;
                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 900, function () {
                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
        });
    })
</script>

</body>
</html>
