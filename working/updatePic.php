<?php
session_start();

$servername = "localhost";
$username = "root";
$password = '';
$dbname = "facesym";

$conn = mysqli_connect($servername, $username,$password, $dbname);
$getid = "SELECT MAX(idimages) FROM images";
$result = mysqli_query($conn, $getid);
$row = mysqli_fetch_row($result);
$highest_id = $row[0];

$random = rand(1, $highest_id);
$sql = "SELECT name FROM images WHERE idimages=$random";
$helper = mysqli_query($conn, $sql);
$image = mysqli_fetch_row($helper);


//get sex from picture
$getGenderP = "SELECT gender FROM images WHERE idimages=$random";
$genderHP = mysqli_query($conn, $getGenderP);
$genderP = mysqli_fetch_row($genderHP);

$rand = rand(1,2);

$_SESSION["random"] = $rand;
$_SESSION["pictur"] = $image[0];
$_SESSION["genderP"] = $genderP[0];
$_SESSION["games"] += 1;

mysqli_close($conn);

?>