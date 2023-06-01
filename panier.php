<?php
$database = "ScriptSQL";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
$query = "SELECT * FROM articles";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['nom'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td>" . $row['prix'] . " €</td>";
            echo "<td><button>Supprimer</button></td>";
            echo "</tr>";
        }

        mysqli_close($conn);
        ?>
    </table>
    
    <div class="total">
        <h2 class="montant-total">Total: 25.00 €</h2>
        <button>Passer à la commande</button>
    </div>
</body>
</html>