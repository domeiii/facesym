<?php
/**
 * Created by PhpStorm.
 * User: Belinda
 * Date: 09.12.2016
 * Time: 14:23
 */

session_start();
session_destroy();

echo "Logout erfolgreich";
header("Location: ../index.php");
