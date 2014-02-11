<?php
	require_once('connect.php');
	session_start();


	$dsn="mysql:dbname=".BASE.";host=".SERVER;
	try{
		$connexion=new PDO($dsn,USER,PASSWD);
	}
	catch(PDOException $e){
		printf("Echec de la connexion : %s \n", $e->getMessage());
		exit();
	}
	$id=0;
	$errorMessage='';
	echo $_SESSION['login']."<br/>";
	
	$sql2="SELECT * FROM Utilisateur where Login=:login";
	$stat=$connexion->prepare($sql2);
	$stat->bindParam(':login',$_SESSION['login']);
	$stat->execute();

	if($stat->rowCount()==0)
    	echo "Inconnu! <br>";
	
	foreach ($stat as $row1) 
	{
		$id=$row1['IdUtil'];
	}
	
	//activité faites par le login

	$sql="SELECT * FROM Faire where IdUtil=:id";
	$statement=$connexion->prepare($sql);
	$statement->bindParam(':id',$id);
	$statement->execute(); 

?>

<!doctype html>
<head>
	<meta charset="utf-8">
	<title>Emploi du temps</title>
</head>
<body>
	<p>voici votre emploi du temps, cliquez sur OK pour continuer
</p>
	<?php  
	if(!$statement)
    	echo "pb d'accés a la BD";
    else
    { 
    	if($statement->rowCount()==0)
    	echo "Sans activité! <br>";
	    else
	    { 
			foreach ($statement as $row) 
			{ 
				//recuperation du nom de l'activité

				$sql3="SELECT NomAct FROM Activite where IdAct=:idA";
				$stmt=$connexion->prepare($sql3);
				$stmt->bindParam(':idA',$row['IdAct']);
				$stmt->execute(); 
				foreach ($stmt as $row3) 
				{	
			    	echo $row3['NomAct'] . " " . $row['dateAct'] ." " . $row['heureAct'] . "<br> "; 
				}
		    } 
		}
	}
    ?>
  <form action="choix.php" method="GET">
  <input type="submit" value="ok">
</form>
</body>
</html>