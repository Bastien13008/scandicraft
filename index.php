<?php
session_start();
?>
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
    <div class="navbar-wrapper">

            <div class="navbar navbar-default navbar-fixed navbar-static-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand accent" href="">ScandiCraft</a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="index.html"><i class="fa fa-home"></i> Acceuil</a>
                            </li>
                            <li><a href="play.php"><i class="fa fa-gamepad"></i> Jouer</a>
                            </li>
                            <li><a href="forum"><i class="fa fa-comments-o"></i> Article</a>
                            </li>
                            <li><a href="shop.html"><i class="fa fa-shopping-cart"></i> Boutique</a>
                            </li>
                            <li><a href="vote.html"><i class="fa fa-check-square-o"></i> Vote</a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
<?php
if (isset($_SESSION["pseudo"])) {
    echo '
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> '. $_SESSION["pseudo"] .' <b class="caret"></b></a>
    <ul class="dropdown-menu">
        <li><a href="#" data-toggle="modal" data-target="#profil">Profil</a>
        </li>
        <li><a href="logout.php">Deconnexion</a>
        </li>
        ';

} else {
    echo '
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Compte <b class="caret"></b></a>
    <ul class="dropdown-menu">
        <li><a href="#" data-toggle="modal" data-target="#login">Login</a>
        </li>
        <li><a href="#" data-toggle="modal" data-target="#signup">Register</a>
        </li>
        ';}
?>

                                </ul>
                            </li>
                            <a href="play.php" class="btn btn-info navbar-btn navbar-right hidden-sm hidden-xs">IP: play.scandicraft.net</a>
                        </ul>
                    </div>
                </div>
            </div>

    </div>

    
    <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="signup" aria-hidden="true">
  <div class="modal-dialog px-4">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="joinHelpLabel">Connexion - Panel</h4>
      </div>

      <div class="mx-auto">
        <form method="POST" action="inscription.php">
          <div>
            <label for="pseudo">Pseudo :</label>
            <input type="text" id="pseudo" name="pseudo" required>
          </div>
          <div>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
          </div>
          <div>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
          </div>
          <div>
            <label for="confirm_password">Confirmation de mot de passe :</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
          </div>
          <div class="mt-2">
            <button type="submit" class="btn btn-success">S'inscrire</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>


    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="joinHelpLabel">Connexion - Panel</h4>
                </div>


   


<form method="POST" action="login.php">
    <label for="pseudo">Pseudo :</label>
    <input type="text" id="pseudo" name="pseudo" required><br><br>
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required><br><br>
    <div>
        <button type="submit" class="btn btn-success">S'inscrire</button>
    </div>
</form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="profil" tabindex="-1" role="dialog" aria-labelledby="profil" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <?php
          echo '<h4 class="modal-title" id="joinHelpLabel">Profil - '. $_SESSION["pseudo"] .'</h4>';
        ?>
      </div>
      <div class="modal-body text-center">
        <?php
          echo '<img src="https://minotar.net/avatar/'. $_SESSION["pseudo"] .'/100" style="margin-bottom: 20px;">';
        ?>
        <p>Grade : </p>
        <p>Date d'inscription : </p>
        <p>Vote : </p>
        <div style="margin-top: 20px;">
          <button type="submit" class="btn btn-success">S'inscrire</button>
        </div>
      </div>
    </div>
  </div>
</div>





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