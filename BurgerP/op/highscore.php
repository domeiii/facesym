

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
/**
 * Created by PhpStorm.
 * User: Belinda
 * Date: 17.11.2016
 * Time: 11:50
 */
require_once 'inc/defines.inc.php';
$m=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);

session_start();
$username = $_SESSION['username'];
$userid = $_SESSION['userid'];

$query = sprintf("SELECT  T1.username, T2.points
FROM  users T1, user_stat T2
WHERE  T1.id = T2.usersid
   ORDER BY points DESC LIMIT 0,10 ", mysqli_real_escape_string($m,$userid));
$result = mysqli_query($m,$query);

if (!$result) {
    $message  = 'Ung�ltige Abfrage: ' . mysqli_error($m) . "\n";
    $message .= 'Gesamte Abfrage: ' . $query;
    die($message);
}
/*
while ($row = mysqli_fetch_assoc($result)) {
    foreach ($row as $key => $value) {
        echo "{$key} => {$value} ";
    }
}*/
$x="0";
$y="0";
$user;
$score;
while ($row = mysqli_fetch_assoc($result)) {
    foreach ($row as $key => $value) {
        if ($key == "username") {
            $user[$x]=$value;
            if($value==$_SESSION['username']) {
                $dru=true;
            }
            $x++;
        } else if ($key == "points") {
            $score[$x]=$value;
            $x++;
        }
    }
}
if ( $x!=19){
$diff = 19-$x;
    $start = 19-$diff;
    for ($start;$start<19;$start++){
        $user[$start]="default";
        $score[$start+1]="0";
        $start++;
    }
}


mysqli_free_result($result);


    $my=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
    $query1 = sprintf("SELECT points FROM user_stat
    WHERE usersid='%s'", mysqli_real_escape_string($my,$userid));
    $result1 = mysqli_query($my,$query1);
    if (!$result1) {
        $message  = 'Ung?ltige Abfrage: ' . mysqli_error($my) . "\n";
        $message .= 'Gesamte Abfrage: ' . $query1;
        die($message);
    }
    while ($row = mysqli_fetch_assoc($result1)) {
        $points = $row['points'];
    }
    mysqli_free_result($result1);


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
                        <h3>Highscores</h3>
                        <br>

                        <div class="container">
                            <div class="row col-md-6">
                                <table class="table table-striped custab">
                                    <thead>
                                    <tr>
                                        <th>Nr</th>
                                        <th>Username</th>
                                        <th>Points</th>
                                    </tr>
                                    </thead>


                                    <tr>
                                        <td>1</td>
                                        <td>';echo $user[0]; echo '</td>
                                        <td>';echo $score[1];echo'</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>';echo $user[2]; echo '</td>
                                        <td>';echo $score[3];echo'</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                       <td>';echo $user[4]; echo '</td>
                                       <td>';echo $score[5];echo'</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>';echo $user[6]; echo '</td>
                                       <td>';echo $score[7];echo'</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>';echo $user[8]; echo '</td>
                                       <td>';echo $score[9];echo'</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>';echo $user[10]; echo '</td>
                                       <td>';echo $score[11];echo'</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                       <td>';echo $user[12]; echo '</td>
                                       <td>';echo $score[13];echo'</td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                       <td>';echo $user[14]; echo '</td>
                                       <td>';echo $score[15];echo'</td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>';echo $user[16]; echo '</td>
                                       <td>';echo $score[17];echo'</td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>';echo $user[18]; echo '</td>
                                       <td>';echo $score[19];echo'</td>
                                    </tr>
                                    <tr>'; if ($dru!=true) { echo '
                                    <td>...</td>
                                    <td>';echo $_SESSION['username']; echo '</td>
                                    <td>';echo $points; echo '</td>
                                    </tr>';} ?>

                                </table>
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
</html>