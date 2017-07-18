 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
	<style>*{margin:0px;</style>
</head>
<body>
<div style="width:1480px; height: 80px; text-align: center; font-size:24pt; padding: 30px 0px 0px 200px;  background-color: lightgray; font-family: verdana; border:solid 1px black;"> ASSOCIATION DES ANCIENS DIPLOMES ENSA MARRAKECH</div>

<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$all = $bdd->prepare('SELECT * FROM diplome,obtenir WHERE diplome.NumDiplome = obtenir.NumDiplome AND obtenir.NumDiplomé = ?');
$all->execute(array($_POST['id']));

$versemen = $bdd->prepare('SELECT * FROM membre,versement WHERE  versement.Numdiplomé = membre.NumDiplomé AND membre.NumDiplomé = ? ORDER BY annee');
$versemen->execute(array($_POST['id']));

$memb = $bdd->prepare('SELECT * FROM membre WHERE NumDiplomé = ?');
$memb->execute(array($_POST['id']));


while ($donnees = $memb->fetch())
{
?>

<div style="display: flex;  border:solid 1px black;" >
	 <div class="divf"> <strong>Numero Diplomé :</strong> <?php echo $donnees['NumDiplomé']; ?></div>
	  <div class="divf" style="margin-left:145px"><strong>Numéro Telephone :</strong> <?php echo '0'.$donnees['telephone']; ?></div>
</div>
<div style="display: flex;  border:solid 1px black;">
    <div class="divf"><strong>Nom,Prenom : </strong><?php echo $donnees['Nom']; ?> <?php echo $donnees['Prenom']; ?></div>
    <div class="divf" style="margin-left:65px"><strong>Adresse Domicile :</strong> <?php echo $donnees['adresse_domicile']; ?></div>
</div>
<div style="display: flex;  border:solid 1px black;">
    <div class="divf"><strong>Date de naissance :</strong> <?php echo $donnees['Date_de_naissance']; ?></div> 
    <div class="divf" style="margin-left:50px"><strong>Adresse Travail :</strong><?php echo $donnees['adresse_travail']; ?></div>
</div>

<div style="display: flex;  border:solid 1px black;">
    <div class="divf"><strong>Membre C.A :</strong> <?php if($donnees['Membre_CA']) echo  'Oui'; else  echo 'Non'?></div> <div>

	<div class="divf" style="margin-left:174px"><strong>Membre de l'éxecutif :</strong> <?php if($donnees['Membre_Executif']) echo 'Oui';
	else  echo 'Non';?></div> 
</div>
</div>
		

<?php
}
 $memb->closeCursor(); 
?>
<div class="divff">Diplômes Obtenus</div>
<div style="display:flex;">
	<div class="divfiche">Diplômes</div>
	<div class="divfiche">Année d'obtention</div>
	<div class="divfiche">Faculté</div>
	<div class="divfiche">Département</div>
</div>
<?php
	while ($donnees2 = $all->fetch())
{
?>
<div style="display:flex;">
	<div class="divfich" > <?php echo $donnees2['Type'];?></div>
	<div class="divfich" > <?php echo $donnees2['DateObtention'] ;?></div>
	<div class="divfich" > <?php echo  $donnees2['Faculte'];?></div>
	<div class="divfich" > <?php echo  $donnees2['Departement'];?></div>
</div>
<?php
}

$all->closeCursor();
?>
<div class="divff">Contributions</div>
<div style="display:flex;">
	<div class="divfiche">Année</div>
	<div class="divfiche">Cotisation annuelle</div>
	<div class="divfiche">Contribution</div>
	<div class="divfiche">Date versement</div>
</div>
<?php
	while ($donnees3 = $versemen->fetch())
{
	?>
<div style="display:flex;">
	<div class="divfich" > <?php echo $donnees3['annee']; ?></div>
	<div class="divfich" > <?php echo $donnees3['Montantcot'];  ?></div>
	<div class="divfich" > <?php echo $donnees3['Montantcontr']; ?></div>
	<div class="divfich" > <?php echo $donnees3['Datevers']; ?></div>
</div>
<?php
}
 $versemen->closeCursor(); 

?>
</body>
</html>






















