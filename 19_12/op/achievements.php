

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

$m=mysqli_connect("localhost","facesym","vhzbYHE6#3F","facesym");
session_start();
$username = $_SESSION['username'];
$userid = $_SESSION['userid'];
$query = sprintf("SELECT * FROM user_stat
    WHERE usersid='%s'", mysqli_real_escape_string($m,$userid));
$result = mysqli_query($m,$query);
if (!$result) {
    $message  = 'Ung?ltige Abfrage: ' . mysqli_error($m) . "\n";
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
}
mysqli_free_result($result);


echo '<div class="container">
    <div class="col-md-9">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h3>Achievements</h3>
                        <br>
                        <div class="container">
                            <div class="row col-md-6">
                            '; if ($points<100){ ?>
                            <img src="../images/bsp_no.png" alt="FaceSym Logo" id="beginning" width="100" height="100">
<?php
} else {
?>
<img src="../images/bsp_yes.png" alt="FaceSym Logo" id="beginning" width="100" height="100">
<?php } echo ' 100 Points <br>
'; if ($points<200){ ?>
                            <img src="../images/bsp_no.png" alt="FaceSym Logo" id="beginning" width="100" height="100">
<?php
} else {
?>
<img src="../images/bsp_yes.png" alt="FaceSym Logo" id="beginning" width="100" height="100">
<?php } echo ' 200 Points <br>
'; if ($points<400){ ?>
    <img src="../images/bsp_no.png" alt="FaceSym Logo" id="beginning" width="100" height="100">
    <?php
} else {
?>
<img src="../images/bsp_yes.png" alt="FaceSym Logo" id="beginning" width="100" height="100">
<?php } echo ' 400 Points <br>
 '; if ($points<600){ ?>
    <img src="../images/bsp_no.png" alt="FaceSym Logo" id="beginning" width="100" height="100">
    <?php
} else {
?>
<img src="../images/bsp_yes.png" alt="FaceSym Logo" id="beginning" width="100" height="100">
<?php } echo ' 600 Points <br>
 '; if ($points<800){ ?>
    <img src="../images/bsp_no.png" alt="FaceSym Logo" id="beginning" width="100" height="100">
    <?php
} else {
?>
<img src="../images/bsp_yes.png" alt="FaceSym Logo" id="beginning" width="100" height="100">
<?php } echo ' 800 Points <br>

'; if ($right_q<10){ ?>
    <img src="../images/bsp_no.png" alt="FaceSym Logo" id="beginning" width="100" height="100">
    <?php
} else {
?>
<img src="../images/bsp_yes.png" alt="FaceSym Logo" id="beginning" width="100" height="100">
<?php } echo ' 10 Right Questions <br>
'; if ($right_q<30){ ?>
    <img src="../images/bsp_no.png" alt="FaceSym Logo" id="beginning" width="100" height="100">
    <?php
} else {
?>
<img src="../images/bsp_yes.png" alt="FaceSym Logo" id="beginning" width="100" height="100">
<?php } echo ' 30 Right Questions <br>


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
