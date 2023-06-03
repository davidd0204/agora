<?php
	$database = "votre compte"; // Remplacez "votre_base_de_donnees" par le nom de votre base de données
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database); 
	if($db_found)
	{
		$sql = "SELECT * FROM `compte client` WHERE `Type` = 1";
		$result = mysqli_query($db_handle, $sql);
		while ($data = mysqli_fetch_assoc($result)) {
			// code...
			echo "Nom : " .$data['Nom'] . "<br>";
			echo "Prénom : " .$data['Prénom'] . "<br>";
			echo "Adresse : " .$data['Adresse'] . "<br>";
			echo "Email : " .$data['Email'] . "<br>";

		}
	}
	else
	{
		echo "database not found";
	}
	mysqli_close($db_handle);
	
?>