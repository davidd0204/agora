<?php
    $database = "votre compte";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    if ($db_found) {
        $sql = "SELECT * FROM `compte client` WHERE `Type` = 1";

        $result = mysqli_query($db_handle, $sql);

        echo "<h1>Liste des vendeurs</h1>";
        echo "<table border=\"1\">";
        echo "<tr>";
        echo "<th>" . "ID" . "</th>";
        echo "<th>" . "Nom" . "</th>";
        echo "<th>" . "Prénom" . "</th>";
        echo "<th>" . "Adresse email" . "</th>";
        echo "<th>" . "Supprimer Vendeur" . "</th>";
        echo "</tr>";

        while ($data = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $data['id'] . "</td>";
            echo "<td>" . $data['Nom'] . "</td>";
            echo "<td>" . $data['Prénom'] . "</td>";
            echo "<td>" . $data['Email'] . "</td>";
            echo "<td colspan='2' align='center'><button class='supprimer' data-id='" . $data['id'] . "'>Supprimer</button></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Database not found";
    }
    mysqli_close($db_handle);
?>

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
                        // Gérer les erreurs
                        console.log(xhr.responseText);
                    }
                });
            }
        });
    });
</script>

