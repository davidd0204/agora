<?php
$database = "votre compte";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if ($db_found) {
    $sql = "SELECT * FROM `compte client` WHERE `Type` = 1";
    $result = mysqli_query($db_handle, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.supprimer').click(function() {
                var vendeurID = $(this).data('id');
                if (confirm("Voulez-vous supprimer ce vendeur ?")) {
                    $.ajax({
                        url: 'supprimer_vendeur.php',
                        type: 'POST',
                        data: {id: vendeurID},
                        success: function(response) {
                            console.log(response);
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
    <style type="text/css">
        body{
            background-color: rgba(255, 255, 255, 0.3);
        }
        #tableau-vendeurs {
            margin-top: 20px;
            background-color: white;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="entre"><img src="tech_agora.jpg"></div>
    
    <div id="controles">
        <table border="1">
            <a href="accueil2.html">
                <button id="acceuil">Accueil</button>
            </a>
            <form action="parcourir.php" method="post">
                <a href="parcourir.php">
                    <button id="parcourir">Tout Parcourir</button>
                </a>
            </form>
            <a href="notification.html">
                <button id="notification">notifications</button>
            </a>
            <a href="panier.html">
                <button id="panier">Panier</button>
            </a>
            <a href="nouveauCompte.php">
                <button id="compte">Compte</button>
            </a>
        </table>
    </div>

    <div id="tableau-vendeurs">
        <h1>Liste des vendeurs</h1>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Adresse email</th>
                <th>Supprimer Vendeur</th>
            </tr>
            <?php
            while ($data = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $data['id'] . "</td>";
                echo "<td>" . $data['Nom'] . "</td>";
                echo "<td>" . $data['Prénom'] . "</td>";
                echo "<td>" . $data['Email'] . "</td>";
                echo "<td colspan='2' align='center'><button class='supprimer' data-id='" . $data['id'] . "'>Supprimer</button></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>

<?php
} else {
    echo "Database not found";
}
mysqli_close($db_handle);
?>
