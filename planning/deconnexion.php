<?php
  // On prolonge la session
session_start(); 

// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['login']))
  { // Si inexistante ou nulle, on redirige vers authClasseBase.php
    header('Location: authClasse.php');
    exit();
  }
 else {

?>

<!doctype html>
<head>
<meta charset="utf-8">
<title>deconnexion</title>
</head>
<body>
   <H1>Vous êtes deconnecté!!!</H1>
  <p>
   <?php echo "Au revoir ".$_SESSION['login']."<p>";?>
   
  </p>
</body>
</html>
<?php
   }
?>
