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
	<a href="Versement.php" class="a0">Versement</a>
	<a href="Diplome.php">Diplôme</a>
	<a href="Campagne.php">Campagne</a>
	<a href="Organisme.php">Organisme</a>
	<a href="TelephoneOrg.php">Telephone Organisme</a>
</div>
  <div style="display:flex;">
   	<dib class="div4" style="background-color: #AAA;">Numero versement</dib>
   	<dib class="div4" style="background-color: #AAA;">Date versement</dib>
   	<dib class="div4" style="background-color: #AAA;">Cotisation</dib>
    <dib class="div4" style="background-color: #AAA;">Montant cotisation</dib>
	<dib class="div4" style="background-color: #AAA;">Montant contribution</dib>
	<dib class="div4" style="background-color: #AAA;">Annee</dib>
	<dib class="div4" style="background-color: #AAA;">Numéro diplomé</dib>
	<dib class="div4" style="background-color: #AAA;">Numero Sollicitation</dib>
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
$reponse = $bdd->query('SELECT * FROM versement ');
		while ($donnees = $reponse->fetch())
	{ ?>

   <form action="FicheMembre.php" method="post">
   <div style="display:flex;">
   	<div class="div4" style="height: 20px;"> <?php echo $donnees['Numvers']; ?> </div>
   	<div class="div4" style="height: 20px;"> <?php echo $donnees['Datevers']; ?> </div>
   	<div class="div4" style="height: 20px;"> <?php if($donnees['cotisation']) echo 'Oui'; else echo 'Non';?> </div>
    <div class="div4" style="height: 20px;"> <?php echo $donnees['Montantcot']; ?> </div>
	<div class="div4" style="height: 20px;"> <?php echo $donnees['Montantcontr'];?> </div>
	<div class="div4" style="height: 20px;"> <?php echo $donnees['annee'];?> </div>
	<div class="div4" style="height: 20px;"> <?php  echo $donnees['Numdiplomé']; ?> </div>
	<div class="div4" style="height: 20px;"> <?php echo $donnees['NumSollicitation']; ?>  </div>
	</div>
	</form>

    <?php
    }
   	?>

</body>
</html>