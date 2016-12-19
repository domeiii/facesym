<?php
require_once 'inc/defines.inc.php';
require_once 'inc/utilities.class.php';
session_start();
$pdo = new PDO('mysql:host=' . DB_HOST .'; dbname=' .  DB_NAME , DB_USER, DB_PWD);
$error_msg = "";
$errMsg = array();

if (isset($_POST['username']) && isset($_POST['username'])) {
    $tmpusername = Utilities::sanitizeFilter($_POST['username']);
    $tmppwd = Utilities::sanitizeFilter($_POST['passwort']);
   // $username = Utilities::sanitizeFilter($_POST['username']);
   // $passwort = Utilities::sanitizeFilter($_POST['passwort']);
    $username = 0;
    $passwort = 0;
    if (Utilities::isUser($tmpusername))
    {
        $username = $tmpusername;
    }
    else
    {
        $errMsg[$username] = "Please enter a valid username";
    }

    if (Utilities::isPassword($tmppwd))
    {
        $passwort = $tmppwd;
    }
    else
    {
        $errMsg[$passwort] = "Please enter a valid password";
    }

    if (!isset($errMsg[$username]) && !isset($errMsg[$passwort]))
    {
    $statement = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $result = $statement->execute(array('username' => $username));
    $user = $statement->fetch();

    //�berpr�fung des Passworts
    if ($user !== false && password_verify($passwort, $user['passwort'])) {
        $_SESSION['userid'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        //M�chte der Nutzer angemeldet bleiben?
        if (isset($_POST['angemeldet_bleiben'])) {
            $identifier = uniqid();
            $securitytoken = uniqid();

            $insert = $pdo->prepare("INSERT INTO securitytokens (user_id, identifier, securitytoken) VALUES (:user_id, :identifier, :securitytoken)");
            $insert->execute(array('user_id' => $user['id'], 'identifier' => $identifier, 'securitytoken' => sha1($securitytoken)));
            setcookie("identifier", $identifier, time() + (3600 * 24 * 365)); //Valid for 1 year
            setcookie("securitytoken", $securitytoken, time() + (3600 * 24 * 365)); //Valid for 1 year
        }
        header("Location: ./profilepage.php");
        exit;
    } else {
        $_SESSION['generalError'] = "User or password wrong.";
        header("Location: ./login.php");
        exit;
    }
    }
    else
    {
        $_SESSION['usernameErrorLogin'] = $errMsg[$username];
        $_SESSION['pwdErrorLogin'] = $errMsg[$passwort];
        header("Location: ./login.php");
        exit;
    }
}

$username_value = "";
if (isset($_POST['username']))
    $username_value = htmlentities($_POST['username']);

?>
