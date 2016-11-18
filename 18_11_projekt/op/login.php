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
$pdo = new PDO('mysql:host=localhost;dbname=facesym', 'facesym', 'vhzbYHE6#3F');
?>
<!-- REGISTER FORM -->
<div class="container-fluid">
    <divs class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-4">
            <div class="panel panel-info text-center">
                <div class="panel-heading">
                    <h2>Registration</h2>
                </div>
                <div class="panel-body">
                    <form id="register" method="post" action=register.php>
                        <p><?php echo isset($_GET["msg"])?$_GET["msg"]:"";?></p>
                        <input name="username" type="text" placeholder="What's your username?" pattern="^[\w]{3,16}$"
                               autofocus="autofocus" required="required" class="input pass"/>
                        <input name="email" type="email" placeholder="Email address" class="input pass"/>
                        <input name="passwort" type="password" placeholder="Choose a password" required="required"
                               class="input pass"/>
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
                            <select class="input pass" id="sel1" required="required" name="sex">
                                <option value="">Choose your sex</option>
                                <option value="female">Female</option>
                                <option value="male">Male</option>
                            </select>
                        </div>
                        <div class="input-daterange input-group" id="datepicker">
                            <input type="text" class="input-sm form-control" name="date"
                                   placeholder="Select birthdate"/>
                        </div>
                        <input type="submit" value="Abschicken" class="inputButton"/>

                    </form>
                </div>
            </div>
        </div>

        <!--col-md-6-->

        <div class="col-sm-4">
            <div class="panel panel-info text-center">
                <div class="panel-heading">
                    <h2>Login</h2>
                </div>
                <div class="panel-body">
                    <form id="login" method="post" action="loginform.php">
                        <p><?php echo isset($_GET["esg"])?$_GET["esg"]:"";?></p>
                        <input name="username" type="text" placeholder="Username" class="input pass" required="required" autofocus="autofocus"/>
                        <input name="passwort" type="password" placeholder="Password" required="required"
                               class="input pass" autofocus="autofocus"/>
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
