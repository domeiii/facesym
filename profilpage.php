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

    <link rel="stylesheet" href="style.css">
    <?php session_start(); ?>
</head>
<style>
    body {
        background: #f8f8f8;
    }

    /* Profile container */
    .profile {
        margin: 20px 0;
    }

    /* Profile sidebar */
    .profile-sidebar {
        padding: 20px 0 10px 0;
        background: #fff;
    }

    .profile-userpic img {
        float: none;
        margin: 0 auto;
        width: 50%;
        height: 50%;
        -webkit-border-radius: 50% !important;
        -moz-border-radius: 50% !important;
        border-radius: 50% !important;
    }

    .profile-usertitle {
        text-align: center;
        margin-top: 20px;
    }

    .profile-usertitle-name {
        color: #5a7391;
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 7px;
    }

    .profile-usertitle-job {
        text-transform: uppercase;
        color: #5b9bd1;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .profile-userbuttons {
        text-align: center;
        margin-top: 10px;
    }

    .profile-userbuttons .btn {
        text-transform: uppercase;
        font-size: 11px;
        font-weight: 600;
        padding: 6px 15px;
        margin-right: 5px;
    }

    .profile-userbuttons .btn:last-child {
        margin-right: 0px;
    }

    .profile-usermenu {
        margin-top: 30px;
    }

    .profile-usermenu ul li {
        border-bottom: 1px solid #f0f4f7;
    }

    .profile-usermenu ul li:last-child {
        border-bottom: none;
    }

    .profile-usermenu ul li a {
        color: #93a3b5;
        font-size: 14px;
        font-weight: 400;
    }

    .profile-usermenu ul li a i {
        margin-right: 8px;
        font-size: 14px;
    }

    .profile-usermenu ul li a:hover {
        background-color: #fafcfd;
        color: #5b9bd1;
    }

    .profile-usermenu ul li.active {
        border-bottom: none;
    }

    .profile-usermenu ul li.active a {
        color: #5b9bd1;
        background-color: #f6f9fb;
        border-left: 2px solid #5b9bd1;
        margin-left: -2px;
    }

    /* Profile Content */
    .profile-content {
        padding: 20px;
        background: #fff;
        min-height: 460px;
    }

    .h3_points {
        text-align: center;
    }

    .progress {
        height: 20px;
        margin-bottom: 20px;
        overflow: hidden;
        background-color: #f5f5f5;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
    }

    .progress {
        background-image: -webkit-gradient(linear, left 0, left 100%, from(#ebebeb), to(#f5f5f5));
        background-image: -webkit-linear-gradient(top, #ebebeb 0, #f5f5f5 100%);
        background-image: -moz-linear-gradient(top, #ebebeb 0, #f5f5f5 100%);
        background-image: linear-gradient(to bottom, #ebebeb 0, #f5f5f5 100%);
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffebebeb', endColorstr='#fff5f5f5', GradientType=0);
    }

    .progress {
        height: 12px;
        background-color: #ebeef1;
        background-image: none;
        box-shadow: none;
    }

    .progress-bar {
        float: left;
        width: 0;
        height: 100%;
        font-size: 12px;
        line-height: 20px;
        color: #fff;
        text-align: center;
        background-color: #428bca;
        -webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
        box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
        -webkit-transition: width .6s ease;
        transition: width .6s ease;
    }

    .progress-bar {
        background-image: -webkit-gradient(linear, left 0, left 100%, from(#428bca), to(#3071a9));
        background-image: -webkit-linear-gradient(top, #428bca 0, #3071a9 100%);
        background-image: -moz-linear-gradient(top, #428bca 0, #3071a9 100%);
        background-image: linear-gradient(to bottom, #428bca 0, #3071a9 100%);
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff428bca', endColorstr='#ff3071a9', GradientType=0);
    }

    .progress-bar {
        box-shadow: none;
        border-radius: 3px;
        background-color: #0090D9;
        background-image: none;
        -webkit-transition: all 1000ms cubic-bezier(0.785, 0.135, 0.150, 0.860);
        -moz-transition: all 1000ms cubic-bezier(0.785, 0.135, 0.150, 0.860);
        -ms-transition: all 1000ms cubic-bezier(0.785, 0.135, 0.150, 0.860);
        -o-transition: all 1000ms cubic-bezier(0.785, 0.135, 0.150, 0.860);
        transition: all 1000ms cubic-bezier(0.785, 0.135, 0.150, 0.860);
        -webkit-transition-timing-function: cubic-bezier(0.785, 0.135, 0.150, 0.860);
        -moz-transition-timing-function: cubic-bezier(0.785, 0.135, 0.150, 0.860);
        -ms-transition-timing-function: cubic-bezier(0.785, 0.135, 0.150, 0.860);
        -o-transition-timing-function: cubic-bezier(0.785, 0.135, 0.150, 0.860);
        transition-timing-function: cubic-bezier(0.785, 0.135, 0.150, 0.860);
    }

    .progress-bar-success {
        background-image: -webkit-gradient(linear, left 0, left 100%, from(#5cb85c), to(#449d44));
        background-image: -webkit-linear-gradient(top, #5cb85c 0, #449d44 100%);
        background-image: -moz-linear-gradient(top, #5cb85c 0, #449d44 100%);
        background-image: linear-gradient(to bottom, #5cb85c 0, #449d44 100%);
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff5cb85c', endColorstr='#ff449d44', GradientType=0);
    }

    .progress-bar-success {
        background-color: #0AA699;
        background-image: none;
    }

    .progress-bar-info {
        background-image: -webkit-gradient(linear, left 0, left 100%, from(#5bc0de), to(#31b0d5));
        background-image: -webkit-linear-gradient(top, #5bc0de 0, #31b0d5 100%);
        background-image: -moz-linear-gradient(top, #5bc0de 0, #31b0d5 100%);
        background-image: linear-gradient(to bottom, #5bc0de 0, #31b0d5 100%);
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff5bc0de', endColorstr='#ff31b0d5', GradientType=0);
    }

    .progress-bar-info {
        background-color: #0090D9;
        background-image: none;
    }

    .progress-bar-warning {
        background-image: -webkit-gradient(linear, left 0, left 100%, from(#f0ad4e), to(#ec971f));
        background-image: -webkit-linear-gradient(top, #f0ad4e 0, #ec971f 100%);
        background-image: -moz-linear-gradient(top, #f0ad4e 0, #ec971f 100%);
        background-image: linear-gradient(to bottom, #f0ad4e 0, #ec971f 100%);
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fff0ad4e', endColorstr='#ffec971f', GradientType=0);
    }

    .progress-bar-warning {
        background-color: #FDD01C;
        background-image: none;
    }

    .progress-bar-danger {
        background-image: -webkit-gradient(linear, left 0, left 100%, from(#d9534f), to(#c9302c));
        background-image: -webkit-linear-gradient(top, #d9534f 0, #c9302c 100%);
        background-image: -moz-linear-gradient(top, #d9534f 0, #c9302c 100%);
        background-image: linear-gradient(to bottom, #d9534f 0, #c9302c 100%);
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffd9534f', endColorstr='#ffc9302c', GradientType=0);
    }

    .progress-bar-danger {
        background-color: #F35958;
        background-image: none;
    }

    .points {
        color: #0aa699;
        font-weight: bold;
    }

    .panel-body {
        text-align: left;
    }
</style>

<header>

    <!-- Navbar -->
    <nav class="navbar navbar-default">
        <a href="facesym.html"><img src="images/logo.png" alt="FaceSym Logo" id="beginning" width="224" height="64"></a>

        <div class="container">

            <div class="navbar-header">
                <ul class="nav navbar-nav navbar-left">

                    <li><a href="index.html">Home</a></li>
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

                    <li><a href="login.html">Login</a></li>
                    <li><a></a></li>
                    <li><a href="profile.html">Profile</a></li>
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
            $("#div1").load("skills.html");
        });
    });
    $(document).ready(function () {
        $('a[id=click2]').click(function () {
            event.preventDefault();
            $("#div1").load("highscores.html");
        });
    });
    $(document).ready(function () {
        $('a[id=click3]').click(function () {
            event.preventDefault();
            $("#div1").load("achievements.html");
        });
    });
</script>
<body>
<?php
$con=mysqli_connect("localhost","root","","facesymtest");
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
    $date = $row['date'];
    $registed = $row['created_at'];
}
mysqli_free_result($result);

$query2 = sprintf("SELECT * FROM user_stat
    WHERE userid='%s'", mysqli_real_escape_string($con,$userid));
$result2 = mysqli_query($con,$query2);

if (!$result2) {
    $message  = 'Ung�ltige Abfrage: ' . mysqli_error($con) . "\n";
    $message .= 'Gesamte Abfrage: ' . $query;
    die($message);
}

while ($row2 = mysqli_fetch_assoc($result2)) {
    $totalgames = $row2['questions_answered'];
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
                    <img src="images/profilepicture.jpg" alt="FaceSym Logo" width="1024" height="1024">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        Username
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li>
                            <a href="skills.html" id="click1">
                                <i class="glyphicon glyphicon-ok"></i>
                                Skills </a>
                        </li>
                        <li>
                            <a href="highscores.html" id="click2">
                                <i class="glyphicon glyphicon-ok"></i>
                                Highscores </a>
                        </li>
                        <li>
                            <a href="Achievements.html" id="click3">
                                <i class="glyphicon glyphicon-ok"></i>
                                Achievements </a>
                        </li>
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
                            <h3>Herzlich Willkommen auf Deiner Profilseite</h3>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-header" style="margin-left: -12%">
                                <h3><strong>Username: </strong> <?php echo $username ?> </h3>
                            </div>

                            <div class="panel-body" style="margin-left: 30%">
                                <p><strong> E-Mail: </strong> <?php echo $email ?></p>
                                <p><strong> Country: </strong> <?php echo $country ?> </p>
                                <p><strong> Sex: </strong><?php echo $sex ?> </p>
                                <p><strong> Birthdate: </strong><?php echo $date?></p>
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
        </a> <br>
        <br>
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
