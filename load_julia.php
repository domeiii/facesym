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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- scales the page ( for mobile) -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="style.css">

</head>

<!-- navbar right aligned-->
<div class="jumbotron">
    <h1>FaceSym</h1>
    <img src="images/logo.png" alt="FaceSym Logo" id="beginning" width="224" height="64">
</div>


<!-- <ul>
     <a href="index.html" class="menue">Home</a>
     <a href="info.html" class="menue">Info</a>

     <img src="images/logo.png" alt="FaceSym Logo" width="224" height="64">

     <a href="login.html" class="menue">Login</a>
     <a href="profile.html" class="menue">Profile</a>

 </ul>
 <div><input class="search" placeholder="Search" /></div>
-->
<!-- Navbar -->
<style>
    body {
        font: 20px Open Sans, Arial, sans-serif;
        line-height: 1.8;
        color: #f5f6f7;
    }
    p {font-size: 16px;}
    .margin {margin-bottom: 45px;}
    .bg-1 {
        background-color: white; /* Green */
        color: black;
    }
    .bg-2 {
        background-color: #474e5d; /* Dark Blue */
        color: #ffffff;
    }
    .bg-3 {
        background-color: #ffffff; /* White */
        color: #555555;
    }
    .bg-4 {
        background-color: #2f2f2f; /* Black Gray */
        color: #fff;
    }
    .container-fluid {
        padding-top: 70px;
        padding-bottom: 70px;
    }
    .navbar {
        padding-top: 15px;
        padding-bottom: 15px;
        border: 0;
        border-radius: 0;
        margin-bottom: 0;
        font-size: 12px;
        letter-spacing: 5px;
    }
    .navbar-nav  li a:hover {
        color: #1abc9c !important;
    }
</style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Home</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="info.html" class="menue">Info</a></li>
                <li><a href="login.html">Login</a></li>
                <li><a href="profile.html">Profile</a></li>
            </ul>
        </div>
    </div>
</nav>


<!-- First Container -->
<div class="container-fluid bg-1 text-center">
    <h3 class="margin">Which one is the original face?</h3>
    <img src="http://4.bp.blogspot.com/-IrWOatMo5fI/TWcF3Qx1I-I/AAAAAAAAASE/WnjJvDmW0XU/s1600/rand15.jpgg" class="img-responsive img-circle margin" style="display:inline" alt="Bird" width="350" height="350">
    <h3>....</h3>
</div>


<?php
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "images";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$getid = "SELECT MAX(id) FROM images";
$result = mysqli_query($conn, $getid);
$row = mysqli_fetch_row($result);
$highest_id = $row[0];

$random = rand(1, $highest_id);
$sql = "SELECT name FROM images where id=$random";
$helper = mysqli_query($conn, $sql);
$image = mysqli_fetch_row($helper);


$newrand = rand(1 , 1000);

if ($newrand > 499) {
    echo "<img src='".$image[0]."'/ width=\"250\" height=\"200\">";
    echo "<img src='".$image[0]."'/ width=\"250\" height=\"200\" style=\"transform:scaleX(-1)\">";
} else {
    echo "<img src='".$image[0]."'/ width=\"250\" height=\"200\" style=\"transform:scaleX(-1)\">";
    echo "<img src='".$image[0]."'/ width=\"250\" height=\"200\">";
}




?>
<nav>
    <div><h1><strong>FaceSym</strong></h1></div>
    <div class="clear"></div>
    <hr>
    <ul>
        <li><h2><em>Allgemein</em></h2></li>
    </ul>
</nav>
<main>
    <div>
        <article id="black">Willkommen auf der FaceSym Website.</article>
    </div>
    <div><p>Bitte logg' Dich ein um fortzufahren.</p>
    </div>

</main>

<footer>
    <p><a href="#beginning" id="small">Nach oben</a></p>
    <a href="mailto:S1510238016@students.fh-hagenberg.at?subject=Feedback%20FaceSym&amp;body=Liebes%20Pro3-Team,"><address>Wishes, suggestions, complaints,...?!</address></a> <br>
    <br><address><a id="autor">© Julia Flath, Dominik Kolberger, Matthias Roiss, Belinda Thaler</a><br></address>

</footer>
</body>
</html>

