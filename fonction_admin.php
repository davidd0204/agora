<?php
	$database = "votre compte"; // Remplacez "votre_base_de_donnees" par le nom de votre base de données
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database); 
	if($db_found)
	{
		$sql = "SELECT * FROM `compte client` WHERE `Type` = 1";
		echo "<h1>Liste des vendeurs</h1>";
		$result = mysqli_query($db_handle, $sql);
		echo "<table border=\"1\">";
		echo "<tr>";
		echo "<th>" . "ID" . "</th>";
		echo "<th>" . "Nom" . "</th>";
		echo "<th>" . "Prénom" . "</th>";
		echo "<th>" . "Adresse email" . "</th>";
		echo "<th>" . "Supprimer Vendeur" . "</th>";
		echo "</tr>";
		while ($data = mysqli_fetch_assoc($result)) {
			// code...
			echo "<tr>";
			echo "<td>" .$data['id'] . "</td>";
			echo "<td>" .$data['Nom'] . "</td>";
			echo "<td>" .$data['Prénom'] . "</td>";
			echo "<td>" .$data['Email'] . "</td>";
			echo "<td><button id='supprimer'>Supprimer</button></td>";
			echo "</tr>";

		}
		echo "</table>";
	}
	else
	{
		echo "database not found";
	}
	mysqli_close($db_handle);
	
?>