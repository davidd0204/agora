<?php
$database = "parcourir";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if ($db_found) {
    $sql_reg = "SELECT * FROM articles_reg";
    $result_reg = mysqli_query($db_handle, $sql_reg);

    $sql_hdg = "SELECT * FROM articles_hdg";
    $result_hdg = mysqli_query($db_handle, $sql_hdg);

    $sql_rare = "SELECT * FROM articles_rare";
    $result_rare = mysqli_query($db_handle, $sql_rare);

    echo "<h1>Liste des articles</h1>";
    echo "<h2>Articles réguliers</h2>";
    echo "<table border=\"1\">";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Nom de l'article</th>";
    echo "<th>Description</th>";
    echo "<th>Prix</th>";
    echo "<th>Catégorie</th>";
    echo "<th>Supprimer</th>";
    echo "</tr>";

    while ($data = mysqli_fetch_assoc($result_reg)) {
        echo "<tr>";
        echo "<td>" . $data['ID'] . "</td>";
        echo "<td>" . $data['Nom_article'] . "</td>";
        echo "<td>" . $data['Description_article'] . "</td>";
        echo "<td>" . $data['Prix_article'] . "</td>";
        echo "<td>" . $data['categorie'] . "</td>";
        echo "<td><button class='supprimer' data-id='" . $data['ID'] . "'>Supprimer</button></td>";
        echo "</tr>";
    }

    echo "</table>";

    echo "<h2>Articles haut de gamme</h2>";
    echo "<table border=\"1\">";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Nom de l'article</th>";
    echo "<th>Description</th>";
    echo "<th>Prix</th>";
    echo "<th>Catégorie</th>";
    echo "<th>Supprimer</th>";
    echo "</tr>";

    while ($data = mysqli_fetch_assoc($result_hdg)) {
        echo "<tr>";
        echo "<td>" . $data['ID'] . "</td>";
        echo "<td>" . $data['Nom_article'] . "</td>";
        echo "<td>" . $data['Description_article'] . "</td>";
        echo "<td>" . $data['Prix_article'] . "</td>";
        echo "<td>" . $data['categorie'] . "</td>";
        echo "<td><button class='supprimer' data-id='" . $data['ID'] . "'>Supprimer</button></td>";
        echo "</tr>";
    }

    echo "</table>";

    echo "<h2>Articles rares</h2>";
    echo "<table border=\"1\">";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Nom de l'article</th>";
    echo "<th>Description</th>";
    echo "<th>Prix</th>";
    echo "<th>Catégorie</th>";
    echo "<th>Supprimer</th>";
    echo "</tr>";

    while ($data = mysqli_fetch_assoc($result_rare)) {
        echo "<tr>";
        echo "<td>" . $data['ID'] . "</td>";
        echo "<td>" . $data['Nom_article'] . "</td>";
        echo "<td>" . $data['Description_article'] . "</td>";
        echo "<td>" . $data['Prix_article'] . "</td>";
        echo "<td>" . $data['categorie'] . "</td>";
        echo "<td><button class='supprimer' data-id='" . $data['ID'] . "'>Supprimer</button></td>";
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
            var articleID = $(this).data('id');
            if (confirm("Voulez-vous supprimer cet article ?")) {
                $.ajax({
                    url: 'supprimer_article_a.php',
                    type: 'POST',
                    data: {id: articleID},
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
