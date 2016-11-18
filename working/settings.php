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
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/structure.css">


    <!-- scales the page ( for mobile) -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="build/js/countrySelect.min.js"></script>


    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker3.min.css">
    <script type='text/javascript'
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="build/css/countrySelect.css">
    <link rel="stylesheet" href="style.css">
    <?php
    //$pdo = new PDO('mysql:host=localhost;dbname=facesymtest', 'root', '');
    $m=mysqli_connect("localhost","root","","images");
    session_start();
    $username = $_SESSION['username'];
    $userid = $_SESSION['userid'];

    ?>
</head>
<style>
    body {
        background: #f8f8f8;
    }
    /* Profile container */
    .profile-content{
        margin-left: -3.5%;
        margin-right: 3.7%;
    }
    .profile {
        margin: 20px 0;
    }
    /* Profile sidebar */
    .profile-sidebar {
        padding: 20px 0 10px 0;
        background: #fff;
    }
    .profile-userpic img {
        float: none;
        margin: 0 auto;
        width: 50%;
        height: 50%;
        -webkit-border-radius: 50% !important;
        -moz-border-radius: 50% !important;
        border-radius: 50% !important;
    }
    .profile-usertitle {
        text-align: center;
        margin-top: 20px;
    }
    .profile-usertitle-name {
        color: #5a7391;
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 7px;
    }
    .profile-usertitle-job {
        text-transform: uppercase;
        color: #5b9bd1;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 15px;
    }
    .profile-userbuttons {
        text-align: center;
        margin-top: 10px;
    }
    .profile-userbuttons .btn {
        text-transform: uppercase;
        font-size: 11px;
        font-weight: 600;
        padding: 6px 15px;
        margin-right: 5px;
    }
    .profile-userbuttons .btn:last-child {
        margin-right: 0px;
    }
    .profile-usermenu {
        margin-top: 30px;
    }
    .profile-usermenu ul li {
        border-bottom: 1px solid #f0f4f7;
    }
    .profile-usermenu ul li:last-child {
        border-bottom: none;
    }
    .profile-usermenu ul li a {
        color: #93a3b5;
        font-size: 14px;
        font-weight: 400;
    }
    .profile-usermenu ul li a i {
        margin-right: 8px;
        font-size: 14px;
    }
    .profile-usermenu ul li a:hover {
        background-color: #fafcfd;
        color: #5b9bd1;
    }
    .profile-usermenu ul li.active {
        border-bottom: none;
    }
    .profile-usermenu ul li.active a {
        color: #5b9bd1;
        background-color: #f6f9fb;
        border-left: 2px solid #5b9bd1;
        margin-left: -2px;
    }
    /* Profile Content */
    .profile-content {
        padding: 20px;
        background: #fff;
        min-height: 460px;
    }
    .h3_points{
        text-align: center;
    }
     ::selection {
         background-color: #b2b2b2;
     }

    ::-moz-selection {
        background-color: #b2b2b2;
    }

    .input {
        width: 75%;
        height: 50px;
        display: block;
        margin: 0 auto 15px;
        padding: 0 15px;
        border: none;
        border-bottom: 2px solid #ebebeb;
    }
    .select {
        width: 75%;
        height: 50px;
        display: block;
        margin: 0 auto 15px;
        padding: 0 15px;
        border: none;
        border-bottom: 2px solid #ebebeb;
    }
    .input:focus {
        outline: none;
        border-bottom-color: #6d6d6d !important;
    }
    .select:focus {
        outline: none;
        border-bottom-color: #6d6d6d !important;
    }

    .input:hover {
        border-bottom-color: #dcdcdc;
    }
    .select:hover {
        border-bottom-color: #dcdcdc;
    }

    .input:invalid {
        box-shadow: none;
    }
    .select:invalid {
        box-shadow: none;
    }

    .pass:-webkit-autofill {
        -webkit-box-shadow: 0 0 0 1000px white inset;
    }

    .inputButton {
        position: relative;
        width: 85%;
        height: 50px;
        display: block;
        margin: 30px auto 30px;
        color: white;
        background-color: #6d6d6d;
        border: none;
        -webkit-box-shadow: 0 5px 0 #4c4c4c;
        -moz-box-shadow: 0 5px 0 #4c4c4c;
        box-shadow: 0 5px 0 #4c4c4c;
    }

    .inputButton:hover {
        top: 2px;
        -webkit-box-shadow: 0 3px 0 #4c4c4c;
        -moz-box-shadow: 0 3px 0 #4c4c4c;
        box-shadow: 0 3px 0 #4c4c4c;
    }

    .inputButton:active {
        top: 5px;
        box-shadow: none;
    }

    .inputButton:focus {
        outline: none;
    }
    .h2register {
        text-align: left;
    }
    .panel-heading {
        padding: 5px;
    }
</style>
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

                                <input type="submit" name="submit" value="submit" class="inputButton"/>

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