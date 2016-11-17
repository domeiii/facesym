<?php
/**
 * Created by PhpStorm.
 * User: Belinda
 * Date: 17.11.2016
 * Time: 11:50
 */
$m=mysqli_connect("localhost","root","","facesymtest");

session_start();
$username = $_SESSION['username'];
$userid = $_SESSION['userid'];

$query = sprintf("SELECT  T1.username, T2.points
FROM  users T1, user_stat T2
WHERE  T1.id = T2.userid
   ORDER BY points DESC LIMIT 0,10 ", mysqli_real_escape_string($m,$userid));
$result = mysqli_query($m,$query);

if (!$result) {
    $message  = 'Ungültige Abfrage: ' . mysqli_error($m) . "\n";
    $message .= 'Gesamte Abfrage: ' . $query;
    die($message);
}
while ($row = mysqli_fetch_assoc($result)) {
    foreach ($row as $value) {
        echo $value."\n";
    }
}

mysqli_free_result($result);

