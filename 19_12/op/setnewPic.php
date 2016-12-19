<?php
session_start();
require_once 'inc/defines.inc.php';
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
$getid = "SELECT MAX(idimages) FROM images";
$result = mysqli_query($conn, $getid);
$row = mysqli_fetch_row($result);
$highest_id = $row[0];
$random = rand(1, $highest_id);
$sql = "SELECT name FROM images WHERE idimages=$random";
$helper = mysqli_query($conn, $sql);
$image = mysqli_fetch_row($helper);
$user = $_SESSION['userid'];
//get sex from user
$getGender = "SELECT sex FROM users WHERE id=$user";
$genderH = mysqli_query($conn, $getGender);
$gender = mysqli_fetch_row($genderH);
//get sex from picture
$getGenderP = "SELECT gender FROM images WHERE idimages=$random";
$genderHP = mysqli_query($conn, $getGenderP);
$genderP = mysqli_fetch_row($genderHP);
$rand = rand(1,2);
$_SESSION["right"] = 0;
$_SESSION["wrong"] = 0;
$_SESSION["random"] = $rand;
$_SESSION["pictur"] = $image[0];
$_SESSION["gender"] = $gender[0];
$_SESSION["genderP"] = $genderP[0];
$_SESSION["games"] = 0;
$_SESSION["picid"] = $random;
mysqli_close($conn);
?>
