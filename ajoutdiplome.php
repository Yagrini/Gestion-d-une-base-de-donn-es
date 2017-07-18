<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div id="nav">
	<a href="Membre.php" >Membre</a>
	<a href="Sollicitation.php">Sollicitation</a>
	<a href="Versement.php">Versement</a>
	<a href="Diplome.php">Diplôme</a>
	<a href="Campagne.php">Campagne</a>
	<a href="Organisme.php">Organisme</a>
	<a href="TelephoneOrg.php">Telephone Organisme</a>
</div>

	<form action="Membre.php" method="post">
   		<div class="ajoutdiplome"> Type Diplome : <input type="text" name="type"></div>
   		<div class="ajoutdiplome"> Annee Obtention : <input type="text" name="anneeobt"></div>
    	<div class="ajoutdiplome"> Nom Departement : <input type="text" name="nomdep"></div>
		<div class="ajoutdiplome"> Nom Faculté : <input type="text" name="nomfaculte"></div>
		<div class="ajoutdiplome"> <button name="idajout" value="<?php echo $_POST['id1'];?>"> AJOUTER </button> </div>
	</form>
</body>
</html>