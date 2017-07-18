<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div id="nav">
	<a href="Membre.php">Membre</a>
	<a href="Sollicitation.php"  class="a0">Sollicitation</a>
	<a href="Versement.php">Versement</a>
	<a href="Diplome.php">Diplôme</a>
	<a href="Campagne.php">Campagne</a>
	<a href="Faculte.php">Faculte</a>
	<a href="Departement.php">Departement</a>
	<a href="Organisme.php">Organisme</a>
	 <a href="TelephoneOrg.php">Telephone Organisme</a>
</div>
<div style="display: flex; ">
	<form action="ajoutsollicitation.php" method="post"><button style="width:89px; height:52px; border :1px solid black;background-color: lightblue; font-size:11pt;" name="camp">Ajouter Sollicitation</button></form>
   	<div class="div1" style="background-color: #AAA; ">Solliciteur</div>
    <div class="div2" style="background-color: #AAA; width:150px;">Annee compagne</div>
	<div class="div3" style="background-color: #AAA; width:150px;">Date debut</div>
	<div class="div4" style="background-color: #AAA; width:150px;">Date fin</div>
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
		$reponse = $bdd->query('SELECT * FROM Sollicitation,campagne,membre WHERE  Sollicitation.Numcampagne=campagne.NumCompagne AND Sollicitation.numdiplomésolliciteur=membre.NumDiplomé GROUP BY Numfichesollicitation ');

if($_POST['date'] &&  $_POST['numfich'] &&  $_POST['dip']>=0 &&  $_POST['numcam'] &&  $_POST['numsolliciteur'] &&  $_POST['datevers'] &&  $_POST['annee'] &&  $_POST['montcont']>=0)
{
    
    $b = $_POST['date'];
    $c = $_POST['numfich'];
    $d = $_POST['dip'];
    $e = $_POST['numcam'];
    $f = $_POST['numsolliciteur'];
    $g = $_POST['numsollicit'];
    $h = $_POST['numorg'];
    if($g)
	$sql  = "INSERT INTO Sollicitation(Datesollicitation,Numfichesollicitation,Diplomé,Numcampagne,numdiplomésolliciteur,numdiplomésollicité) VALUES( '$b', $c, $d,$e, $f, $g)"; 
	if($h)
	$sql  = "INSERT INTO Sollicitation(Datesollicitation,Numfichesollicitation,Diplomé,Numcampagne,numdiplomésolliciteur,numorganisme) VALUES('$b', $c, $d,$e, $f, $h)";
   if (mysqli_multi_query($conn, $sql)) { echo "New records created successfully </br>";} else { echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
}
if( $_POST['date'] &&  $_POST['numfich'] &&  $_POST['dip']>=0 &&  $_POST['numcam'] &&  $_POST['numsolliciteur'] &&  $_POST['datevers'] &&  $_POST['annee'] &&  $_POST['montcont']>=0)
{
    $aa = $_POST['datevers'];
    $bb = $_POST['montcont'];
    $cc = $_POST['annee'];
    $request=$bdd->query('SELECT * FROM Sollicitation WHERE NumSollicitation=(SELECT MAX(NumSollicitation) FROM Sollicitation)');
    $den =  $request->fetch();
    $dd= $den['Numsollicitation'];

$sql  = "INSERT INTO versement(Datevers,Montantcontr,annee, NumSollicitation) VALUES('$aa', $bb, $cc ,$dd)"; 

   if (mysqli_multi_query($conn, $sql)) { echo "New records created successfully </br>";} else { echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
}
while ($donnees = $reponse->fetch())
	{ ?>
<form action="FicheSollicitation.php" method="post">
<div style="display: flex;">
   <div ><button class="div0" style=" width:89px; height: 55px;" type="submit" name="id" value="<?php echo $donnees['Numfichesollicitation']; ?>">Fiche sollicitation <?php echo $donnees['Numfichesollicitation']; ?></button></div>
   	<div class="div1" style="height: 43px;"><?php echo $donnees['Nom'];?> <?php echo $donnees['Prenom'];?></div>
	<div class="div2" style="width:150px;height: 43px;"><?php echo $donnees['Annee_compagne'];?></div>
	<div class="div3" style="width:150px;height: 43px;"><?php echo $donnees['Date_debut'];?></div>
	<div class="div4" style="width:150px;height: 43px;"><?php echo $donnees['Date_fin']; ?></div>
</div>
</form>
    <?php
    }

	?>
</body>
</html>