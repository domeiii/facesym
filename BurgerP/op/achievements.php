<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Julia Flath">
    <meta name="keywords" content="Facesym">
    <meta name="description" content="Onlinegame Facesymetry">
    <title>FaceSym</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <!-- scales the page ( for mobile) -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="/styles/style.css">
    <link rel="stylesheet" href="/styles/styles_highscore.css">

</head>


<body>


<?php

$m = mysqli_connect("localhost", "facesym", "vhzbYHE6#3F", "facesym");
session_start();
$username = $_SESSION['username'];
$userid = $_SESSION['userid'];
$query = sprintf("SELECT * FROM user_stat
    WHERE usersid='%s'", mysqli_real_escape_string($m, $userid));
$result = mysqli_query($m, $query);
if (!$result) {
    $message = 'Ung?ltige Abfrage: ' . mysqli_error($m) . "\n";
    $message .= 'Gesamte Abfrage: ' . $query;
    die($message);
}
while ($row = mysqli_fetch_assoc($result)) {
    $games = $row['games_p'];
    $right_q = $row['right_q'];
    $questions_answered = $row['questions_answered'];
    $wrong_q = $row['wrong_q'];
    $points = $row['points'];
    $right_q_men = $row['right_q_men'];
    $wrong_q_men = $row['wrong_q_men'];
    $right_q_women = $row['right_q_women'];
    $wrong_q_women = $row['wrong_q_women'];
    if (isset ($row['games_p'])) {
        $percentage_total=($right_q/$questions_answered)*100; // Wieviel Prozent hat man richtig beantwortet?
        $questions_w=$right_q_women+$wrong_q_women; // Wieviele Frauenfragen hat man insg beantwortet?
        $questions_m=$right_q_men+$wrong_q_men; // Wieviele M?nnerfragen hat man insg beantwortet?
        $percentage_w=($right_q_women/$questions_w)*100; // Wieviele Frauenfragen hat man richtig beantwortet?
        $percentage_m=($right_q_men/$questions_m)*100; // Wieviele M?nnerfragen hat man richtig beantwortet?
    }
}
mysqli_free_result($result);


echo '<div class="container">
    <div class="col-md-9">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                <style>
                        button {
                            margin-top: 20px; !important;
                        }
                    </style>
                   <a href="profilepage.php"><button type="button" class="btn btn-default btn-circle"><i class="glyphicon glyphicon-menu-left"></i></button>
                   </a>
                    <div class="col-md-4">
                        <h3>Achievements</h3>
                        <br>
                        <br>
                        <div class="container">
                            <div class="row col-md-5">
                            <div class="ach_left">
                           <!--<p class="achievements">-->
                            ';

if ($percentage_total >= 90) { ?>
    <img src="../images/achievement3.png" alt="FaceSym Logo"  width="100" height="100">
    <?php
} else {
?>
<img src="../images/achievement3_n.png" alt="FaceSym Logo" width="100" height="100">
<?php }
echo ' Champion - more than 90 percent right <br>
  <br>
 <br>
';


if ($percentage_total >= 80) { ?>
    <img src="../images/achievement5.png" alt="FaceSym Logo" width="100" height="100">
    <?php
} else {
    ?>
    <img src="../images/achievement5_n.png" alt="FaceSym Logo" width="100" height="100">
<?php }
echo ' Owl - over 80% right answers <br>
  <br>
 <br>
';


if ($games >= 25) { ?>
    <img src="../images/achievement2.png" alt="FaceSym Logo" width="100" height="100">
    <?php
} else {
    ?>
    <img src="../images/achievement2_n.png" alt="FaceSym Logo" width="100" height="100">
<?php }
echo ' Hardcore - more than 25 games played <br>
  <br>
 <br>
 ';


if ($points >= 3000) { ?>
    <img src="../images/achievement4.png" alt="FaceSym Logo" width="100" height="100">
    <?php
} else {
    ?>
    <img src="../images/achievement4_n.png" alt="FaceSym Logo"  width="100" height="100">
<?php }
echo ' Challenge accepted - more than 3000 points <br>
  <br>
 <br>
';



if ($games >= 10) { ?>
    <img src="../images/achievement1.png" alt="FaceSym Logo" width="100" height="100">
    <?php
} else {
    ?>
    <img src="../images/achievement1_n.png" alt="FaceSym Logo" width="100" height="100">
<?php }
echo ' Endurance - 10 games played <br>
  <br>
 <br>
';



if ($percentage_total <= 50) { ?>
    <img src="../images/achievement6.png" alt="FaceSym Logo"  width="100" height="100">
    <?php
} else {
    ?>
    <img src="../images/achievement6_n.png" alt="FaceSym Logo"  width="100" height="100">
<?php }
echo ' Solatium - less than 50% right answers <br>
 <br>
 <br>




</div>
<!--</p>-->
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<br>
</body>
</html> ' ?>