<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div id="nav">
	<a href="Membre.php" class="a0">Membre</a>
	<a href="Sollicitation.php">Sollicitation</a>
	<a href="Versement.php">Versement</a>
	<a href="Diplome.php">Diplôme</a>
	<a href="Campagne.php">Campagne</a>
	<a href="Organisme.php">Organisme</a>
	<a href="TelephoneOrg.php">Telephone Organisme</a>
	<form action="Recherche.php" method="post" style="display: flex;">
	<input style="width:170px; height: 25px; margin-top: 10px;font-size: 12pt; border:1px solid black; " placeholder="Par Nom" type="text" name="rech"/>
	<input style="width:75px; height: 29px; margin-top:  10px;border:1px solid black;font-size: 10pt; " value="Recherche" type="submit" name="valider"/>
	</form>
	<form action="Recherche.php" method="post" style="display: flex;">
	<input style="width:170px; height: 25px; margin-top: 10px;font-size: 12pt; border:1px solid black;" placeholder="Par Prenom " type="text" name="rrech"/>
	<input style="width:75px; height: 29px; margin-top:  10px;border:1px solid black;font-size: 10pt;"  value="Recherche" type="submit" name="valider"/>
	</form>
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
	<div style="display: flex; ">
		<div class="div0" style="width:66px; height:40px;"></div>
   		<div class="div1" style="background-color: #AAA;">Nom</div>
    	<div class="div2" style="background-color: #AAA;">Prenom</div>
		<div class="div3" style="background-color: #AAA;">Date de naissance</div>
		<div class="div4" style="background-color: #AAA;">adresse domicile</div>
		<div class="div5" style="background-color: #AAA;">adresse travail</div>
		<div class="div6" style="background-color: #AAA;">Telephone</div>
		<div class="div6" style="width: 55px;background-color: #AAA;"> Membre CA</div>
		<div class="div7" style="width: 55px;background-color: #AAA;"> Membre Executif</div>
		<div class="div8" style="background-color: #AAA; width: 277px;border-bottom:none;height: 41px;"></div>
	</div>
	<form action="" method="post">
	<div style="display: flex; ">
		<div > <input class="div0" style="background-color:lightblue; font-size:13pt;" type="submit" name="id" value="Ajouter">  </div>
   		<div > <input class="div1" type="text" name="Nom"></div>
    	<div > <input class="div2" type="text" name="Prenom"></div>
		<div > <input class="div3" type="date" placeholder="aaaa_mm_jj" name="Date"></div>
		<div > <input class="div4" type="text" name="@d"></div>
		<div > <input class="div5" type="text" name="@t"></div>
		<div > <input class="div6" type="text" name="telephone"></div>
		<div > <input class="div6" style="width: 55px;" type="number" placeholder="1 ou 0" name="CA"></div>
		<div > <input class="div7" style="width: 55px;" type="number" placeholder="1 ou 0" name="ME"></div>
		<div class="div8" style="background-color: #AAA;width: 277px; border-top:none; height: 41px;"></div>
	</div>
	</form>
<?php

