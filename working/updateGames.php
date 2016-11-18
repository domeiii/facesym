<?php
session_start();

$servername = "localhost";
$username = "root";
$password = '';
$dbname = "facesym";
$conn = mysqli_connect($servername, $username,$password, $dbname);

$user = $_SESSION['userid'];

//USER
$updategames = "UPDATE userstats SET games_p= games_p+1 WHERE useriduser =$user";
mysqli_query($conn, $updategames);

//GLOBAL
$updategamesg = "UPDATE stat_global SET games_p= games_p+1 WHERE idstat_global =1";
mysqli_query($conn, $updategamesg);

//if user is male update games played
if ($_SESSION["gender"] === 'male'){
    $updategamespm = "UPDATE stat_global SET games_p_men= games_p_men+1 WHERE idstat_global =1";
    mysqli_query($conn, $updategamespm);
}
//else update right questions female
else {
    $updategamespw = "UPDATE stat_global SET games_p_women= games_p_women+1 WHERE idstat_global =1";
    mysqli_query($conn, $updategamespw);
}

mysqli_close($conn);

session_destroy();
session_start();

?>