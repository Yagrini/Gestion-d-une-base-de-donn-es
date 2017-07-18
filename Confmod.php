<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<style>body{text-align:center;</style>
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
if(isset($_POST["conf"]))
{	
		$delet=$_POST["conf"];
		$delete=$bdd->prepare("DELETE FROM membre WHERE Numdiplomé=?");
		$delete->execute(array($delet));
?> 
	<div style="margin:40px 0px 0px 300px; font-size: 18pt;"><?php echo "Suppression effectué.";?> </div> 
<?php
}
if(isset($_POST["nnconf"]))
{
	?> <div style="margin:40px 0px 0px 300px; font-size: 18pt;"><?php echo "Suppression non effectué.";?> </div> 
<?php
}

if(isset($_POST["delet"]))
{
?>
<div style="margin:40px 0px 0px 300px; font-size: 18pt;">
	<div>Membre <?php echo $_POST["delet"];?> va être supprimé. Confirmer votre suppression : </div>
	<form accept="" method="post">
	<button style="margin-left:5px; font-size: 14pt;" name="conf" value="<?php echo $_POST["delet"];?>">Oui</button>
	<button style="margin-left:5px; font-size: 14pt;" name="nnconf">Non</button>
	</form>
</div>

<?php
}
?>
</body>
</html>