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

    <link rel="stylesheet" href="style.css">

</head>


<body>

<!-- Navbar -->
<nav class="navbar navbar-default">
    <a href="facesym.html"><img src="images/logo.png" alt="FaceSym Logo" id="beginning" width="224" height="64"></a>

    <div class="container">

        <div class="navbar-header">
            <ul class="nav navbar-nav navbar-left">

                <li><a href="index.html">Home</a></li>
                <li><a></a></li>
                <li><a href="info.html">Info</a></li>
            </ul>

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!--<a class="navbar-brand" href="index.html">Home</a>
            <a class="navbar-brand" href="info.html">Info</a>-->



        </div>

        <div class="collapse navbar-collapse" id="myNavbar">


            <ul class="nav navbar-nav navbar-right">

                <li><a href="login.html">Login</a></li>
                <li><a></a></li>
                <li><a href="profile.html">Profile</a></li>
            </ul>
        </div>
    </div>
</nav>


<!-- First Container -->
<div class="container-fluid bg-1 text-center">
    <h3 class="margin">Which one is the original face?</h3>

    <?php
    session_start();

    $_SESSION['userid'] = 1;

    $servername = "localhost";
    $username = "root";
    $password = '';
    $dbname = "facesym";
    $conn = mysqli_connect($servername, $username,$password, $dbname);

    //if game is on and he decided between 10 pictures
    if (isset($_SESSION['games']) && $_SESSION['games'] === 10){
        echo "Spiel beendet";
        echo "Richtige";
        echo $_SESSION['right'];
        echo "Falsche";
        echo $_SESSION['wrong']; ?>

        <script language="javascript" type="text/javascript">
            $.ajax({url: "updateGames.php", async: false});
        </script>
        <?php
        echo "<button id= start type=\"button\" onClick=\"SetPicture()\">Erneut spielen</button>";
    }

// else if no game is in process
    else {
        //if no picture is set he can start the game
        if (!isset($_SESSION['pictur'])) {
            echo "<button id= start type=\"button\" onClick=\"SetPicture()\">Spiel starten</button>";
            //else if picture is set/game is on show pictures
        } else {
            //show right picture on the left
            if ($_SESSION['random'] === 1) {
                echo "<img src='" . $_SESSION['pictur'] . "'/ width=\"250\" height=\"200\" onClick=\"UpdateRightQuestion()\">" ;
                echo "<img src='" . $_SESSION['pictur'] . "'/ width=\"250\" height=\"200\" onClick=\"UpdateWrongQuestion()\" style=\"transform:scaleX(-1)\">";
                echo "<br>";

                //show right picture on the right
            } else {
                echo "<img src='" . $_SESSION['pictur'] . "'/ width=\"250\" height=\"200\" onClick=\"UpdateWrongQuestion()\" style=\"transform:scaleX(-1)\">";
                echo "<img src='" . $_SESSION['pictur'] . "'/ width=\"250\" height=\"200\" onClick=\"UpdateRightQuestion()\">" ;
                echo "<br>";

            }
        }
    }
    ?>

</div>

<script language="javascript" type="text/javascript">
    function UpdateRightQuestion() {
        $.ajax({url: "updateRQ.php", async: false});
        $.ajax({url: "updatePic.php", async: false});
        window.location.reload();
    }

    function UpdateWrongQuestion(){
        $.ajax({url: "updateWQ.php", async: false});
        $.ajax({url: "updatePic.php", async: false});
        window.location.reload();
    }

    function SetPicture(){
        $.ajax({url: "setnewPic.php", async: false});
        window.location.reload();
    }
</script>

<nav>
    <div><h1><strong>FaceSym</strong></h1></div>
    <div class="clear"></div>
    <hr>
    <ul>
        <li><h2><em>Allgemein</em></h2></li>
    </ul>
</nav>
<main>
    <div>
        <article id="black">Willkommen auf der FaceSym Website.</article>
    </div>
    <div><p>Bitte logg' Dich ein um fortzufahren.</p>
    </div>

</main>

<!-- Footer -->
<footer class="text-center">
    <a class="up-arrow" href="#beginning" data-toggle="tooltip" title="TO TOP">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </a><br><br>
    <p><a href="mailto:S1510238016@students.fh-hagenberg.at?subject=Feedback%20FaceSym&amp;body=Liebes%20Pro3-Team,"><address>Wishes, suggestions, complaints,...?!</address></a> <br>
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