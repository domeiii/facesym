<?php
session_start();
require_once 'inc/defines.inc.php';
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
$user = $_SESSION['userid'];
//USER
$updategames = "UPDATE user_stat SET games_p= games_p+1 WHERE usersid =$user";
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

unset($_SESSION["pictur"]);

?>
