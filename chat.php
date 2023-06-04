<?php
session_start();
 if (isset($_GET['logout'])){

 //Message de sortie simple
 $logout_message = "<div class='msgln'><span class='left-info'>User <b class='user-name-left'>" .
 $_SESSION['Prénom'] . "</b> a quitté la session de chat.</span><br></div>";


 $myfile = fopen(__DIR__ . "/log.html", "a") or die("Impossible d'ouvrir le fichier!" . __DIR__ . "/log.html");
 fwrite($myfile, $logout_message);
 fclose($myfile);
 session_destroy();
 sleep(1);
 header("Location: chat.php"); //Rediriger l'utilisateur
 exit;
 }
 if (isset($_POST['enter'])){
 if($_POST['name'] != ""){
 $_SESSION['Prénom'] = stripslashes(htmlspecialchars($_POST['name']));
 header("Location: chat.php");
 exit;
 }
 else{
 echo '<span class="error">Veuillez saisir votre nom</span>';
 }
 }
 function loginForm() {
 echo'
 <div id="loginform">
        <p>Veuillez saisir votre nom pour continuer!</p>
        <form action="chat.php" method="post">
            <label for="name">Nom: </label>
            <input type="text" name="name" id="name" value="' . $_SESSION['Prénom'] . '" />
            <input type="submit" name="enter" id="enter" value="Soumettre" />
        </form>
    </div>';
 }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Chatbox
	</title>
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
		}

		body{
			margin: 20px auto;
			font-family: "Lato";
			font-weight: 300;
		}

		form{
			padding: 15px 25px;
			display: flex;
			gap: 10px;
			justify-content: center;
		}

		form label{
			font-size: 1.5rem;
			font-weight: bolf;
		}

		input{
			font-family: "Lato";
		}

		a{
			color: #0000ff;
			text-decoration: none;
		}

		a:hover{
			text-decoration: underline;
		}

		#wrapper, #loginform{
			margin: 0 auto;
			padding-bottom: 25px;
			background: #eee;
			width: 600px;
			max-width: 100%;
			border: 2px solid #212121;
			border-radius: 4px;
		}

		#loginform{
			padding-top: 18px;
			text-align: center;
		}

		#loginform p{
			padding: 15px 25px;
			font-size: 1.4rem;
			font-weight: bold;
		}

		#chatbox {
			 text-align: left;
			 margin: 0 auto;
			 margin-bottom: 25px;
			 padding: 10px;
			 background: #fff;
			 height: 300px;
			 width: 530px;
			 border: 1px solid #a7a7a7;
			 overflow: auto;
			 border-radius: 4px;
			 border-bottom: 4px solid #a7a7a7;

		}

		#usermsg {
			 flex: 1;
			 border-radius: 4px;
			 border: 1px solid #ff9800;

		}

		#name {
			 border-radius: 4px;
			 border: 1px solid #ff9800;
			 padding: 2px 8px;

		}

		#submitmsg, #enter{
			 background: #ff9800;
			 border: 2px solid #e65100;
			 color: white;
			 padding: 4px 10px;
			 font-weight: bold;
			 border-radius: 4px;
		}

		.error {
 			color: #ff0000;
 		}

 		#menu {
 			padding: 15px 25px;
 			display: flex;
 		}

 		#menu p.welcome {
 			flex: 1;
 		}

 		a#exit {
 			color: white;
			background: #c62828;
			padding: 4px 8px;
			border-radius: 4px;
			font-weight: bold;
 		}

 		.msgln {
 			margin: 0 0 5px 0;
 		}

 		.msgln span.left-info {
 			color: orangered;
 		}

 		.msgln span.chat-time {
 			color: #666;
 			font-size: 60%;
 			vertical-align: super;
 		}

 		.msgln b.user-name, .msgln b.user-name-left {
 			font-weight: bold;
 			background: #546e7a;
 			color: white;
 			padding: 2px 4px;
 			font-size: 90%;
 			border-radius: 4px;
 			margin: 0 5px 0 0;
 		}

 		.msgln b.user-name-left {
 			background: orangered;
 		}

	</style>
</head>
<body>
	<?php
		if(!isset($_SESSION['Prénom'])){
			loginForm();
		}
		else{
			?>
			<div id="wrapper">
				<div id="menu">
					<p class="welcome">Bienvenue, <b><?php echo $_SESSION['Prénom'];?></b></p>
					<p class="logout"><a id="exit" href="#">Quitter la conversation</a></p>
				</div>
				<div id="chatbox">
					<?php
						if(file_exists("log.html") && filesize("log.html") > 0){
 							$contents = file_get_contents("log.html");
 							echo $contents;
 						}

					?>
				</div>
				<form name="message" action="">
					<input type="text" name="usermsg" id="usermsg">
					<input type="submit" name="submitmsg" value="Envoyer" id="submitmsg">
				</form>
			</div>
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			<script type="text/javascript">
				$(document).ready(function(){
					$("form[name='message']").submit(function (e) {
					e.preventDefault();
 					var clientmsg = $("#usermsg").val();
 					$.post("post.php", { text: clientmsg });
 					$("#usermsg").val("");
 					return false;


					});

					function loadLog() {
 						var oldscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Hauteur de défilement avant la requête
 						$.ajax({
 							url: "log.html",
 							cache: false,
 							success: function (html) {
 								$("#chatbox").html(html); //Insérez le log de chat dans la #chatbox div
 								//Auto-scroll
 								var newscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Hauteur de défilement apres la requête
 								if(newscrollHeight > oldscrollHeight){
 									$("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Défilement automatique
 								}
 							}
 						});
 					}
 					setInterval (loadLog, 2500);
 					$("#exit").click(function () {
 						var exit = confirm("Voulez-vous vraiment mettre fin à la session ?");
 						if (exit == true) {
 							window.location = "chat.php?logout=true";
 						}
 					});
 				});

			</script> 
</body>
</html>
<?php } ?>