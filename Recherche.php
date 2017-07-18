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
<div style="display: flex; ">
		<div class="div0" style="width:66px; height:40px;"></div>
   		<div class="div1" style="background-color: #AAA;">Nom</div>
    	<div class="div2" style="background-color: #AAA;">Prenom</div>
		<div class="div3" style="background-color: #AAA;">Date de naissance</div>
		<div class="div4" style="background-color: #AAA;">adresse domicile</div>
		<div class="div5" style="background-color: #AAA;">adresse travail</div>
		<div class="div6" style="background-color: #AAA;">Telephone</div>
		<div class="div6" style="background-color: #AAA;"> Membre CA</div>
		<div class="div7" style="background-color: #AAA;"> Membre Executif</div>
		<div class="div8" style="background-color: #AAA; width: 168px;"></div>
	</div>
<?php
		try
{
    $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', 'root');
    $conn = mysqli_connect("localhost", "root", "root", "projet");
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
		$reponse = $bdd->query('SELECT * FROM membre ');
?>
<?php
if($_POST["rech"]) 
{
	$nom = $_POST["rech"];
	$rep = $bdd->prepare('SELECT * FROM membre WHERE  Nom=?');
	$rep->execute(array($nom));
	$trouve=1;
		while ($donnees = $rep->fetch())
	{ ?>
	<?php $trouve=0;?>
   <form action="FicheMembre.php" method="post">
   <div style="display: flex;" >
   		<div > <button class="div0" name="id" value="<?php echo $donnees['NumDiplomé']; ?>">Fiche Membre <?php echo $donnees['NumDiplomé']; ?> </button>  </div>
   		<div class="div1">   <?php echo $donnees['Nom']; ?> </div>
    	<div class="div2">   <?php echo $donnees['Prenom']; ?> </div>
		<div class="div3">   <?php echo $donnees['Date_de_naissance'];?> </div>
		<div class="div4">   <?php echo $donnees['adresse_domicile'];?> </div>
		<div class="div5">   <?php echo $donnees['adresse_travail'];?> </div>
		<div class="div6">   <?php echo '0'.$donnees['telephone'];?> </div>
		<div class="div6">   <?php  if($donnees['Membre_CA']) echo 'Oui'; else echo 'Non'; ?> </div>
		<div class="div7">   <?php if($donnees['Membre_Executif'])echo 'Oui'; else echo 'Non'; ?>  </div>
	</form>
	<form action="ajoutdiplome.php" method="post">
	<div style="display: block;">
		<div><button class="div8"  style="height: 26px;" name="id1" value="<?php echo $donnees['NumDiplomé']; ?> ">Ajouter Diplôme membre <?php echo $donnees['NumDiplomé']; ?></button> </div>
	</form>
	<form action="ajoutversement.php" method="post">
		<div > <button class="div9"  style="height: 26px;" name="id2" value="<?php echo $donnees['NumDiplomé']; ?> ">Ajouter Versement membre <?php echo $donnees['NumDiplomé']; ?></button></div>
	</form>
	</div>
 
	</div>
    <?php
    }
    if($trouve==1) { ?> <div style="color:red; font-size: 24pt;"> <?php echo"Pas de membre avec le nom: $nom";}?></div>
   	

<?php
}
?>
    <?php
if($_POST["rrech"]) 
{
	$nom = $_POST["rrech"];
	$rep = $bdd->prepare('SELECT * FROM membre WHERE  Prenom=?');
	$rep->execute(array($nom));
	$trouve=2;
		while ($donnees = $rep->fetch())
	{ ?>
	<?php $trouve=0;?>
   <form action="FicheMembre.php" method="post">
   <div style="display: flex;" >
   		<div > <button class="div0" name="id" value="<?php echo $donnees['NumDiplomé']; ?>">Fiche Membre <?php echo $donnees['NumDiplomé']; ?> </button>  </div>
   		<div class="div1">   <?php echo $donnees['Nom']; ?> </div>
    	<div class="div2">   <?php echo $donnees['Prenom']; ?> </div>
		<div class="div3">   <?php echo $donnees['Date_de_naissance'];?> </div>
		<div class="div4">   <?php echo $donnees['adresse_domicile'];?> </div>
		<div class="div5">   <?php echo $donnees['adresse_travail'];?> </div>
		<div class="div6">   <?php echo '0'.$donnees['telephone'];?> </div>
		<div class="div6">   <?php  if($donnees['Membre_CA']) echo 'Oui'; else echo 'Non'; ?> </div>
		<div class="div7">   <?php if($donnees['Membre_Executif'])echo 'Oui'; else echo 'Non'; ?>  </div>
	</form>
	<form action="ajoutdiplome.php" method="post">
	<div style="display: block;">
		<div><button class="div8"  style="height: 26px;" name="id1" value="<?php echo $donnees['NumDiplomé']; ?> ">Ajouter Diplôme membre <?php echo $donnees['NumDiplomé']; ?></button> </div>
	</form>
	<form action="ajoutversement.php" method="post">
		<div > <button class="div9"  style="height: 26px;" name="id2" value="<?php echo $donnees['NumDiplomé']; ?> ">Ajouter Versement membre <?php echo $donnees['NumDiplomé']; ?></button></div>
	</form>
	</div>
 
	</div>
    <?php
    }
    if($trouve==2) { ?> <div style="color:red; font-size: 24pt;"> <?php echo"Pas de membre avec le prenom: $nom";}?></div>
<?php
}
?>
</body>
</html>

