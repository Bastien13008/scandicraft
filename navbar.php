<?php
session_start();

require_once 'config.php'; 
$requete = $bdd->prepare('SELECT * FROM user WHERE id = :id');
$requete->bindParam(':id', $_SESSION['id'], PDO::PARAM_INT);
$requete->execute();
$reponse = $requete->fetch(PDO::FETCH_ASSOC);
?>
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
                <li><a href="index.php"><i class="fa fa-home"></i> Acceuil</a>
                </li>
                <li><a href="play.php"><i class="fa fa-gamepad"></i> Jouer</a>
                </li>
                <li><a href="shop.php"><i class="fa fa-shopping-cart"></i> Boutique</a>
                </li>
                <li><a href="vote.php"><i class="fa fa-check-square-o"></i> Vote</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
<?php
if(is_array($reponse) && $reponse['username']) {
echo '
<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> '. $reponse['username'] .' <b class="caret"></b></a>
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
                <a class="btn btn-info navbar-btn navbar-right hidden-sm hidden-xs">play.scandicraft.net</a>
                
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
    <input type="text" id="pseudo" name="email" required><br><br>
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required><br><br>
    <div>
        <button type="submit" class="btn btn-success">Connexion</button>
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
          echo '<h4 class="modal-title" id="joinHelpLabel">Profil - '. $reponse['username'] .'</h4>';
        ?>
      </div>
      <div class="modal-body text-center">
        <?php
echo '<img src="https://minotar.net/avatar/'. $reponse['username'] .'/100" style="margin-bottom: 20px;">
<p>Pseudo : '. $reponse['username'].'</p>

';


if($reponse['ranks'] == 0) {
  echo"<p>Grade :  Joueur </p>";
}else{
  echo"<p>Grade :  Admin </p>";
}

echo'
<p>Date d\'inscription : '. date('d/m/Y H:i:s', strtotime($reponse['created_date'])) .'</p>
<p>Vote : '.$reponse['vote'].' </p>';




        ?>
        <div style="margin-top: 20px;">
          <button type="submit" class="btn btn-success">Boutique</button>
          <?php
          if($reponse['ranks'] > 0)
          {
       
          echo'    <button type="submit" class="btn btn-danger">BackOffice</button>';
          }else{

          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>

