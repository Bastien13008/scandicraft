
<!DOCTYPE html>
<html lang="en">

<!-- Metadata, Stylesheet, Title -->

<!-- Front Version 7
Created by Jerred Shepherd (RiotShielder) -->

<head>
    <title>Home | ScandiCraft</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="ScandiCraft">
    <meta name="author" content="Jerred Shepherd">
    <link rel="shortcut icon" href="img/favicon.ico">
    
    <link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,300,700" rel='stylesheet' type='text/css'>

    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
</head>

<!-- Navbar Start -->

<body>
  <?php
require_once 'navbar.php'; 
?>




    




    <!-- Main Image -->
    <div class="bg-container">
        <img alt="Background Image" class="random bgimg" height="1920" width="640">
    </div>
    <center>
        <div class="home-text">
            <div class="col-md-6 col-md-offset-3">
                <h1 class="home-title">ScandiCraft</h1>

<?php

?>


                <p class="home-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec massa ipsum, consectetur eget convallis ut, porttitor suscipit risus.</p>

                <p><a class="btn btn-lg btn-primary" href="/shop.html" role="button">Boutique &#187;</a>
                </p>
            </div>
        </div>
    </center>
    <br>
    <br>

    <!-- "Marketing" Area -->

    <div class="container marketing home-img">

        <div class="row">


            <div class="col-lg-4">
                <img class="img-circle img-border" src="img/marketing/1.jpg" height="150" width="150" alt="News 1">
                <h2>News</h2>
                <p>petit news qui permet.</p>
                <p><a class="btn btn-default" href="#" role="button">Details &raquo;</a>
                </p>
            </div>



        </div>



        <!-- Footer -->
        <div id="footer">
            <div class="container hidden-xs">
                <hr>
                <ul class='nav nav-pills'>
                    <li class='pull-left'><a href="http://shepherdjerred.com/">Design by Jerred Shepherd
      </a>
                    </li>

                    <li class="pull-right">
                        <a href="terms.html">Terms</a>
                    </li>

                    <li class="pull-right">
                        <a href="staff.html">Staff</a>
                    </li>
                    
                    <li class="pull-right">
                        <a href="help.html">Help</a>
                    </li>

                </ul>
                <br>
            </div>
        </div>
<script src="http://code.jquery.com/jquery-1.11.2.min.js" type="text/javascript">
</script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript">
</script>

        <script>
            function getRandomInt(min, max) {
                return Math.floor(Math.random() * (max - min + 1)) + min;
            }

            var imagePath = "img/bg/";

            function displayLogo() {
                var filename = "bg" + getRandomInt(1, 4).toString() + ".jpg";

                $(".random").attr({
                    "src": imagePath + filename,
                });
            }

            $(document).ready(function () {
                displayLogo();
            });
        </script>
</body>

</html>