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

    <!-- scales the page ( for mobile) -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="/styles/style.css">
    <link rel="stylesheet" href="/styles/style_index.css">

</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-default">
    <a href="/index.php"><img src="images/logo.png" alt="FaceSym Logo" id="beginning" width="224" height="64"></a>

    <div class="container">

        <div class="navbar-header">
            <ul class="nav navbar-nav navbar-left">

                <li><a href="index.php">Home</a></li>
                <li><a></a></li>
                <li><a href="/op/info.html">Info</a></li>
            </ul>

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>

        <div class="collapse navbar-collapse" id="myNavbar">


            <ul class="nav navbar-nav navbar-right">

                <li><a href="/op/login.php">Login</a></li>
                <li><a></a></li>
                <li><a href="/op/profilepage.php">Profile</a></li>
            </ul>
        </div>
    </div>
</nav>


<!-- First Container -->
<div id ="gameupdate" class="container-fluid bg-1 text-center">

    <?php session_start();
    if (isset ($_SESSION['username'])) {
        ?> <h3 class="margin">Which one is the original face?</h3> <?php
    }
    ?>

    <?php
    session_start();
    if (!isset($_SESSION['username'])){
        ?>
        <br>
        <h2>Welcome to FaceSym!</h2>
        <br>
        <a href="./op/login.php"><img src="images/key.jpg" alt="Key Icon" id="beginning" width="100" height="75"></a>
        <br>
        <br>
        <h3> Please <a href="./op/login.php">login </a> to play the game! </h3>
        <hr>
    <?php }
    else {
    //if game is on and he decided between 10 pictures
    /* if (isset($_SESSION['games']) && $_SESSION['games'] >= 10){
         echo "Game finished: ";
         echo $_SESSION['right'];
         echo " questions right and ";
         echo $_SESSION['wrong'];
         echo " questions wrong!"; ?>*/


    if (isset($_SESSION['games']) && $_SESSION['games'] >= 10){
    ?> <div>Game finished:
        <?php echo '<span style = "font-weight:bold ; color:green;">' . $_SESSION['right'].'</span>';
        ?>  questions right and
        <?php echo '<span style = "font-weight:bold; color:darkred;">'. $_SESSION['wrong'].'</span>';
        ?> questions wrong!</div>
		<?php
		if ($_SESSION['updat'] == 0){?>
        <script language="javascript" type="text/javascript">
            $.ajax({url: "/op/updateGames.php", async: false});
            // window.location.reload();
        </script>
		<?php }
		?>
        <style>
            button {
                margin-top: 90px; !important;
                text-align: center; !important;
                float: none;!important;
            }
        </style>

        <?php

        echo "<button align='center' id= start type=\"button\" onClick=\"SetPicture()\" class=\"btn btn-primary btn-circle\">Replay</button>";
    }

// else if no game is in process
    else {
?>

<?php
    //if no picture is set he can start the game
        if (!isset($_SESSION['pictur'])) {
           ?>
        <style>
            button {
                margin-top: 90px; !important;
                text-align: center; !important;
                float: none;!important;
            }
        </style>
<?php
            echo "<button id= start type=\"button\" onClick=\"SetPicture()\"class=\"btn btn-primary btn-circle\">Start game</button>";
            //else if picture is set/game is on show pictures
        } else {
            //show right picture on the left
            if ($_SESSION['random'] === 1) {
                echo "<img src='" . $_SESSION['pictur'] . "'/ width=\"250\" height=\"200\" onClick=\"UpdateRightQuestion()\" class=\"imager\">" ;
                echo "&nbsp;";
                echo "&nbsp;";
                echo "&nbsp;";
                echo "&nbsp;";
                echo "<img src='" . $_SESSION['pictur'] . "'/ width=\"250\" height=\"200\" onClick=\"UpdateWrongQuestion()\" style=\"transform:scaleX(-1)\" class=\"imagew\">";
                //show right picture on the right
            } else {
                echo "<img src='" . $_SESSION['pictur'] . "'/ width=\"250\" height=\"200\" onClick=\"UpdateWrongQuestion()\" style=\"transform:scaleX(-1)\" class=\"imagew\">";
                echo "&nbsp;";
                echo "&nbsp;";
                echo "&nbsp;";
                echo "&nbsp;";
                echo "<img src='" . $_SESSION['pictur'] . "'/ width=\"250\" height=\"200\" onClick=\"UpdateRightQuestion()\" class=\"imager\">" ;
            }
        }
    }
    }
    ?>


    <script language="javascript" type="text/javascript">
        function UpdateRightQuestion() {
            document.getElementById("ir").style.visibility ="visible";
            setTimeout(function() {
                document.getElementById("ir").style.visibility ="hidden";
                $.ajax({url: "/op/updateRQ.php", async: false});
                $.ajax({url: "/op/updatePic.php", async: false});
                //$("#gameupdate").load(location.href + " #gameupdate");
                window.location.reload();
            }, 1000);
        }
        function UpdateWrongQuestion(){
            document.getElementById("iw").style.visibility ="visible";
            setTimeout(function() {
                document.getElementById("iw").style.visibility ="hidden";
                $.ajax({url: "/op/updateWQ.php", async: false});
                $.ajax({url: "/op/updatePic.php", async: false});
                //$("#gameupdate").load(location.href + " #gameupdate");
                window.location.reload();
            }, 1000);
        }
        function SetPicture(){
            $.ajax({url: "/op/setnewPic.php", async: false});
            //$("#gameupdate").load(location.href + " #gameupdate");
            window.location.reload();
        }
    </script>
    <br><br><br><br>
    <div class="alert alert-success" id="ir">
        <strong>Right!</strong>
    </div>


    <div class="alert alert-danger" id="iw">
        <strong>Wrong!</strong>
    </div>




    <?php session_start();
    if (isset ($_SESSION['username'])) {
    ?>    <div class="container">
            <div class="item <?php if ($_SESSION['one'] == 1) { echo "right"; } else if($_SESSION['one'] == 2) { echo "wrong"; }?>"></div>
            <div class="item <?php if ($_SESSION['two'] == 1) { echo "right"; } else if($_SESSION['two'] == 2) { echo " wrong"; }?>"></div>
            <div class="item <?php if ($_SESSION['three'] == 1) { echo " right"; } else if($_SESSION['three'] == 2) { echo " wrong"; }?>"></div>
            <div class="item <?php if ($_SESSION['four'] == 1) { echo " right"; } else if($_SESSION['four'] == 2) { echo " wrong"; }?>"></div>
            <div class="item <?php if ($_SESSION['five'] == 1) { echo " right"; } else if($_SESSION['five'] == 2) { echo " wrong"; }?>"></div>
            <div class="item <?php if ($_SESSION['six'] == 1) { echo " right"; } else if($_SESSION['six'] == 2) { echo " wrong"; }?>"></div>
            <div class="item <?php if ($_SESSION['seven'] == 1) { echo " right"; } else if($_SESSION['seven'] == 2) { echo " wrong"; }?>"></div>
            <div class="item <?php if ($_SESSION['eight'] == 1) { echo " right"; } else if($_SESSION['eight'] == 2) { echo " wrong"; }?>"></div>
            <div class="item <?php if ($_SESSION['nine'] == 1) { echo " right"; } else if($_SESSION['nine'] == 2) { echo " wrong"; }?>"></div>
            <div class="item <?php if ($_SESSION['ten'] == 1) { echo " right"; } else if($_SESSION['ten'] == 2) { echo " wrong"; }?>"></div>
        </div> <?php
    }
    ?>

