<?php
$database = "ScriptSQL";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
if ($db_found) {
    $query = "SELECT * FROM articles";
    $result = mysqli_query($db_handle, $query);

    $articles = array(); // Tableau pour stocker les articles

    while ($row = mysqli_fetch_assoc($result)) {
        $article = array(
            'nom' => $row['nom'],
            'description' => $row['description'],
            'prix' => $row['prix']
        );

        $articles[] = $article; 
    }

    mysqli_close($db_handle);

    // Encoder les articles en JSON
    $articles_json = json_encode($articles);

    // Envoyer les données JSON en réponse
    header('Content-Type: application/json');
    echo $articles_json;
} else {
    echo "Erreur de connexion à la base de données.";
}
?>
