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
  <a href="Campagne.php" class="a0">Campagne</a>
  <a href="Organisme.php">Organisme</a>
  <a href="TelephoneOrg.php">Telephone Organisme</a>

</div>
 <div style="display:flex;">
 <div style="width:68px; border :1px solid black;background-color: #AAA;"></div>
    <div class="div4" style="background-color: #AAA;">Numero campagne</div>
    <div class="div4" style="background-color: #AAA;">Annee campagne</div>
    <div class="div4" style="background-color: #AAA;">Date debut</div>
    <div class="div4" style="background-color: #AAA;">Date fin</div>
</div>
<form action="Campagne.php" method="post">
  <div style="display:flex;">
  <button style="width:70px; border :1px solid black;background-color: lightblue; font-size:12pt;" name="camp">Ajouter</button>
    <div class="div4" style="font-size: 14pt;" ></div>
    <input class="div4" style="font-size: 14pt;" type="number" name="id2">
    <input class="div4" style="font-size: 14pt;" type="date" placeholder="aaaa-mm-jj" name="id3">
    <input class="div4" style="font-size: 14pt;" type="date" placeholder="aaaa-mm-jj" name="id4">
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
$reponse = $bdd->query('SELECT * FROM campagne ');

if($_POST['id2'] && $_POST['id3'] && $_POST['id4'])  
{
    $Anneecamp = $_POST['id2'];
    $dated = $_POST['id3'];
    $datef = $_POST['id4'];
    $sql  = "INSERT INTO campagne(Annee_compagne,Date_debut,Date_fin) VALUES($Anneecamp,'$dated','$datef')"; 

   if (mysqli_multi_query($conn, $sql)) { echo "New records created successfully";} else { echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
}
else ;
		while ($donnees = $reponse->fetch())
	{ ?>
	
   <form action="FicheMembre.php" method="post">
   <div style="display: flex;">
          <div style="width:69px;background-color: #AAA; border-right: 1px solid black;"></div>
   	      <div class="div4" style="height: 20px;"> <?php echo $donnees['NumCompagne']; ?></div>
   	      <div class="div4" style="height: 20px;">  <?php echo $donnees['Annee_compagne']; ?></div>
          <div class="div4" style="height: 20px;"> <?php echo $donnees['Date_debut']; ?></div>
	        <div class="div4" style="height: 20px;"> <?php  echo $donnees['Date_fin']; ?></div>
  </div>
	</form>
    <?php
    }
   	?>

</body>
</html>