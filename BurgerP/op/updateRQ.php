<?php
session_start();
require_once './inc/defines.inc.php';
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
$_SESSION["right"] += 1;
$user = $_SESSION['userid'];
$pic = $_SESSION['picid'];
//Update pic right
$updatePic = "UPDATE images SET right_answered = right_answered+1 WHERE idimages=$pic";
mysqli_query($conn, $updatePic);

if ($_SESSION['one'] == 0 && $_SESSION['games'] == 0){
    $_SESSION['one'] = 1;
}
if ($_SESSION['two'] == 0 && $_SESSION['games'] == 1){
    $_SESSION['two'] = 1;
}
if ($_SESSION['three'] == 0 && $_SESSION['games'] == 2){
    $_SESSION['three'] = 1;
}
if ($_SESSION['four'] == 0 && $_SESSION['games'] == 3){
    $_SESSION['four'] = 1;
}
if ($_SESSION['five'] == 0 && $_SESSION['games'] == 4){
    $_SESSION['five'] = 1;
}
if ($_SESSION['six'] == 0 && $_SESSION['games'] == 5){
    $_SESSION['six'] = 1;
}
if ($_SESSION['seven'] == 0 && $_SESSION['games'] == 6){
    $_SESSION['seven'] = 1;
}
if ($_SESSION['eight'] == 0 && $_SESSION['games'] == 7){
    $_SESSION['eight'] = 1;
}
if ($_SESSION['nine'] == 0 && $_SESSION['games'] == 8){
    $_SESSION['nine'] = 1;
}
if ($_SESSION['ten'] == 0 && $_SESSION['games'] == 9){
    $_SESSION['ten'] = 1;
}


//UPDATE POINTS  get poins for right question---------------------------------------------------------------------------
//USERSTATS
$updatepoints = "UPDATE user_stat SET points= points+30 WHERE usersid =$user";
mysqli_query($conn, $updatepoints);
//GLOBALSTATS
$updatepointsg= "UPDATE stat_global SET points = points+30 WHERE idstat_global=1";
mysqli_query($conn, $updatepointsg);
//UPDATE QUESTIONS answered --------------------------------------------------------------------------------------------
//USERSTATS
$updatequestions = "UPDATE user_stat SET questions_answered= questions_answered+1 WHERE usersid = $user";
mysqli_query($conn, $updatequestions);
//GLOBALSTATS
$updatequestionsg = "UPDATE stat_global SET questions_answered= questions_answered+1 WHERE idstat_global =1";
mysqli_query($conn, $updatequestionsg);
//UPDATE right questions and right questions man or woman---------------------------------------------------------------
//USERSTATS
$updaterightq = "UPDATE user_stat SET right_q= right_q+1 WHERE usersid =$user";
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
    $updatemr = "UPDATE user_stat SET right_q_men = right_q_men+1 WHERE usersid =$user";
    mysqli_query($conn, $updatemr);
}
else {
    //USERSTATS if question was right and a woman was on the pic
    $updatewr = "UPDATE user_stat SET right_q_women = right_q_women+1 WHERE usersid =$user";
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
