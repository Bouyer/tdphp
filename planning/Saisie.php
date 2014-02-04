<?php
if (!empty($_POST["dateAct"]))
{
  echo "it work!";
}

?>

</html>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Séléctioné votre activité</title>

<link rel="stylesheet" href="css/jquery-ui-1.10.4.custom.css"> 
<script src="js/jquery-ui-1.10.4.custom.js"></script> 
<script src="js/jquery-1.10.2.js"></script> 

<script>
$(function() {
$( "#datepicker" ).datepicker();
});
</script>
</head>
<body>
   <h1>Ajouté votre activité :</h1>
    <form action="Saisie.php" method="GET">
    <p> Selectioner votre activité
    <SELECT name="choixAct" size="1">
    <OPTION>Java
    <OPTION>Python
    <OPTION>Anglais
    <OPTION>Repos
    <OPTION>Café
    <OPTION>PHP
    </SELECT>
    </p> 
  <p>Date: <input type="text" name="dateAct" id="datepicker">
  <p>heure: <input type="time" name="heureAct">
  <input type="submit" value="Validé">

  </p>
</body>
</html>