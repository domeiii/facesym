<?php
session_start();
require_once 'inc/defines.inc.php';
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
$_SESSION["wrong"] += 1;
$user = $_SESSION['userid'];
$pic = $_SESSION['picid'];
//Update pic wrong
$updatePic = "UPDATE images SET wrong_answered= wrong_answered+1 WHERE idimages=$pic";
mysqli_query($conn, $updatePic);
//UPDATE QUESTIONS answered --------------------------------------------------------------------------------------------
//USERSTATS
$updatequestions = "UPDATE userstats SET questions_answered= questions_answered+1 WHERE useriduser =$user";
mysqli_query($conn, $updatequestions);
//GLOBALSTATS
$updatequestionsg = "UPDATE stat_global SET questions_answered= questions_answered+1 WHERE idstat_global =1";
mysqli_query($conn, $updatequestionsg);
//UPDATE wrong questions and wrong questions man or woman---------------------------------------------------------------
//USERSTATS
$updatewrongq = "UPDATE userstats SET wrong_q= wrong_q+1 WHERE useriduser =$user";
mysqli_query($conn, $updatewrongq);
//GLOBAL
$updatewrongqg = "UPDATE stat_global SET wrong_q= wrong_q+1 WHERE idstat_global =1";
mysqli_query($conn, $updatewrongqg);
//if user is male update wrong questions
if ($_SESSION["gender"] === 'male'){
    $updatewrongqm = "UPDATE stat_global SET wrong_q_men= wrong_q_men+1 WHERE idstat_global =1";
    mysqli_query($conn, $updatewrongqm);
}
//else update right questions female
else {
    $updatewrongqw = "UPDATE stat_global SET wrong_q_women= wrong_q_women+1 WHERE idstat_global =1";
    mysqli_query($conn, $updatewrongqw);
}
//UPDATE USER man was in pic and wrong, woman was in pic and wrong------------------------------------------------------
if ($_SESSION["genderP"] ==='m') {
    //USERSTATS if question was wrong and a man was on the pic
    $updatemw = "UPDATE userstats SET wrong_q_men = wrong_q_men+1 WHERE useriduser =$user";
    mysqli_query($conn, $updatemw);
}
else {
    //USERSTATS if question was wrong and a woman was on the pic
    $updateww = "UPDATE userstats SET wrong_q_women = wrong_q_women+1 WHERE useriduser =$user";
    mysqli_query($conn, $updateww);
}
//else question was wrong
if ($_SESSION["gender"] === 'male' && $_SESSION["genderP"] ==='m'){
    $updatemamw= "UPDATE stat_global SET men_a_men_w = men_a_men_w+1 WHERE idstat_global = 1";
    mysqli_query($conn, $updatemamw);
}
else if($_SESSION["gender"] === 'male' && $_SESSION["genderP"] ==='f'){
    $updatemaww= "UPDATE stat_global SET men_a_women_w = men_a_women_w+1 WHERE idstat_global = 1";
    mysqli_query($conn, $updatemaww);
}
else if($_SESSION["gender"] === 'female' && $_SESSION["genderP"] ==='m'){
    $updatewamw= "UPDATE stat_global SET women_a_men_w = women_a_men_w+1 WHERE idstat_global = 1";
    mysqli_query($conn, $updatewamw);
}
else if ($_SESSION["gender"] === 'female' && $_SESSION["genderP"] ==='f'){
    $updatemamw= "UPDATE stat_global SET women_a_women_w = women_a_women_w+1 WHERE idstat_global = 1";
    mysqli_query($conn, $updatemamw);
}
mysqli_close($conn);
?>
