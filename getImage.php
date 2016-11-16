<?php

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

echo "<img src='".$image[0]."'/ width=\"250\" height=\"200\">";
echo "<img src='".$image[0]."'/ width=\"250\" height=\"200\" style=\"transform:scaleX(-1)\">";

//get sex from user
$getGender = "SELECT sex FROM users WHERE id=1";
$genderH = mysqli_query($conn, $getGender);
$gender = mysqli_fetch_row($genderH);

echo $gender[0];

//get sex from picture
$getGenderP = "SELECT gender FROM images WHERE idimages=$random";
$genderHP = mysqli_query($conn, $getGenderP);
$genderP = mysqli_fetch_row($genderHP);

echo $genderP[0];

/*
//UPDATE POINTS  get poins for right question---------------------------------------------------------------------------
//USERSTATS
$updatepoints = "UPDATE userstats SET points= points+30 WHERE useriduser =1";
mysqli_query($conn, $updatepoints);

//GLOBALSTATS
$updatepointsg= "UPDATE stat_global SET poins = points+30 WHERE idstat_global=1";
mysqli_query($conn, $updatepointsg);


//UPDATE QUESTIONS answered --------------------------------------------------------------------------------------------
//USERSTATS
$updatequestions = "UPDATE userstats SET questions_answered= questions_answered+1 WHERE useriduser =1";
mysqli_query($conn, $updatequestions);

//GLOBALSTATS
$updatequestionsg = "UPDATE stat_global SET questions_answered= questions_answered+1 WHERE idstat_global =1";
mysqli_query($conn, $updatequestionsg);


//UPDATE right questions and right questions man or woman---------------------------------------------------------------
//USERSTATS
$updaterightq = "UPDATE userstats SET right_q= right_q+1 WHERE useriduser =1";
mysqli_query($conn, $updaterightq);

//GLOBALSTATS
$updaterightqg = "UPDATE stat_global SET right_q= right_q+1 WHERE idstat_global =1";
mysqli_query($conn, $updaterightqg);

//if user is male update right questions male
if ($gender[0] === 'male'){
    $updaterightqm = "UPDATE stat_global SET right_q_men= right_q_men+1 WHERE idstat_global =1";
    mysqli_query($conn, $updaterightqm);
}
//else update right questions female
else {
    $updaterightqw = "UPDATE stat_global SET right_q_women= right_q_women+1 WHERE idstat_global =1";
    mysqli_query($conn, $updaterightqw);
}

//UPDATE wrong questions and wrong questions man or woman---------------------------------------------------------------
//USERSTATS
$updatewrongq = "UPDATE userstats SET wrong_q= wrong_q+1 WHERE useriduser =1";
mysqli_query($conn, $updatewrongq);

//GLOBAL
$updatewrongqg = "UPDATE stat_global SET wrong_q= wrong_q+1 WHERE idstat_global =1";
mysqli_query($conn, $updatewrongqg);

//if user is male update wrong questions
if ($gender[0] === 'male'){
    $updatewrongqm = "UPDATE stat_global SET wrong_q_men= wrong_q_men+1 WHERE idstat_global =1";
    mysqli_query($conn, $updatewrongqm);
}
//else update right questions female
else {
    $updatewrongqw = "UPDATE stat_global SET wrong_q_women= wrong_q_women+1 WHERE idstat_global =1";
    mysqli_query($conn, $updatewrongqw);
}

//UPDATE games played and games played by men or women------------------------------------------------------------------
//USERSTATS if game played
$updategames = "UPDATE userstats SET games_p= games_p+1 WHERE useriduser =1";
mysqli_query($conn, $updategames);

//GLOBAL
$updategamesg = "UPDATE stat_global SET games_p= games_p+1 WHERE useriduser =1";
mysqli_query($conn, $updategamesg);

//if user is male update games played
if ($gender[0] === 'male'){
    $updategamespm = "UPDATE stat_global SET games_p_men= games_p_men+1 WHERE idstat_global =1";
    mysqli_query($conn, $updategamespm);
}
//else update right questions female
else {
    $updategamespw = "UPDATE stat_global SET games_p_women= games_p__women+1 WHERE idstat_global =1";
    mysqli_query($conn, $updategamespw);
}


//UPDATE USER man was in pic and right or wrong, woman was in pic and right and wrong-----------------------------------
//USERSTATS if question was right and a man was on the pic
$updatemr= "UPDATE userstats SET right_q_men = right_q_men+1 WHERE useriduser =1";
mysqli_query($conn, $updatemr);

//USERSTATS if question was right and a woman was on the pic
$updatewr= "UPDATE userstats SET right_q_women = right_q_women+1 WHERE useriduser =1";
mysqli_query($conn, $updatewr);

//USERSTATS if question was wrong and a man was on the pic
$updatemw= "UPDATE userstats SET wrong_q_men = wrong_q_men+1 WHERE useriduser =1";
mysqli_query($conn, $updatemw);

//USERSTATS if question was wrong and a woman was on the pic
$updateww= "UPDATE userstats SET wrong_q_women = wrong_q_women+1 WHERE useriduser =1";
mysqli_query($conn, $updateww);

*/
//UPDATE GLOBAL depending on which sex user is--------------------------------------------------------------------------
//if questions was answered right
if ($gender[0] === 'male' && $genderP[0] ==='m'){
    $updatemamr= "UPDATE stat_global SET men_a_men_r = men_a_men_r+1 WHERE idstat_global = 1";
    mysqli_query($conn, $updatemamr);
}
else if($gender[0] === 'male' && $genderP[0] ==='f'){
    $updatemawr= "UPDATE stat_global SET men_a_women_r = men_a_women_r+1 WHERE idstat_global = 1";
    mysqli_query($conn, $updatemawr);
}
else if($gender[0] === 'female' && $genderP[0] ==='m'){
    $updatewamr= "UPDATE stat_global SET women_a_men_r = women_a_men_r+1 WHERE idstat_global = 1";
    mysqli_query($conn, $updatewamr);
}
else if ($gender[0] === 'female' && $genderP[0] ==='f'){
    $updatemamr= "UPDATE stat_global SET women_a_women_r = women_a_women_r+1 WHERE idstat_global = 1";
    mysqli_query($conn, $updatemamr);
}

//else question was wrong
if ($gender[0] === 'male' && $genderP[0] ==='m'){
    $updatemamw= "UPDATE stat_global SET men_a_men_w = men_a_men_w+1 WHERE idstat_global = 1";
    mysqli_query($conn, $updatemamw);
}
else if($gender[0] === 'male' && $genderP[0] ==='f'){
    $updatemaww= "UPDATE stat_global SET men_a_women_w = men_a_women_w+1 WHERE idstat_global = 1";
    mysqli_query($conn, $updatemaww);
}
else if($gender[0] === 'female' && $genderP[0] ==='m'){
    $updatewamw= "UPDATE stat_global SET women_a_men_w = women_a_men_w+1 WHERE idstat_global = 1";
    mysqli_query($conn, $updatewamw);
}
else if ($gender[0] === 'female' && $genderP[0] ==='f'){
    $updatemamw= "UPDATE stat_global SET women_a_women_w = women_a_women_w+1 WHERE idstat_global = 1";
    mysqli_query($conn, $updatemamw);
}



?>