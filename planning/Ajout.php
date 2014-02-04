
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Ajouté  une activité</title>
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script> $(function() { $( "#datepicker" ).datepicker(); });</script>
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
    <p> Date de l'activité : 
    <input type="text" id="datepicker" name="dateAct">
    </p>
    <!-- <p>
    Heure de l'activité :
    <input type="time" name="HeureAct" required title="HH/MM">
    <input type="submit" value="Validé">
    </p> -->
  </body>
</html>
