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
    <link rel="stylesheet" href="/styles/styles_skills.css">
    <?php
    //$pdo = new PDO('mysql:host=localhost;dbname=facesymtest', 'root', '');
    $m=mysqli_connect("localhost","facesym","vhzbYHE6#3F","facesym");
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