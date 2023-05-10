<?php
session_start();

require_once 'config.php'; 
$requete = $bdd->prepare('SELECT * FROM user WHERE id = :id');
$requete->bindParam(':id', $_SESSION['id'], PDO::PARAM_INT);
$requete->execute();
$reponse = $requete->fetch(PDO::FETCH_ASSOC);
?>