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


