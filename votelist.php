<?php
require_once 'config.php'; 
require_once 'usercheck.php'; 

$requete = $bdd->prepare('SELECT * FROM vote WHERE id="' . $_GET['id'] .'"');
$requete->execute();
$reponsevotelist = $requete->fetch(PDO::FETCH_ASSOC);  



echo''.$reponsevotelist['title'].'
'.$reponsevotelist['link'].'
'.$reponse['vote'].'';


$id_site = $reponsevotelist['id']; // Remplacer par l'ID du site concerné
$id_user = $reponse['id']; // Remplacer par l'ID de l'utilisateur qui a voté

$requete = $bdd->prepare("UPDATE user SET vote=vote+1 WHERE username = '".$reponse['username']."' ");
$requete->execute();
$vote = $requete->fetch(PDO::FETCH_ASSOC);


$requete = $bdd->prepare('INSERT INTO voter (id_site, id_user, cooldown) 
                          VALUES (:id_site, :id_user, NOW())
                          ON DUPLICATE KEY UPDATE cooldown = NOW()');
$requete->bindValue(':id_site', $id_site, PDO::PARAM_INT);
$requete->bindValue(':id_user', $id_user, PDO::PARAM_INT);
$requete->execute();
$boost = $requete->fetch(PDO::FETCH_ASSOC);  




header('Location: '.$reponsevotelist['link'].'');




?>