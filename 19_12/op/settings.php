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
    $m=mysqli_connect("localhost","facesym","vhzbYHE6#3F","facesym");
    session_start();
    $username = $_SESSION['username'];
    $userid = $_SESSION['userid'];
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
                            <form id="register" method="post">
                                <p><?php echo isset($_GET["esg"])?$_GET["esg"]:"";?></p>
                                <p><strong>Current username: </strong><?php echo $_SESSION['username']?></p>
                                <input name="username" type="text" placeholder="New Username?" pattern="^[\w]{3,16}$"
                                       autofocus="autofocus" class="input pass"/>
                                <input name="email" type="email" placeholder="New Email address" class="input pass"/>
                                <input name="passwort" type="password" placeholder="New Password"
                                       class="input pass"/>
                                <input name="passwort2" type="password" placeholder="Confirm new password"
                                       class="input pass"/>
                                <div class="form-group">
                                    <input type="hidden" id="country_code"/>
                                    <input name="country" type="text" placeholder="Change country?" id="country" class="input pass"/>
                                </div>
                                <script>
                                    $("#country").countrySelect();
                                </script>
                                <div class="form-group">
                                    <select class="input pass" id="sel1"  name="sex">
                                        <option value="">Changed sex?</option>
                                        <option value="female">Female</option>
                                        <option value="male">Male</option>
                                    </select>
                                </div>
                                <br>
                                <p> Please enter your current password as confirmation.</p>

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