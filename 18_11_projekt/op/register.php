<?php
//include ("passwort.php");
require_once 'inc/defines.inc.php';
require_once 'inc/utilities.class.php';
session_start();
$pdo = new PDO('mysql:host=' . DB_HOST .'; dbname=' .  DB_NAME , DB_USER, DB_PWD);
$con=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);

    $username = Utilities::sanitizeFilter($_POST['username']);
    $email = Utilities::sanitizeFilter($_POST['email']);
    $passwort = Utilities::sanitizeFilter($_POST['passwort']);
    $passwort2 = Utilities::sanitizeFilter($_POST['passwort2']);
    $country = Utilities::sanitizeFilter($_POST['country']);
    $sex = Utilities::sanitizeFilter($_POST['sex']);
    $age = Utilities::sanitizeFilter($_POST['age']);


    $errMsg =array();


    //checks the username
    if (Utilities::isEmptyString($username))
    {
        $errMsg[$username] = "Please enter a username";
    }

    if (!Utilities::isEmptyString($username) && !Utilities::isUser($username))
    {
        $errMsg[$username]= "Please enter a valid username.";
    }

    if (Utilities::isEmptyString($email))
    {
        $errMsg[$email] = "Please enter your e-mail";
    }

    if(!Utilities::isEmail($email) && !Utilities::isEmptyString($email)) {
        $errMsg[$email] = "Please enter a valid Mail";
    }

    if (Utilities::isEmptyString($passwort))
    {
        $errMsg[$passwort] = "Please enter your password";
    }
    if (!Utilities::isPassword($passwort) && !Utilities::isEmptyString($passwort))
    {
        $errMsg[$passwort] = "Password need an Uppercase, a lowercase, a number and must be 5 long";
    }

    if ($passwort != $passwort2 && Utilities::isPassword($passwort) && !Utilities::isEmptyString($passwort))
    {
        $errMsg[$passwort] = "Passwords don't match";

    }

    //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
    if(Utilities::isEmail($email) && !Utilities::isEmptyString($email))
    {
        $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $result = $statement->execute(array('email' => $email));
        $user = $statement->fetch();

        if($user !== false) {
            $errMsg[$email] = "Mail is already in use";
        }
    }

    //Überprüft ob der Benutzername schon vorhanden ist
    if(!isset($errMsg[$email])  && !isset($errMsg[$passwort]) && !isset($errMsg[$username]) )
    {
        $statement = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $result = $statement->execute(array('username' => $username));
        $user = $statement->fetch();

        if ($user !== false) {
            $errMsg[$username] = "Username too long or already exists";
        }

    }
    if (!Utilities::isSex($sex))
    {
        $errMsg[$sex] = "Please enter your sex";
    }

    if (!Utilities::isAge($age)) {
        $errMsg[$age] = "Please enter your age!";
    }


    //Keine Fehler, wir können den Nutzer registrieren
    if(!isset($errMsg[$username]) && !isset($errMsg[$email]) && !isset($errMsg[$passwort]) && !isset($errMsg[$sex]) && !isset($errMsg[$age])) {

    $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);

    $statement = $pdo->prepare("INSERT INTO users (username, email, passwort, country, sex, age) VALUES (:username, :email, :passwort, :country, :sex,  :age )");
    $result = $statement->execute(array('username' => $username, 'email' => $email, 'passwort' => $passwort_hash, 'country' => $country, 'sex' => $sex, 'age'=> $age));

    $query = mysqli_query($con, "SELECT id FROM users WHERE email = '$email'");
    $row = mysqli_fetch_array($query,MYSQLI_NUM );
    $userid = $row[0];

    $statement2 = $pdo->prepare("INSERT INTO user_stat (usersid, questions_answered,right_q,wrong_q,points,games_p,right_q_men,right_q_women,wrong_q_men,wrong_q_women) VALUES (:userid, :questions_answered,:right_q,:wrong_q,:points,:games_p,:right_q_men,:right_q_women,:wrong_q_men,:wrong_q_women)");
    $result2 = $statement2->execute(array('userid'=> $userid, 'questions_answered'=> 0,'right_q'=>0,'wrong_q'=>0,'points'=>0,'games_p'=>0,'right_q_men'=>0,'right_q_women'=>0,'wrong_q_men'=>0,'wrong_q_women'=>0));

    if($result) {
        $_SESSION['userid'] = $userid;
        $_SESSION['username'] = $username;
        header("Location: ./profilepage.php");
        exit;

    } else {
        $errMsg[1] = "Registration failed, please try again";
        $_SESSION[1] = $errMsg[1];
        header("Location: ./login.php");
        exit;
    }
} else {
        if (isset($errMsg[$username]))
        {
            $_SESSION['usernameError'] = $errMsg[$username];
        }
        if (isset($errMsg[$email]))   {
            $_SESSION['mailError'] = $errMsg[$email];
        }
        if (isset($errMsg[$passwort]))
        {
            $_SESSION['pwdError'] = $errMsg[$passwort];
        }
        if (isset($errMsg[$sex]))
        {
            $_SESSION['sexError'] = $errMsg[$sex];
        }
        if (isset($errMsg[$age]))
        {
            $_SESSION['ageError'] = $errMsg[$age];
        }
        header("Location: ./login.php");
        exit;
}


