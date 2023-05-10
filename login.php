<?php
require_once 'config.php'; 
session_start();
if(isset($_POST['email']) && isset($_POST['password']))
{
    $email = $_POST['email']; 
    $password = $_POST['password'];

    if($email !== "" && $password !== ""){
        $requete = $bdd->prepare("SELECT count(*), id, password FROM user WHERE email = ? AND password = ? GROUP BY id");
        $requete->bindParam(1, $email);
        $requete->bindParam(2, md5($password));
        $requete->execute();
        $reponse = $requete->fetch(PDO::FETCH_ASSOC);
        $count = $reponse['count(*)'];
        if($count!=0) 
        {  
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $reponse['id'];
            $_SESSION['acces'] = 1;
            header('Location: index.php');
        }
        else
        {
            header('Location: index.php');
        }
    }
}
else
{
    header('Location: index.php');
}

?>