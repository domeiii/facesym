<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=images', 'root', '');
$error_msg = "";
if (isset($_POST['username']) && isset($_POST['username'])) {
    $username = $_POST['username'];
    $passwort = $_POST['passwort'];

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
        header('Location: ./profilepage.php');
        exit;
    } else {
        $error_msg = "Username oder Passwort war ung�ltig<br><br>";
    }

}

$username_value = "";
if (isset($_POST['username']))
    $username_value = htmlentities($_POST['username']);

?>
