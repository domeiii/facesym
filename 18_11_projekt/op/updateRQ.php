<?php
session_start();
$servername = "localhost";
$username = "facesym";
$password = 'vhzbYHE6#3F';
$dbname = "facesym";
$conn = mysqli_connect($servername, $username,$password, $dbname);
$_SESSION["right"] += 1;
$user = $_SESSION['userid'];
$pic = $_SESSION['picid'];
//Update pic right
$updatePic = "UPDATE images SET right_answered = right_answered+1 WHERE idimages=$pic";
mysqli_query($conn, $updatePic);

//UPDATE POINTS  get poins for right question---------------------------------------------------------------------------
//USERSTATS
$updatepoints = "UPDATE userstats SET points= points+30 WHERE useriduser =$user";
mysqli_query($conn, $updatepoints);
//GLOBALSTATS
$updatepointsg= "UPDATE stat_global SET points = points+30 WHERE idstat_global=1";
mysqli_query($conn, $updatepointsg);
//UPDATE QUESTIONS answered --------------------------------------------------------------------------------------------
//USERSTATS
$updatequestions = "UPDATE userstats SET questions_answered= questions_answered+1 WHERE useriduser = $user";
mysqli_query($conn, $updatequestions);
//GLOBALSTATS
$updatequestionsg = "UPDATE stat_global SET questions_answered= questions_answered+1 WHERE idstat_global =1";
mysqli_query($conn, $updatequestionsg);
//UPDATE right questions and right questions man or woman---------------------------------------------------------------
//USERSTATS
$updaterightq = "UPDATE userstats SET right_q= right_q+1 WHERE useriduser =$user";
mysqli_query($conn, $updaterightq);
//GLOBALSTATS
$updaterightqg = "UPDATE stat_global SET right_q= right_q+1 WHERE idstat_global =1";
mysqli_query($conn, $updaterightqg);
//if user is male update right questions male
if ($_SESSION["gender"] === 'male'){
    $updaterightqm = "UPDATE stat_global SET right_q_men= right_q_men+1 WHERE idstat_global =1";
    mysqli_query($conn, $updaterightqm);
}
//else update right questions female
else {
    $updaterightqw = "UPDATE stat_global SET right_q_women= right_q_women+1 WHERE idstat_global =1";
    mysqli_query($conn, $updaterightqw);
}
//UPDATE USER man was in pic and right, woman was in pic and right------------------------------------------------------
//USERSTATS if question was right and a man was on the pic
if ($_SESSION["genderP"] ==='m') {
    $updatemr = "UPDATE userstats SET right_q_men = right_q_men+1 WHERE useriduser =$user";
    mysqli_query($conn, $updatemr);
}
else {
    //USERSTATS if question was right and a woman was on the pic
    $updatewr = "UPDATE userstats SET right_q_women = right_q_women+1 WHERE useriduser =$user";
    mysqli_query($conn, $updatewr);
}
//UPDATE GLOBAL depending on which sex user is--------------------------------------------------------------------------
//if questions was answered right
if ($_SESSION["gender"] === 'male' && $_SESSION["genderP"] ==='m'){
    $updatemamr= "UPDATE stat_global SET men_a_men_r = men_a_men_r+1 WHERE idstat_global = 1";
    mysqli_query($conn, $updatemamr);
}
else if($_SESSION["gender"] === 'male' && $_SESSION["genderP"] ==='f'){
    $updatemawr= "UPDATE stat_global SET men_a_women_r = men_a_women_r+1 WHERE idstat_global = 1";
    mysqli_query($conn, $updatemawr);
}
else if($_SESSION["gender"] === 'female' && $_SESSION["genderP"] ==='m'){
    $updatewamr= "UPDATE stat_global SET women_a_men_r = women_a_men_r+1 WHERE idstat_global = 1";
    mysqli_query($conn, $updatewamr);
}
else if ($_SESSION["gender"] === 'female' && $_SESSION["genderP"] ==='f'){
    $updatemamr= "UPDATE stat_global SET women_a_women_r = women_a_women_r+1 WHERE idstat_global = 1";
    mysqli_query($conn, $updatemamr);
}
mysqli_close($conn);
?>
