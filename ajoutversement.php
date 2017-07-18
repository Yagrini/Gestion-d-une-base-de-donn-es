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
	<a href="Faculte.php">Faculte</a>
	<a href="Departement.php">Departement</a>
	<a href="Organisme.php">Organisme</a>
	<a href="TelephoneOrg.php">Telephone Organisme</a>
</div>
<?php
		try
{
    $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
		$reponse = $bdd->query('SELECT * FROM membre ');
?>
<?php
$vers = $bdd->query('INSERT INTO versement(Datevers,Montantcot,cotisation,Montantcontr,annee,Numdiplomé) VALUES(\'1998_01_02\',1928,1,0,1998,1)');  
?>
	<form action="Membre.php" method="post">
   		<div class="ajoutdiplome"> Date Versement : <input type="date" placeholder="aaaa_mm_jj" name="datevers"></div>
   		<div class="ajoutdiplome"> Cotisation : <input type="boolean" placeholder="1 ou 0" name="cot"></div>
    	<div class="ajoutdiplome"> Montant Cotisation : <input type="number" name="montcot"></div>
		<div class="ajoutdiplome"> Montant Contribution : <input type="number" name="montcont"></div>
		<div class="ajoutdiplome"> Année de versement : <input type="number" name="anne"></div>
		<div class="ajoutdiplome"> <button name="idajoutver" value="<?php echo $_POST['id2'];?>"> AJOUTER  </div>
	</form>
</body>
</html>