<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Julia Flath">
    <meta name="keywords" content="Facesym">
    <meta name="description" content="Onlinegame Facesymetry">
    <title>FaceSym</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
</head>
<body class="container_12">

<header>
    <ul>
        <a href="index.html" class="menue">Home</a>
        <a href="info.html" class="menue">Info</a>

        <img src="images/logo.png" alt="FaceSym Logo" width="224" height="64">

        <a href="login.html" class="menue">Login</a>
        <a href="profile.html" class="menue">Profile</a>

    </ul>
    <div><input class="search" placeholder="Search" /></div>

</header>
<nav>
    <div><h1 id="beginning"><strong>FaceSym</strong></h1></div>
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
<footer>
    <p><a href="#anfang" id="small">Nach oben</a></p>
    <a href="mailto:S1510238016@students.fh-hagenberg.at?subject=Feedback%20FaceSym&amp;body=Liebes%20Pro3-Team,"><address>Wishes, suggestions, complaints,...?!</address></a> <br>
    <br><address><a id="autor">© Julia Flath, Dominik Kolberger, Matthias Roiss, Belinda Thaler</a><br></address>

</footer>
</body>
</html>

