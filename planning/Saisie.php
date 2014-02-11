<?php
  require_once('connect.php');
  session_start();
  $dsn="mysql:dbname=".BASE.";host=".SERVER;
  try{
    $connexion=new PDO($dsn,USER,PASSWD);
  }
  catch(PDOException $e)
  {
    printf("Echec de la connexion : %s \n", $e->getMessage());
    exit();
  }

  $errorMessage='';
  //test de l'envoi du formulaire
  if(!empty($_POST))
  { 
    if(!empty($_POST['dateAct']) && !empty($_POST['heureAct']))
    {
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
   
    $sql1="SELECT idAct FROM Activite WHERE NomAct=:choixAct";
    $stmt=$connexion->prepare($sql1);
    $stmt->bindParam(':choixAct',$_POST['choixAct']);
    $stmt->execute(); 

    if($stmt->rowCount()==0)
      echo "Activite Inconnu! <br>";
    
    foreach ($stmt as $row) 
    {
     $idAct=$row['idAct'];
    }
    $sql="INSERT INTO `DBgueri`.`Faire` (`IdUtil`, `IdAct`, `dateAct`, `heureAct`) VALUES(:idUtil,:idAct,:dateAct,:heureAct)";
    
    $statement=$connexion->prepare($sql);
    $statement->bindParam(':idUtil',$id);
    $statement->bindParam(':idAct',$idAct);
    $statement->bindParam(':dateAct',$_POST['dateAct']);
    $statement->bindParam(':heureAct',$_POST['heureAct']);
    $statement->execute(); 
   }
 }
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Activité ajouté</title>
</head>
<p>Votre activité a été ajouté, cliquez sur ok pour continuer
</p>
  <form action="choix.php" method="GET">
  <input type="submit" value="ok">
</form>
  <body>
   
  </body>
</html>