</div>

<!-- Footer -->
<footer class="text-center">

    <a class="up-arrow" href="#beginning" data-toggle="tooltip" title="TO TOP">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </a><br><br>
    <p><a href="mailto:S1510238016@students.fh-hagenberg.at?subject=Feedback%20FaceSym&amp;body=Liebes%20Pro3-Team,"><address>Wishes, suggestions, complaints,...?!</address></a> <br>

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/de_DE/sdk.js#xfbml=1&version=v2.8";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

    <div class="fb-like" data-href="http://face-sym.projekte.fh-hagenberg.at/index.php" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
<br>
    <br><address><a id="autor">© Julia Flath, Dominik Kolberger, Matthias Roiss, Belinda Thaler</a><br></address>
    </p>
</footer>

<script>
    $(document).ready(function(){
        // Initialize Tooltip
        $('[data-toggle="tooltip"]').tooltip();
        // Add smooth scrolling to all links in navbar + footer link
        $(".navbar a, footer a[href='#beginning']").on('click', function(event) {
            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();
                // Store hash
                var hash = this.hash;
                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 900, function(){
                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
        });
    })
</script>

<script>
    var width = $(window).width();
    $(window).resize(function(){
        if($(this).width() < 756){
            width = $(this).width();
            console.log(width);
            var logo = document.getElementById("beginning");
            logo.style.opacity = 0;
        } else if ($(this).width() < 1000 && $(this).width() > 756) {
            width = $(this).width();
            console.log(width);
            var logo = document.getElementById("beginning");
            logo.style.opacity = 0.15;
        } else {
            width = $(this).width();
            console.log(width);
            var logo = document.getElementById("beginning");
            logo.style.opacity = 100;
        }
    });
</script>

</body>
</html>