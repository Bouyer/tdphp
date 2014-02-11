<?php
	require_once('connect.php');

	$dsn="mysql:dbname=".BASE.";host=".SERVER;
	try{
		$connexion=new PDO($dsn,USER,PASSWD);
	}
	catch(PDOException $e){
		printf("Echec de la connexion : %s \n", $e->getMessage());
		exit();
	}

	$errorMessage='';

	//test de l'envoi du formulaire
	if(!empty($_POST))
	{	
	//les identifiants sont transmis.
		if(!empty($_POST['login']) && !empty($_POST['password']))
		{
			// sont ils les memes?
			// mauvais car facilement piratable.
			// $sql="SELECT * FROM USER where login='".$_POST['login']."' and passwd='".$_POST['password']."'";
			// if($connexion->query($sql)->rowCount()!=1){
			// 	$errorMessage='Mauvaise association';
			// }

			$sql="SELECT * FROM Utilisateur where Login=:login and password=:passwd";

			$statement=$connexion->prepare($sql);
			$statement->bindParam(':login',$_POST['login']);
			$statement->bindParam(':passwd',md5($_POST['password']));
			$statement->execute(); 
			if($statement->rowCount()!=1){
				$errorMessage='Mauvaise association';
			}
			else
			{
				//on ouvre une session
				session_start();
				//on enresgistre le login
				$_SESSION['login']=$_POST['login'];
				//on redirige vers le fihier suite.php
				header('location: choix.php');
			}
		}
		else
		{
			$errorMessage='Veuillez inscrire vos identifiants';
		}
	}
?>

<!doctype html>
<head>
	<meta charset="utf-8">
	<title>Formulaire d\'authentification </title>
</head>
<body>
	<form action=
		"<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<fieldset>
		<legend>Identifiez-vous</legend>
		<?php
			// Rencontre-t-on une erreur ?
			if(!empty($message))
			echo '<p>', htmlspecialchars($message) ,'</p>';
		?>
 		<p>
			<label for="login">Login :</label>
			<input type="text" name="login" id="login" value="" />
		</p>
		<p>
			<label for="password">Password :</label>
			<input type="password" name="password" id="password" value="" />
			<br/>
			<input type="submit" name="submit" value="valider"/>
		</p>
		</fieldset>
	</form> 
</body>
</html>
