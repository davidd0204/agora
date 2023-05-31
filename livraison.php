<?php
$database = "societedhonneur";
 $db_handle = mysqli_connect('localhost', 'root', '' );
 $db_found = mysqli_select_db($db_handle, $database);

 $choice = isset($_POST["choix"])? $_POST["choix"] : "";
 if (empty($choice)) {
    $choice = 0;
 }
 $choice = (int)$choice;
 $sql = "";


 if ($db_found) {
    switch ($choice) {
        case 1:
                $sql = "INSERT INTO tableau ( Nom, Prenom )
                        VALUES (110, 'Jean-Pierre', 'Segado', '2019-09-15', 'VP_CONF', 'Information', 18.15, 'France', 'etudiants/segado.jpg')";
                $sql = "SELECT * FROM tableau;"; 
                break;
        /*case 2:
                $sql = "SELECT * FROM  ORDER BY ";
                break;
        case 3:
                $sql = "SELECT * FROM  ORDER BY  DESC";
                break;
        case 4:
                $sql = "SELECT * FROM  WHERE DateNaissance < '1960-01-01'";
                break;
        case 5:
                $sql = "SELECT * FROM  WHERE  LIKE 'G%'"; 
                break;*/
        
        default:
                $sql = "SELECT * FROM "; 
                break;
    }
    echo "<h1>Societe d'honneur</h1>";
    echo "<p>Requête: " . $sql . "<br>";
    echo "Résultat:</p>";

    $result = mysqli_query($db_handle, $sql);
    echo "<table border=\"1\">";
    echo "<tr>";
    echo "<th>" . "ID" . "</th>";
    echo "<th>" . "Nom" . "</th>";
    echo "<th>" . "Prénom" . "</th>";
    echo "<th>" . "Statut" . "</th>";
    echo "<th>" . "Date de naissance" . "</th>";
    echo "<th>" . "Photo" . "</th>";
    echo "</tr>";
    $result = mysqli_query($db_handle, $sql);
    while ($data = mysqli_fetch_assoc($result)) {
        echo "ID: " . $data['ID'] . "<br>";
        echo "Prénom: " . $data['Prénom'] . "<br>";
        echo "DateAdhesion:" . $data['DateAdhesion'] . "<br>";
        echo "Position: " . $data['Position'] . "<br>";
        echo "Majeure: " . $data['Majeure'] . "<br>";
        echo "Moyenne cumulative: " . $data['Moyenne cumulative'] . "<br>";
        echo "PaysEtude Interl: " . $data['PaysEtude Interl'] . "<br>";

 }
 
}

else {
    echo "Database not found";
}
mysqli_close($db_handle);
?>
