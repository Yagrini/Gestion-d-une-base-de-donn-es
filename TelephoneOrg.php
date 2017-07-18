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
	<a href="Versement.php">Versement</a>
	<a href="Diplome.php">Diplôme</a>
  <a href="Campagne.php">Campagne</a>
  <a href="Organisme.php">Organisme</a>
  <a href="TelephoneOrg.php" class="a0">Telephone Organisme</a>
</div>
<div style="display:flex;">
    <dib class="div4" style="background-color: #AAA;">Numero telephone</dib>
    <dib class="div4" style="background-color: #AAA;">Numero organisme</dib>
</div>

<?php
try
{
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', 'root');
    $conn = mysqli_connect("localhost", "root", "root", "projet");

}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
if($_POST['numtel'])  
{
    $Numtel = $_POST['numtel'];
    $NumOrganisme = $_POST['ajouttel'];

    $sql  = "INSERT INTO telephone(Numtel,NumOrganisme) VALUES($Numtel,$NumOrganisme)"; 

   if (mysqli_multi_query($conn, $sql)) { echo "New records created successfully";} else { echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
}
else  ;
$reponse = $bdd->query('SELECT * FROM telephone ');
		while ($donnees = $reponse->fetch())
	{ ?>
	
   <form action="FicheMembre.php" method="post">
   <div style="display: flex;">
    <div class="div4" style="height: 20px;"> <?php echo '0'.$donnees['Numtel']; ?></div>
   	<div class="div4" style="height: 20px;"> <?php echo $donnees['NumOrganisme']; ?></div>
    </div>
	</form>
   
    <?php
    }
   	?>

</body>
</html>