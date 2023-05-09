<?php

// Vérifier si le formulaire est soumis
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Récupérer les données du formulaire
    $pseudo = trim($_POST["pseudo"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $confirm_password = trim($_POST["confirm_password"]);

    // Vérifier si tous les champs sont remplis
    if(!empty($pseudo) && !empty($email) && !empty($password) && !empty($confirm_password)){

        // Vérifier si le mot de passe et la confirmation de mot de passe sont identiques
        if($password == $confirm_password){

            // Hacher le mot de passe avec l'algorithme de hachage MD5
            $hashed_password = md5($password);

            // Récupérer la date d'aujourd'hui
            $today = date("Y-m-d-h-m-s");

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

            // Vérifier si l'email ou le pseudo sont déjà enregistrés dans la base de données
            $sql = "SELECT * FROM user WHERE username='$pseudo' OR email='$email'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "Erreur: Le pseudo ou l'email est déjà utilisé par un autre utilisateur.";
            } else {
                // Insérer l'utilisateur dans la base de données
                $sql = "INSERT INTO user (username, email, password, vote, ranks, created_date) VALUES ('$pseudo', '$email', '$hashed_password', 0, 0, '$today')";

                if ($conn->query($sql) === TRUE) {
                    echo "L'utilisateur a été enregistré avec succès.";
                } else {
                    echo "Erreur: " . $sql . "<br>" . $conn->error;
                }
            }

            // Fermer la connexion à la base de données
            $conn->close();

        } else {
        }

    } else {
    }
}

?>
