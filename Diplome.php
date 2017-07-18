<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div id="nav">
	<a href="Membre.php">Membre</a>
	<a href="Sollicitation.php">Sollicitation</a>
	<a href="Versement.php">Versement</a>
	<a href="Diplome.php" class="a0">Diplôme</a>
	<a href="Campagne.php">Campagne</a>
	<a href="Organisme.php">Organisme</a>
	<a href="TelephoneOrg.php">Telephone Organisme</a>
</div>
 <div style="display:flex;">
   	<dib class="div4" style="background-color: #AAA;">Numero diplome</dib>
   	<dib class="div4" style="background-color: #AAA;">Type diplome</dib>
   	<dib class="div4" style="background-color: #AAA;">Departement</dib>
    <dib class="div4" style="background-color: #AAA;">Faculte</dib>
</div>
<?php
try
{
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
$reponse = $bdd->query('SELECT * FROM diplome ');
		while ($donnees = $reponse->fetch())
	{ ?>
	
   <form action="FicheMembre.php" method="post">
   <div style="display: flex;">
   		<div class="div4" style="height: 20px;"> <?php echo $donnees['NumDiplome']; ?></div>
   		<div class="div4" style="height: 20px;"> <?php echo $donnees['Type']; ?></div>
		<div class="div4" style="height: 20px;"> <?php  echo $donnees['Departement']; ?></div>
		<div class="div4" style="height: 20px;"> <?php  echo $donnees['Faculte']; ?></div>
	</div>
	</form>

    <?php
    }
   	?>

</body>
</html>