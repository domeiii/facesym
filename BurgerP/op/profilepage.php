<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Julia Flath">
    <meta name="keywords" content="Facesym">
    <meta name="description" content="Onlinegame Facesymetry">
    <title>FaceSym</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <!-- scales the page ( for mobile) -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="/styles/style.css">
    <link rel="stylesheet" href="/styles/styles_profile.css">
    <?php session_start(); ?>
</head>

<header>

    <!-- Navbar -->
    <nav class="navbar navbar-default">
        <a href="/index.php"><img src="/images/logo.png" alt="FaceSym Logo" id="beginning" width="224" height="64"></a>

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

</header>


<!--load function-->
<script>
    $(document).ready(function () {
        $('a[id=click1]').click(function () {
            event.preventDefault();
            $("#div1").load("Skills.php");
        });
    });
    $(document).ready(function () {
        $('a[id=click2]').click(function () {
            event.preventDefault();
            $("#div1").load("highscore.php");
        });
    });
    $(document).ready(function () {
        $('a[id=click3]').click(function () {
            event.preventDefault();
            $("#div1").load("achievements.php");
        });
    });

    $(document).ready(function () {
        $('a[id=click4]').click(function () {
            event.preventDefault();
            $("#div1").load("settings.php");
        });
    });

</script>
<body>
<?php
require_once 'inc/defines.inc.php';
if(!isset ($_SESSION['username'])){
    header("Location: ./login.php");
}

$con=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
$username = $_SESSION['username'];
$userid = $_SESSION['userid'];#
$query = sprintf("SELECT * FROM users
    WHERE id='%s'", mysqli_real_escape_string($con,$userid));
$result = mysqli_query($con,$query);
if (!$result) {
    $message  = 'Ung�ltige Abfrage: ' . mysqli_error($con) . "\n";
    $message .= 'Gesamte Abfrage: ' . $query;
    die($message);
}
while ($row = mysqli_fetch_assoc($result)) {
    $email = $row['email'];
    $country = $row['country'];
    $sex = $row['sex'];
    $age = $row['age'];
    $registed = $row['created_at'];
}
mysqli_free_result($result);
$query2 = sprintf("SELECT * FROM user_stat
    WHERE usersid='%s'", mysqli_real_escape_string($con,$userid));
$result2 = mysqli_query($con,$query2);
if (!$result2) {
    $message  = 'Ung�ltige Abfrage: ' . mysqli_error($con) . "\n";
    $message .= 'Gesamte Abfrage: ' . $query;
    die($message);
}
while ($row2 = mysqli_fetch_assoc($result2)) {
    $totalgames = $row2['games_p'];
}
mysqli_free_result($result2);

?>

<!-- First Container -->
<!--
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
-->

<div class="container">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                   <?php if($sex=='male') {?> <img src="/images/profilepicture.jpg" alt="FaceSym Logo" width="1024" height="1024">
                   <?php } else { ?>
                       <img src="/images/profilepicture_w.jpg" alt="FaceSym Logo" width="1024" height="1024">
                    <?php } ?>


                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                      <?php echo "<a href=profilepage.php>".  $_SESSION['username']." </a>" ?>
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li>
                            <a href="Skills.php" id="click1">
                                <i class="glyphicon glyphicon-ok"></i>
                                Skills </a>
                        </li>
                        <li>
                            <a href="highscore.php" id="click2">
                                <i class="glyphicon glyphicon-ok"></i>
                                Highscores </a>
                        </li>
                        <li>
                            <a href="Achievements.php" id="click3">
                                <i class="glyphicon glyphicon-ok"></i>
                                Achievements </a>
                        </li> 
                        <!--<li>
                            <a href="settings.php" id="click4">
                                <i class="glyphicon glyphicon-ok"></i>
                                Settings </a>
                        </li>-->
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>
        <div class="col-md-9" id="div1">
            <div class="profile-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <h3>Welcome to your profile page!</h3>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-header">
                            <h3><strong>Username: </strong> <?php echo $username ?> </h3>
                        </div>

                        <div class="panel-body">
                            <p><strong> E-Mail: </strong> <?php echo $email ?></p>
                            <p><strong> Country: </strong> <?php echo $country ?> </p>
                            <p><strong> Sex: </strong><?php echo $sex ?> </p>
                            <p><strong> Age: </strong><?php echo $age?></p>
                            <p><strong> Registered since: </strong><?php echo $registed?></p>
                            <p><strong> Total Games: </strong><?php echo $totalgames?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>


</body>
<!-- Footer -->
<footer class="text-center">
    <a class="up-arrow" href="#beginning" data-toggle="tooltip" title="TO TOP">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </a><br><br>
    <p><a href="mailto:S1510238016@students.fh-hagenberg.at?subject=Feedback%20FaceSym&amp;body=Liebes%20Pro3-Team,">
            <address>Wishes, suggestions, complaints,...?!</address>
        </a>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/de_DE/sdk.js#xfbml=1&version=v2.8";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
<br>
    <style>
        .fb-like{
            float: none;!important;
        }
    </style>
    <div class="fb-like" data-href="http://face-sym.projekte.fh-hagenberg.at/index.php" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>

    <br><br>
    <address><a id="autor">© Julia Flath, Dominik Kolberger, Matthias Roiss, Belinda Thaler</a><br></address>
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
    var width = $(window).width();
    $(window).resize(function () {
        if ($(this).width() < 756) {
            width = $(this).width();
            console.log(width);
            var logo = document.getElementById("beginning");
            logo.style.opacity = 0;
        } else if ($(this).width() < 1000 && $(this).width() > 756) {
            width = $(this).width();
            console.log(width);
            var logo = document.getElementById("beginning");
            logo.style.opacity = 0.15;
        } else {
            width = $(this).width();
            console.log(width);
            var logo = document.getElementById("beginning");
            logo.style.opacity = 100;
        }
    });
</script>
</header>
</html>
