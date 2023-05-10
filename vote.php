<!DOCTYPE html>
<html lang="en">

<!-- Metadata, Stylesheet, Title -->

<!-- Front Version 7
Created by Jerred Shepherd (RiotShielder) -->

<head>
    <title>Vote | Minecraft Server</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Minecraft Server">
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

    </div>
    <br>
    <br>

    <div class="container">
        <div class="page-header">
            <h1>Vote</h1>
        </div>
        <div class="row">
            <div class="col-md-4 well">
                Voting helps grow our server.
                <br>As a reward for voting, every time you vote, you'll receive between $500 and $5000.
                <br>
                <h3>How to vote:</h3>
                <ol>
                    <li>Click on a voting link
                        <li>Type in your Minecraft Username in the provided box
                            <li>Complete the captcha
                                <li>Send your vote!
                </ol>
                You can vote on every site once every 24 hours.
            </div>


               <?php
             if(is_array($reponse) && $reponse['username']) {
                echo'
                <div class="col-md-6 col-md-offset-1">      ';


                   
require_once 'config.php';
$sql = "SELECT * FROM vote";



$result = $bdd->query($sql);

// $requete = $bdd->prepare('SELECT * FROM voter WHERE id_user = :id');
// $requete->bindParam(':id', $_SESSION['id'], PDO::PARAM_INT);
// $requete->execute();
// $reponse = $requete->fetch(PDO::FETCH_ASSOC);

// $requete = $bdd->prepare('SELECT * FROM vote WHERE id = 1');
// $requete->execute();
// $reponsevote = $requete->fetch(PDO::FETCH_ASSOC);



// // Convertir la chaîne de datetime en objet DateTime
// $cooldown = new DateTime($reponse['cooldown']);

// // Ajouter 50 minutes à l'objet DateTime
// $cooldown->add(new DateInterval('PT60M'));

// // Convertir l'objet DateTime en chaîne de datetime
// $nouveau_cooldown = $cooldown->format('Y-m-d H:i:s');


// $now = new DateTime('now', new DateTimeZone('UTC')); // crée un objet DateTime avec l'heure actuelle en UTC
// $now->setTimezone(new DateTimeZone('Europe/Paris')); // convertit l'heure en heure de Paris



// // Comparer les deux dates
// $diff = $now->diff(new DateTime($nouveau_cooldown));
// if($diff->format('%R') === '+'){
//     echo 'oui'; // La date de nouveau cooldown est dans le futur
// } else{
//     echo 'non'; // La date de nouveau cooldown est dans le passé
// }





if ($result->rowCount() > 0) {
    foreach($result as $row) {



        echo '               
        <div class="col-md-5 col-md-offset-1 well text-center">
        <h3>'.$row['title'].'</h3>
        <p>'.$row['cooldown'].'</p>
        <a type="button" href="votelist.php?id='.$row['id'].'" class="btn btn-primary"><i class="fa fa-check"></i> Vote</a>
        <br>
        </div>';


    }
} else {

}
}
             
             ?>
            </div>

        </div>

    </div>

    <!-- Footer -->

    <div class="container hidden-sm hidden-xs">
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
<script src="http://code.jquery.com/jquery-1.11.2.min.js" type="text/javascript">
</script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript">
</script>
</body>

</html>