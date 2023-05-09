<?php
// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Récupérer les données du formulaire
    $pseudo = trim($_POST["pseudo"]);
    $password = trim($_POST["password"]);

    // Vérifier si tous les champs sont remplis
    if (!empty($pseudo) && !empty($password)) {

        // Hacher le mot de passe avec l'algorithme de hachage MD5
        $hashed_password = md5($password);

        // Établir une connexion à la base de données
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "scandicraft_web";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Vérifier si la connexion a échoué
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Préparer et exécuter la requête SQL pour récupérer l'utilisateur correspondant au pseudo et au mot de passe
        $sql = "SELECT * FROM user WHERE username='$pseudo' AND password='$hashed_password'";
        $result = $conn->query($sql);

        // Vérifier si la requête a retourné un résultat
        if ($result->num_rows > 0) {
            // Démarrer la session et stocker le pseudo de l'utilisateur dans une variable de session
            session_start();
            $_SESSION["pseudo"] = $pseudo;

            // Rediriger l'utilisateur vers une page de succès
            header("Location: index.php");
            exit();
        } else {
            // Si la requête ne retourne pas de résultat, afficher un message d'erreur
            echo "<script>alert('Pseudo ou mot de passe incorrect.');</script>";
            header("Location: index.php");
        }

        // Fermer la connexion à la base de données
        $conn->close();

    } else {
        echo "Erreur : Tous les champs sont obligatoires.";
        header("Location: index.php");
    }
}
?>

