<?php
/**
 * Created by PhpStorm.
 * User: Belinda
 * Date: 16.11.2016
 * Time: 10:53
 */
session_start();
if($_SESSION['userid']==null){
    echo "Du kannst dich nicht ausloggen, wenn du nicht eingeloggt bist!";
} else {
session_destroy();
unset($_SESSION['userid']);

//Remove Cookies
setcookie("identifier","",time()-(3600*24*365));
setcookie("securitytoken","",time()-(3600*24*365));

echo "Der Logout war erfolgreich.";
}
?>

<a href="./login.php">Login</a>
