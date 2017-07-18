<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<style>body{text-align:center;</style>
	<style>
		input
		{
			font-size: 12pt;
			width : 160px;
		}
	</style>
</head>
<body>
<div id="nav">
	<a href="Membre.php">Membre</a>
	<a href="Sollicitation.php">Sollicitation</a>
	<a href="Versement.php">Versement</a>
	<a href="Diplome.php">Diplôme</a>
	<a href="Campagne.php">Campagne</a>
	<a href="Organisme.php">Organisme</a>
	<a href="TelephoneOrg.php">Telephone Organisme</a>
	<form action="Recherche.php" method="post" style="display: flex;"></form>
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

if(isset($_POST["mod"]))
{	
			if($_POST['Date'] &&  $_POST['@d'] &&  $_POST['@t'] &&  $_POST['telephone'] &&  $_POST['CA']>=0 &&  $_POST['ME']>=0)
		{
		    $Date_de_naissance = $_POST['Date'];
		    $telephone = $_POST['telephone'];
		    $adresse_domicile = $_POST['@d'];
		    $adresse_travail = $_POST['@t'];
		    $Membre_CA = $_POST['CA'];
		    $Membre_Executif = $_POST['ME'];

		$updat  = $bdd->prepare("UPDATE  membre set Date_de_naissance='$Date_de_naissance',  telephone=$telephone , adresse_domicile='$adresse_domicile',  adresse_travail='$adresse_travail',  Membre_CA=$Membre_CA , Membre_Executif=$Membre_Executif where NumDiplomé= ?"); 
		$updat->execute(array($_POST['mod']));

		echo "La modification est bien effectué.";
		}
		else echo 'La modification n\'est pas bien effectué.  <br/> '.$_POST['Date'] .' '.  $_POST['@d'] .' '.  $_POST['@t'] .' '. $_POST['telephone'] .' '.  $_POST['CA'] .' '.  $_POST['ME'] .' hahahahhaha';
}
else {
	$memb = $bdd->prepare('SELECT * FROM membre WHERE NumDiplomé = ?');
	$memb->execute(array($_POST['modif']));
	while ($donnees = $memb->fetch())
{
?>

<div style="display: flex;  border:solid 1px black;" >
	 <div class="divf"> <strong>Numero Diplomé :</strong> <?php echo $donnees['NumDiplomé']; ?></div>
	 	<form action="" method="post">
	  <div class="divf" style="margin-left:210px"><strong>Numéro Telephone :</strong> <input name="telephone" type="number" value="<?php echo '0'.$donnees['telephone']; ?>"></div>
</div>
<div style="display: flex;  border:solid 1px black;">
    <div class="divf"><strong>Nom,Prenom : </strong><?php echo $donnees['Nom']; ?> <?php echo $donnees['Prenom']; ?></div>
    <div class="divf" style="margin-left:130px"><strong>Adresse Domicile :</strong> <input name="@d" type="text" value="<?php echo $donnees['adresse_domicile']; ?>"></div>
</div>
<div style="display: flex;  border:solid 1px black;">
    <div class="divf"><strong>Date de naissance :</strong> <input type="date" name="Date" value="<?php echo $donnees['Date_de_naissance']; ?>""></div> 
    <div class="divf" style="margin-left:50px"><strong>Adresse Travail :</strong><input name="@t" type="text" value="<?php echo $donnees['adresse_travail']; ?>"></div>
</div>

<div style="display: flex;  border:solid 1px black;">
    <div class="divf"><strong>Membre C.A :</strong> <input style="width:25px;" type="number" name="CA" value="<?php echo $donnees['Membre_CA'];?>"></div> <div>

	<div class="divf" style="margin-left:240px"><strong>Membre de l'éxecutif :</strong> <input style="width:25px;" name="ME" type="number" value="<?php echo $donnees['Membre_Executif'];?>"></div> 
</div>


	<button  class="divf" style="background-color: #E80;" name="mod" value="<?php echo $_POST["modif"];?>">Modifier</button>
	</form>
</div>
<?php
}
 $memb->closeCursor(); }
?>




</body>
</html>