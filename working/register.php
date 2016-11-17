<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=images', 'root', '');
$con=mysqli_connect("localhost","root","","images");

    $username = $_POST['username'];
    $email = $_POST['email'];
    $passwort = $_POST['passwort'];
    $passwort2 = $_POST['passwort2'];
    $country = $_POST['country'];
    $sex = $_POST['sex'];
    $date = $_POST['date'];

    $usernameError = "";
    $mailError = "";
    $sexError = "";
$dateError = "";
$passwordError = "";
$generalError = "";

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mailError = "Please enter a valid Mail";
    }

if ($passwort != $passwort2) {
    $passwordError = "Passwords don't match";
}

    //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
    if($mailError != "Please enter a valid Mail" && $passwordError != "Passwords don't match") {
        $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $result = $statement->execute(array('email' => $email));
        $user = $statement->fetch();

        if($user !== false) {
            $mailError = "Mail is already in use";
        }
    }

    //Überprüft ob der Benutzername schon vorhanden ist
    if($mailError != "Mail is already in use" && $mailError != "Please enter a valid Mail" && $passwordError != "Passwords don't match" && $passwordError != "Please enter a password") {
        $statement = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $result = $statement->execute(array('username' => $username));
        $user = $statement->fetch();

        if ($user !== false) {
            $usernameError = "Username too long or already exists";
        }
    if ($mailError != "Mail is already in use" && $mailError != "Please enter a valid Mail" && $passwordError != "Passwords don't match" && $passwordError != "Please enter a password" && $usernameError != "Username too long or already exists") {
        if ($sex !== "male" && $sex !== "female") {
            $sexError = "Please chose a sex";
        }
    }
    if ($mailError != "Mail is already in use" && $mailError != "Please enter a valid Mail" && $passwordError != "Passwords don't match" && $passwordError != "Please enter a password" && $usernameError != "Username too long or already exists" && $sexError = "Please chose a sex") {
        if ($date == 0) {
            $dateError = "Please choose a birthdate";
        }
    }

    }

    //Keine Fehler, wir können den Nutzer registrieren
if($mailError != "Mail is already in use" && $mailError != "Please enter a valid Mail" && $passwordError != "Passwords don't match" && $passwordError != "Please enter a password" && $usernameError != "Username too long or already exists" && $sexError = "Please chose a sex" && $dateError != "Please choose a birthdate") {
    $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);

    $statement = $pdo->prepare("INSERT INTO users (username, email, passwort, country, sex, date) VALUES (:username, :email, :passwort, :country, :sex, :date )");
    $result = $statement->execute(array('username' => $username, 'email' => $email, 'passwort' => $passwort_hash, 'country' => $country, 'sex' => $sex, 'date' => $date));

    $query = mysqli_query($con, "SELECT id FROM users WHERE email = '$email'");
    $row = mysqli_fetch_array($query,MYSQLI_NUM );
    $userid = $row[0];

    $statement2 = $pdo->prepare("INSERT INTO user_stat (userid, questions_answered,right_q,wrong_q,points,games_p,right_q_men,right_q_women,wrong_q_men,wrong_q_women) VALUES (:userid, :questions_answered,:right_q,:wrong_q,:points,:games_p,:right_q_men,:right_q_women,:wrong_q_men,:wrong_q_women)");
    $result2 = $statement2->execute(array('userid'=> $userid, 'questions_answered'=> 0,'right_q'=>0,'wrong_q'=>0,'points'=>0,'games_p'=>0,'right_q_men'=>0,'right_q_women'=>0,'wrong_q_men'=>0,'wrong_q_women'=>0));

    if($result) {
        header("Location: ./profilpage.php");
        exit;

    } else {
        $generalError = "Registration failed, please try again";
    }
}else {
    if($mailError == "Please enter a valid Mail") {
        header("Location: ./login.php?msg=Please enter a valid mail");
        exit;
    } else if ($passwordError == "Passwords don't match") {
        header("Location: ./login.php?msg=Passwords don't match");
    } else if ($mailError == "Mail is already in use") {
        header("Location: ./login.php?msg=Mail is already in use");
    } else if ($usernameError == "Username too long or already exists") {
        header("Location: ./login.php?msg=Username too long or already exists");
    } else if (  $sexError == "Please choose a sex") {
        header("Location: ./login.php?msg=Please choose a sex");
    } else if (  $dateError == "Please choose a birthdate") {
        header("Location: ./login.php?msg=Please choose a birthdate");
    } else if ( $generalError == "Registration failed, please try again") {
        header("Location: ./login.php?msg=Registration failed, please try again");
    }
}


