

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
/**
 * Created by PhpStorm.
 * User: Belinda
 * Date: 09.12.2016
 * Time: 14:43
 */
session_start();

if (isset ($_SESSION['username'])) {
echo "Sie sind bereits eingeloggt. Möchten Sie sich"?><a href="logout.php">ausloggen</a><?php echo "?";
} else {
    echo "";
}?>

<!-- Footer -->
<footer class="text-center">
    <a class="up-arrow" href="#beginning" data-toggle="tooltip" title="TO TOP">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </a><br><br>
    <p><a href="mailto:S1510238016@students.fh-hagenberg.at?subject=Feedback%20FaceSym&amp;body=Liebes%20Pro3-Team,">
            <address>Wishes, suggestions, complaints,...?!</address>
        </a> <br>
        <br>
    <address><a id="autor">© Julia Flath, Dominik Kolberger, Matthias Roiss, Belinda Thaler</a><br></address>
    </p>
</footer>

</body>
</html>
