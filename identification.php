<?php
$database = "votre compte"; // Remplacez "votre_base_de_donnees" par le nom de votre base de données
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$Email = isset($_POST["Email"]) ? $_POST["Email"] : "";
$Password = isset($_POST["Mot_de_passe"]) ? $_POST["Mot_de_passe"] : "";
$erreur = "";

if ($Email == "") {
    $erreur .= "Le champ Email est vide. <br>";
}
if ($Password == "") {
    $erreur .= "Le champ Mot de passe est vide. <br>";
}
if ($erreur == "") {
    if ($db_found) {
        // Échapper les caractères spéciaux pour éviter les injections SQL
        $Email = mysqli_real_escape_string($db_handle, $Email);
        $Password = mysqli_real_escape_string($db_handle, $Password);

        // Vérifier si l'utilisateur existe dans la base de données
        $sql = "SELECT * FROM `compte client` WHERE `Email` = '$Email' AND `Password1` = '$Password'";
        $result = mysqli_query($db_handle, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $typeCompte = $row['Type'];

            if ($typeCompte == 1) {
                echo "Le compte est un compte vendeur.";
            } elseif ($typeCompte == 2) {
                echo "Le compte est un compte acheteur.";
            } elseif ($typeCompte == 0) {
                echo "Le compte est un compte admin.";
            } else {
                echo "Type de compte inconnu.";
            }
        } else {
            echo "Email ou mot de passe incorrect.";
        }

        // Fermer la connexion à la base de données
        mysqli_close($db_handle);
    } else {
        echo "Erreur de connexion à la base de données.";
    }
} else {
    echo "Erreur: <br>" . $erreur;
}
?>