if($_POST['Nom'] &&  $_POST['Prenom'] &&  $_POST['Date'] &&  $_POST['@d'] &&  $_POST['@t'] &&  $_POST['telephone'] &&  $_POST['CA']>=0 &&  $_POST['ME']>=0)
{
    $Nom = $_POST['Nom'];
    $Prenom = $_POST['Prenom'];
    $Date_de_naissance = $_POST['Date'];
    $telephone = $_POST['telephone'];
    $adresse_domicile = $_POST['@d'];
    $adresse_travail = $_POST['@t'];
    $Membre_CA = $_POST['CA'];
    $Membre_Executif = $_POST['ME'];

$sql  = "INSERT INTO membre(Nom, Prenom, Date_de_naissance, telephone,adresse_domicile, adresse_travail, Membre_CA , Membre_Executif) VALUES('$Nom', '$Prenom', '$Date_de_naissance', $telephone,'$adresse_domicile', '$adresse_travail', $Membre_CA , $Membre_Executif)"; 

   if (mysqli_multi_query($conn, $sql)) { echo "New records created successfully";} else { echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
}
?>
<?php
if($_POST['type'] &&  $_POST['nomdep'] &&  $_POST['nomfaculte'] && $_POST['anneeobt'] )
{	

    $Type = $_POST['type'];
    $Departement = $_POST['nomdep'];
    $Faculte = $_POST['nomfaculte'];

$sql  = "INSERT INTO diplome(Type,Departement,Faculte) VALUES('$Type','$Departement','$Faculte')"; 

   if (mysqli_multi_query($conn, $sql)) { echo "New records created successfully";} else { echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
}
?>
<?php

if($_POST['type'] &&  $_POST['nomdep'] &&  $_POST['nomfaculte'] && $_POST['anneeobt'])
{	

	$NumDiplomé = $_POST['idajout'];
    $DateObtention = $_POST['anneeobt'];
    $request=$bdd->query('SELECT * FROM diplome WHERE NumDiplome=(SELECT MAX(NumDiplome) FROM diplome)');
    $den =  $request->fetch();
    $iddd= $den['NumDiplome'];

$sql  = "INSERT INTO obtenir(NumDiplomé,NumDiplome,DateObtention) VALUES($NumDiplomé,$iddd,$DateObtention)"; 

   if (mysqli_multi_query($conn, $sql)) { echo "<br/> New records created successfully";} else { echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
}

if($_POST['datevers'] &&  $_POST['cot']>=0 && $_POST['montcot']>=0 && $_POST['montcont']>=0 && $_POST['anne'])
{	
	$Datevers = $_POST['datevers'];
    $Montantcot = $_POST['montcot'];
    $cotisation = $_POST['cot'];
    $Montantcontr = $_POST['montcont'];
    $annee = $_POST['anne'];
    $Numdiplomé = $_POST['idajoutver'];

$sql  = "INSERT INTO versement(Datevers,Montantcot,cotisation,Montantcontr,annee,Numdiplomé) VALUES('$Datevers',$Montantcot,$cotisation,$Montantcontr,$annee,$Numdiplomé)"; 

   if (mysqli_multi_query($conn, $sql)) { echo "New records created successfully";} else { echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
}
?>
<?php
		while ($donnees = $reponse->fetch())
	{ ?>

   <form action="FicheMembre.php" method="post">
   <div style="display: flex;" >
   		<div > <button class="div0" name="id" value="<?php echo $donnees['NumDiplomé']; ?>">Fiche Membre <?php echo $donnees['NumDiplomé']; ?> </button>  </div>
   		<div class="div1">   <?php echo $donnees['Nom']; ?> </div>
    	<div class="div2">   <?php echo $donnees['Prenom']; ?> </div>
		<div class="div3">   <?php echo $donnees['Date_de_naissance'];?> </div>
		<div class="div4">   <?php echo $donnees['adresse_domicile'];?> </div>
		<div class="div5">   <?php echo $donnees['adresse_travail'];?> </div>
		<div class="div6">   <?php echo '0'.$donnees['telephone'];?> </div>
		<div class="div6" style="width: 55px;">   <?php  if($donnees['Membre_CA']) echo 'Oui'; else echo 'Non'; ?> </div>
		<div class="div7" style="width: 55px;">   <?php if($donnees['Membre_Executif'])echo 'Oui'; else echo 'Non'; ?>  </div>
		</form>
		<form action="modifiermembre.php" method="post"><button  style="margin:0px; width: 52px; height: 52px; border:1px solid; background-color: rgba(250,220,200,0.5);" name="modif" value="<?php echo $donnees['NumDiplomé']; ?> ">Modifie membre <?php echo $donnees['NumDiplomé']; ?></button></form>
		<form action="supprimermembre.php" method="post"><button  style="margin:0px; width: 57px; height: 52px; border:1px solid; background-color: rgba(255,0,0,0.5);" name="delet" value="<?php echo $donnees['NumDiplomé']; ?> ">Supprime membre <?php echo $donnees['NumDiplomé']; ?>
			
		</button></form>
	
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
   	?>
</body>
</html>
