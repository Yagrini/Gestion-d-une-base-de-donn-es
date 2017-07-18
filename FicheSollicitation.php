<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sollicitation</title>
	<link rel="stylesheet" href="style.css">
	<style>*{margin:0px;</style>
</head>
<body>
<div style="width:938px; height: 80px; text-align: center; font-size:24pt; padding: 30px 0px 0px 500px; background-color: lightgray; font-family: verdana; border:solid 1px black;"> FICHE SOLLICITATION</div>
	<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$sollic = $bdd->prepare('SELECT * FROM Sollicitation,campagne,membre WHERE  Sollicitation.Numcampagne=campagne.NumCompagne AND Sollicitation.numdiplomésolliciteur=membre.NumDiplomé AND Sollicitation.Numfichesollicitation=? GROUP BY Numfichesollicitation');
$sollic->execute(array($_POST['id']));

$membre = $bdd->prepare('SELECT * FROM Sollicitation,campagne,membre,versement WHERE  Sollicitation.Numcampagne=campagne.NumCompagne AND Sollicitation.Numsollicitation=versement.NumSollicitation  AND Sollicitation.numdiplomésollicité=membre.NumDiplomé AND campagne.Date_debut<=Sollicitation.Datesollicitation AND campagne.Date_fin>=Sollicitation.Datesollicitation AND Sollicitation.Numfichesollicitation = ?');
$membre->execute(array($_POST['id']));

$organisme = $bdd->prepare('SELECT * FROM Sollicitation,campagne,organisme,telephone,versement WHERE  Sollicitation.Numcampagne=campagne.NumCompagne AND Sollicitation.numorganisme=organisme.NumOrganisme AND campagne.Date_debut<=Sollicitation.Datesollicitation AND Sollicitation.Numsollicitation=versement.NumSollicitation  AND campagne.Date_fin>=Sollicitation.Datesollicitation AND telephone.NumOrganisme=organisme.NumOrganisme AND Sollicitation.Numfichesollicitation = ?');
$organisme->execute(array($_POST['id']));


while ($donnees = $sollic->fetch())
{
?>
	<div style="display: flex;  border:solid 1px black;">
		<div class="divf"> <strong>Numero Fiche :</strong> <?php echo $donnees['Numfichesollicitation']; ?></div>
		<div class="divf" style="margin-left:237px"> <strong>Compagne :</strong> <?php echo $donnees['Annee_compagne']; ?> </div>
	</div>
	<div style="display: flex;  border:solid 1px black;">
		<div class="divf"><strong>Solliciteur : </strong><?php echo $donnees['Nom'].' '. $donnees['Prenom']; ?></div>
		<div class="divf" style="margin-left:145px"><strong>Periode : </strong><?php echo $donnees['Date_debut'].' à '.$donnees['Date_fin']; ?></div>
	</div>


<?php 
}
 $sollic->closeCursor(); 
?>
<div style="display:flex;">
	<div class="divfiche">Diplômés</div>
	<div class="divfiche">Date sollicitation</div>
	<div class="divfiche">Numéros de téléphone</div>
	<div class="divfiche">Contribution</div>
	<div class="divfiche">Date versement</div>
</div>
<?php
 while ($donnees2 = $membre->fetch())
{?>
<div style="display:flex;">
	<div class="divfich"><?php echo $donnees2['Nom'].' '.$donnees2['Prenom'];?></div>
	<div class="divfich" ><?php echo $donnees2['Datesollicitation'] ;?> </div>
	<div class="divfich" ><?php echo  '0'.$donnees2['telephone'];?></div>
	<div class="divfich" > <?php echo  $donnees2['Montantcontr'];?></div>
	<div class="divfich" > <?php echo  $donnees2['Datevers'];?></div>
</div>
<?php
}
$membre->closeCursor(); 

?>
<div style="display:flex;">
	<div class="divfiche">Organisme</div>
	<div class="divfiche">Date sollicitation</div>
	<div class="divfiche">Numéros de téléphone</div>
	<div class="divfiche">Contribution</div>
	<div class="divfiche">Date versement</div>
</div>
<?php 
 while ($donnees3 = $organisme->fetch())
{
?>
	<div style="display:flex;">
	<div class="divfich"><?php echo $donnees3['Nom'];?></div>
	<div class="divfich" ><?php echo $donnees3['Datesollicitation'] ;?> </div>
	<div class="divfich" ><?php echo  '0'.$donnees3['Numtel'];?></div>
	<div class="divfich" > <?php echo  $donnees3['Montantcontr'];?></div>
	<div class="divfich" > <?php echo  $donnees3['Datevers'];?></div>
</div>

<?php
}
$organisme->closeCursor(); 

?>

</body>
</html>