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

    <link rel="stylesheet" href="style.css">
    <?php
    //$pdo = new PDO('mysql:host=localhost;dbname=facesymtest', 'root', '');
    $m=mysqli_connect("localhost","root","","facesymtest");
    session_start();
    $username = $_SESSION['username'];
    $userid = $_SESSION['userid'];
    $query = sprintf("SELECT * FROM user_stat
    WHERE userid='%s'", mysqli_real_escape_string($m,$userid));
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
        if ($games > 0) {
            $percentage_total=($questions_answered/$right_q)*100; // Wieviel Prozent hat man richtig beantwortet?
            $questions_w=$right_q_women+$wrong_q_women; // Wieviele Frauenfragen hat man insg beantwortet?
            $questions_m=$right_q_men+$wrong_q_men; // Wieviele M?nnerfragen hat man insg beantwortet?
            $percentage_w=($questions_w/$right_q_women)*100; // Wieviele Frauenfragen hat man richtig beantwortet?
            $percentage_m=($questions_m/$right_q_men)*100; // Wieviele M?nnerfragen hat man richtig beantwortet?
        }
    }
    mysqli_free_result($result);
    ?>
</head>
<style>
    body {
        background: #f8f8f8;
    }
    /* Profile container */
    .profile-content{
        margin-left: -3.5%;
        margin-right: 3.7%;
    }
    .profile {
        margin: 20px 0;
    }
    /* Profile sidebar */
    .profile-sidebar {
        padding: 20px 0 10px 0;
        background: #fff;
    }
    .profile-userpic img {
        float: none;
        margin: 0 auto;
        width: 50%;
        height: 50%;
        -webkit-border-radius: 50% !important;
        -moz-border-radius: 50% !important;
        border-radius: 50% !important;
    }
    .profile-usertitle {
        text-align: center;
        margin-top: 20px;
    }
    .profile-usertitle-name {
        color: #5a7391;
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 7px;
    }
    .profile-usertitle-job {
        text-transform: uppercase;
        color: #5b9bd1;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 15px;
    }
    .profile-userbuttons {
        text-align: center;
        margin-top: 10px;
    }
    .profile-userbuttons .btn {
        text-transform: uppercase;
        font-size: 11px;
        font-weight: 600;
        padding: 6px 15px;
        margin-right: 5px;
    }
    .profile-userbuttons .btn:last-child {
        margin-right: 0px;
    }
    .profile-usermenu {
        margin-top: 30px;
    }
    .profile-usermenu ul li {
        border-bottom: 1px solid #f0f4f7;
    }
    .profile-usermenu ul li:last-child {
        border-bottom: none;
    }
    .profile-usermenu ul li a {
        color: #93a3b5;
        font-size: 14px;
        font-weight: 400;
    }
    .profile-usermenu ul li a i {
        margin-right: 8px;
        font-size: 14px;
    }
    .profile-usermenu ul li a:hover {
        background-color: #fafcfd;
        color: #5b9bd1;
    }
    .profile-usermenu ul li.active {
        border-bottom: none;
    }
    .profile-usermenu ul li.active a {
        color: #5b9bd1;
        background-color: #f6f9fb;
        border-left: 2px solid #5b9bd1;
        margin-left: -2px;
    }
    /* Profile Content */
    .profile-content {
        padding: 20px;
        background: #fff;
        min-height: 460px;
    }
    .h3_points{
        text-align: center;
    }
    .progress {
        height: 20px;
        margin-bottom: 20px;
        overflow: hidden;
        background-color: #f5f5f5;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
        box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
    }
    .progress {
        background-image: -webkit-gradient(linear,left 0,left 100%,from(#ebebeb),to(#f5f5f5));
        background-image: -webkit-linear-gradient(top,#ebebeb 0,#f5f5f5 100%);
        background-image: -moz-linear-gradient(top,#ebebeb 0,#f5f5f5 100%);
        background-image: linear-gradient(to bottom,#ebebeb 0,#f5f5f5 100%);
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffebebeb',endColorstr='#fff5f5f5',GradientType=0);
    }
    .progress {
        height: 12px;
        background-color: #ebeef1;
        background-image: none;
        box-shadow: none;
    }
    .progress-bar {
        float: left;
        width: 0;
        height: 100%;
        font-size: 12px;
        line-height: 20px;
        color: #fff;
        text-align: center;
        background-color: #428bca;
        -webkit-box-shadow: inset 0 -1px 0 rgba(0,0,0,0.15);
        box-shadow: inset 0 -1px 0 rgba(0,0,0,0.15);
        -webkit-transition: width .6s ease;
        transition: width .6s ease;
    }
    .progress-bar {
        background-image: -webkit-gradient(linear,left 0,left 100%,from(#428bca),to(#3071a9));
        background-image: -webkit-linear-gradient(top,#428bca 0,#3071a9 100%);
        background-image: -moz-linear-gradient(top,#428bca 0,#3071a9 100%);
        background-image: linear-gradient(to bottom,#428bca 0,#3071a9 100%);
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff428bca',endColorstr='#ff3071a9',GradientType=0);
    }
    .progress-bar {
        box-shadow: none;
        border-radius: 3px;
        background-color: #0090D9;
        background-image: none;
        -webkit-transition: all 1000ms cubic-bezier(0.785, 0.135, 0.150, 0.860);
        -moz-transition: all 1000ms cubic-bezier(0.785, 0.135, 0.150, 0.860);
        -ms-transition: all 1000ms cubic-bezier(0.785, 0.135, 0.150, 0.860);
        -o-transition: all 1000ms cubic-bezier(0.785, 0.135, 0.150, 0.860);
        transition: all 1000ms cubic-bezier(0.785, 0.135, 0.150, 0.860);
        -webkit-transition-timing-function: cubic-bezier(0.785, 0.135, 0.150, 0.860);
        -moz-transition-timing-function: cubic-bezier(0.785, 0.135, 0.150, 0.860);
        -ms-transition-timing-function: cubic-bezier(0.785, 0.135, 0.150, 0.860);
        -o-transition-timing-function: cubic-bezier(0.785, 0.135, 0.150, 0.860);
        transition-timing-function: cubic-bezier(0.785, 0.135, 0.150, 0.860);
    }
    .progress-bar-success {
        background-image: -webkit-gradient(linear,left 0,left 100%,from(#5cb85c),to(#449d44));
        background-image: -webkit-linear-gradient(top,#5cb85c 0,#449d44 100%);
        background-image: -moz-linear-gradient(top,#5cb85c 0,#449d44 100%);
        background-image: linear-gradient(to bottom,#5cb85c 0,#449d44 100%);
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff5cb85c',endColorstr='#ff449d44',GradientType=0);
    }
    .progress-bar-success {
        background-color: #0AA699;
        background-image: none;
    }
    .progress-bar-info {
        background-image: -webkit-gradient(linear,left 0,left 100%,from(#5bc0de),to(#31b0d5));
        background-image: -webkit-linear-gradient(top,#5bc0de 0,#31b0d5 100%);
        background-image: -moz-linear-gradient(top,#5bc0de 0,#31b0d5 100%);
        background-image: linear-gradient(to bottom,#5bc0de 0,#31b0d5 100%);
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff5bc0de',endColorstr='#ff31b0d5',GradientType=0);
    }
    .progress-bar-info {
        background-color: #0090D9;
        background-image: none;
    }
    .progress-bar-warning {
        background-image: -webkit-gradient(linear,left 0,left 100%,from(#f0ad4e),to(#ec971f));
        background-image: -webkit-linear-gradient(top,#f0ad4e 0,#ec971f 100%);
        background-image: -moz-linear-gradient(top,#f0ad4e 0,#ec971f 100%);
        background-image: linear-gradient(to bottom,#f0ad4e 0,#ec971f 100%);
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fff0ad4e',endColorstr='#ffec971f',GradientType=0);
    }
    .progress-bar-warning {
        background-color: #FDD01C;
        background-image: none;
    }
    .progress-bar-danger {
        background-image: -webkit-gradient(linear,left 0,left 100%,from(#d9534f),to(#c9302c));
        background-image: -webkit-linear-gradient(top,#d9534f 0,#c9302c 100%);
        background-image: -moz-linear-gradient(top,#d9534f 0,#c9302c 100%);
        background-image: linear-gradient(to bottom,#d9534f 0,#c9302c 100%);
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffd9534f',endColorstr='#ffc9302c',GradientType=0);
    }
    .progress-bar-danger {
        background-color: #F35958;
        background-image: none;
    }
    .points{
        color: #0aa699;
        font-weight: bold;
    }
</style>
<body>
<div class="container">
    <div class="col-md-9" id="div1">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h3>Skills</h3>
                        <br>
                        <div class="col-md-11">
                            <p><strong>Correct answers:</strong>    <?php echo $percentage_total ."%" ?></p>

                            <div class="progress">
                                <div data-percentage="0%" style="width: <?php echo $percentage_total ."%" ?>;" class="progress-bar progress-bar-success" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <p><strong>Correct guessed men:</strong> <?php echo $percentage_m ."%"?></p>
                            <div class="progress">
                                <div data-percentage="0%" style="width: <?php echo $percentage_m ."%"?>;" class="progress-bar progress-bar-warning" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p><strong>Correct guessed women:</strong> <?php echo $percentage_w ."%"?></p>
                            <div class="progress">
                                <div data-percentage="0%" style="width: <?php echo $percentage_w ."%"?>;" class="progress-bar progress-bar-danger" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">

                        <h3 class="h3_points">Points</h3>
                        <br>
                        <p class="points">Points</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<br>


</body>
</html>