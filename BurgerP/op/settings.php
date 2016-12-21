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
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">



    <!-- scales the page ( for mobile) -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="../build/js/countrySelect.min.js"></script>


    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker3.min.css">
    <script type='text/javascript'
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="../build/css/countrySelect.css">
    <link rel="stylesheet" href="/styles/style.css">
    <link rel="stylesheet" href="/styles/styles_settings.css">
    <?php
    //$pdo = new PDO('mysql:host=localhost;dbname=facesymtest', 'root', '');
    //include "passwort.php";
    include './inc/defines.inc.php';
    include './inc/Utilities.class.php';
    $pdo = new PDO('mysql:host=' . DB_HOST .'; dbname=' .  DB_NAME , DB_USER, DB_PWD);
    session_start();
    $username = $_SESSION['username'];
    $userid = $_SESSION['userid'];
    if(isset($_POST['submit']))
    {
        $newuser = Utilities::sanitizeFilter($_POST['username']);
        $newmail = Utilities::sanitizeFilter($_POST['email']);
        $newpwd =  Utilities::sanitizeFilter($_POST['passwort']);
        $newpwd2 = Utilities::sanitizeFilter($_POST['passwort2']);
        $newsex = Utilities::sanitizeFilter($_POST['sex']);
        $currentpwd = Utilities::sanitizeFilter($_POST['oldpassword']);
        $errMsg = array();
        if (!Utilities::isEmptyString($newuser))
        {
            if (!Utilities::isUser($newuser))
            {
                $errMsg[$newuser] = "Please enter a valid new user";
            }
        }
        if (Utilities::isEmptyString($currentpwd))
        {
            $errMsg[$currentpwd] = "Please enter your current password.";
        }
        if(!Utilities::isPassword($currentpwd))
        {
            $errMsg[$currentpwd] = "Enter your valid current password.";
        }
        if (!Utilities::isEmptyString($newmail) )
        {
            if (!Utilities::isEmail($newmail))
            {
                $errMsg[$newmail] = "Enter a valid new mail";
            }
        }
        if (!Utilities::isEmptyString($newpwd))
        {
            if (!Utilities::isPassword($newpwd))
            {
                $errMsg[$newpwd] = "Enter a new valid password.";
            }
        }
        if (!Utilities::isEmptyString($newpwd2))
        {
            if (!Utilities::isPassword($newpwd2))
            {
                $errMsg[$newpwd] = "Please confirm your password.";
            }
        }
        if (!Utilities::isEmptyString($newpwd) && !Utilities::isEmptyString($newpwd2) && !isset($errMsg[$newpwd]))
        {
            if ($newpwd != $newpwd2)
            {
                $errMsg[$newpwd] = "Passwords don't match.";
            }
        }
        if ( !isset($errMsg[$newpwd]) && !isset($errMsg[$currentpwd]) && !isset($errMsg[$newmail]) && !isset($errMsg[$newsex]))
        {
            $statement = $pdo->prepare("SELECT * FROM users WHERE username = :username");
            $result = $statement->execute(array('username' => $_SESSION['username']));
            $user = $statement->fetch();
            //?berpr?fung des Passworts
            if ($user !== false && password_verify($currentpwd, $user['passwort'])) {
                if (!Utilities::isEmptyString($newuser) && !isset($errMsg[$newuser]))
                {
                    $query = "UPDATE users SET username = '$newuser' WHERE id = '$userid'";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute();
                    $_SESSION['username'] = $newuser;
                }
                if (!Utilities::isEmptyString($newmail) && !isset($errMsg[$newmail]))
                {
                    $query = "UPDATE users SET email = '$newmail' WHERE id = '$userid'";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute();
                }
                if (!Utilities::isEmptyString($newpwd) && !Utilities::isEmptyString($newpwd2) && !isset($errMsg[$newpwd]) && $newpwd==$newpwd2)
                {
                    $pwdhash = password_hash($newpwd, PASSWORD_DEFAULT);
                    $query = "UPDATE users SET passwort = '$pwdhash' WHERE id = '$userid'";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute();
                }
                if (Utilities::isSex($newsex))
                {
                    $query = "UPDATE users SET sex = '$newsex' WHERE id = '$userid'";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute();
                }
            }
            else
            {
                $errMsg[$currentpwd] = "Current password is wrong";
                $_SESSION['currentpwd'] = $errMsg[$currentpwd];
            }
        }
        else
        {
            if (isset($errMsg[$newuser]))
            {
                $_SESSION['newuser'] = $errMsg[$newuser];
            }
            if (isset($errMsg[$newmail]))   {
                $_SESSION['newmail'] = $errMsg[$newmail];
            }
            if (isset($errMsg[$currentpwd]))
            {
                $_SESSION['currentpwd'] = $errMsg[$currentpwd];
            }
            if (isset($errMsg[$newpwd]))
            {
                $_SESSION['newpwd'] = $errMsg[$newpwd];
            }
            if (isset($errMsg[$newsex]))
            {
                $_SESSION['newsex'] = $errMsg[$newsex];
            }
        }
    }
    ?>
</head>

<body>
<div class="container">
    <div class="col-md-9" id="div1">
        <div class="profile-content">

            <div class="container">
                <div class="row">



                    <div class="col-md-9">
                        <div class="panel-heading">
                            <h2>Change Usersettings</h2>
                        </div>
                        <div class="panel-body">
                            <form id="register" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                                <p><strong>Current username: </strong><?php echo $_SESSION['username']?></p>
                                <input name="username" type="text" placeholder="New Username?" pattern="^[\w]{3,16}$"
                                       autofocus="autofocus" class="input pass"/>
                                <?php if(isset($_SESSION['newuser'])) { echo "<p>" . $_SESSION['newuser'] . "</p>"; unset($_SESSION['newuser']);} ?>
                                <input name="email" type="email" placeholder="New Email address" class="input pass"/>
                                <?php if(isset($_SESSION['newmail'])) { echo "<p>" . $_SESSION['newmail'] . "</p>"; unset($_SESSION['newmail']);} ?>
                                <input name="passwort" type="password" placeholder="New Password"
                                       class="input pass"/>
                                <?php if(isset($_SESSION['newpwd'])) { echo "<p>" . $_SESSION['newpwd'] . "</p>"; unset($_SESSION['newpwd']);} ?>
                                <input name="passwort2" type="password" placeholder="Confirm new password"
                                       class="input pass"/>
                                <div class="form-group">
                                    <select class="input pass" id="sel1"  name="sex">
                                        <option value="">Changed sex?</option>
                                        <option value="female">Female</option>
                                        <option value="male">Male</option>
                                    </select>
                                </div>
                                <?php if(isset($_SESSION['newsex'])) { echo "<p>" . $_SESSION['newsex'] . "</p>"; unset($_SESSION['newsex']);} ?>
                                <br>
                                <p> Please enter your current password as confirmation.</p>
                                <?php if(isset($_SESSION['currentpwd'])) { echo "<p>" . $_SESSION['currentpwd'] . "</p>"; unset($_SESSION['currentpwd']);} ?>

                                <input name="oldpassword" type="password" placeholder="Old Password"
                                       required="required" class="input pass"/>

                                <input type="submit" name="submit" value="Submit" class="inputButton"/>

                            </form>
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