<?php
/**
 * Created by PhpStorm.
 * User: Belinda
 * Date: 16.11.2016
 * Time: 13:05
 */
//$pdo = new PDO('mysql:host=localhost;dbname=facesymtest', 'root', '');
$m=mysqli_connect("localhost","root","","images");

session_start();
$username = $_SESSION['username'];
$userid = $_SESSION['userid'];

$query = sprintf("SELECT * FROM user_stat
    WHERE userid='%s'", mysqli_real_escape_string($m,$userid));
$result = mysqli_query($m,$query);
if (!$result) {
    $message  = 'Ung�ltige Abfrage: ' . mysqli_error($m) . "\n";
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

echo "Hallo, ".$username.". Das ist deine Profilseite. ";
echo "Du hast schon ".$games." Spiele gespielt. ";
echo "Du hast schon ".$questions_answered." Fragen beantwortet. ";
echo "Du hast schon ".$right_q." Fragen richtig beantwortet. ";
echo "Du hast schon ".$wrong_q." Fragen falsch beantwortet. ";
echo "Du hast schon ".$right_q_men." Bilder von M�nnern richtig erkannt. ";
echo "Du hast schon ".$right_q_women." Bilder von Frauen richtig erkannt. ";
echo "Du hast ".$wrong_q_men." Bilder von M�nnern nicht richtig erkannt. ";
echo "Du hast ".$wrong_q_women." Bilder von Frauen nicht richtig erkannt. ";
echo "Somit hast du schon ".$points." Punkte. ";

$percentage_total=$questions_answered/$right_q; // Wieviel Prozent hat man richtig beantwortet?
$questions_w=$right_q_women+$wrong_q_women; // Wieviele Frauenfragen hat man insg beantwortet?
$questions_m=$right_q_men+$wrong_q_men; // Wieviele M�nnerfragen hat man insg beantwortet?
$percentage_w=$questions_w/$right_q_women; // Wieviele Frauenfragen hat man richtig beantwortet?
$percentage_m=$questions_m/$right_q_men; // Wieviele M�nnerfragen hat man richtig beantwortet?

?>
