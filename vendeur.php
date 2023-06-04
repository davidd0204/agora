<?php 
	session_start();
	if(isset($_SESSION['id'])){
		$user_id= $_SESSION['id'];
		$user_name = $_SESSION['Prénom'];
	}
	else
	{
		echo "Vous n'êtes pas connecté";
		header("Location: nouveauCompte.html");
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Page Vendeur</title>
	<link rel="stylesheet" type="text/css" href="main.css">
	<style type="text/css">
		#deco{
			float: right;
			padding: 10px;
		}
	</style>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<script type="text/javascript">
			$('#logout').click(function() {
				$.ajax({
					url: 'logout.php',
					method: 'POST',
					success: function(response) {
						alert(response); // Affichez la réponse retournée par logout.php
						// Redirigez l'utilisateur vers la page de connexion ou effectuez toute autre action nécessaire après la déconnexion
						window.location.href = 'nouveauCompte.html';
					},
					error: function() {
						alert('Erreur lors de la déconnexion.');
					}
				});
			});
	


	
	</script>
</head>
<body>
	<div class="entre">
		<img src="tech_agora.jpg" border-radius="20%">
		<h1 align="center" class="title">Bienvenue dans l'espace administrateur !</h1>
		<div id="deco">
			<button id="logout">Se déconnecter</button>
		</div>
	</div>

	<div id="controles">
		<table border="1">
			<a href="main.php">
				<button id="acceuil">Home</button>
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
	<div>
</body>
</html>