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
  <a href="Organisme.php"  class="a0">Organisme</a>
  <a href="TelephoneOrg.php">Telephone Organisme</a>
</div>
 <div style="display:flex;">
    <div style="width:298px; border :1px solid black;background-color: #AAA;"></div>
    <div class="div4" style="background-color: #AAA;">Numero organisme</div>
    <div class="div4" style="background-color: #AAA;">Nom organisme</div>
</div>
<form action="Organisme.php" method="post">
  <div style="display:flex;">
  <button style="width:300px; border :1px solid black;background-color: lightblue; font-size:12pt;" name="org">Ajouter</button>
    <div class="div4" style="font-size: 14pt;" ></div>
    <input class="div4" style="font-size: 14pt;" type="text" name="id2">
</div>
</form>
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
$reponse = $bdd->query('SELECT * FROM organisme ');
if($_POST['id2'])  
{
   
    $Nom = $_POST['id2'];

    $sql  = "INSERT INTO organisme(Nom) VALUES('$Nom')"; 

   if (mysqli_multi_query($conn, $sql)) { echo "New records created successfully";} else { echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
  
}
else ;
		while ($donnees = $reponse->fetch())

	{ ?>
	
   
   <div style="display: flex;">
   <form action="TelephoneOrg.php" method="post">
   <div><button style="width:100px;height: 52px; background-color: lightgreen; border: 1px solid black;" name="ajouttel" value="<?php echo $donnees['NumOrganisme']; ?>">Ajout tel organisme  <?php echo $donnees['NumOrganisme']; ?></button>
   <input class="div4"  style="width:188px; font-size:14pt;" type="text" placeholder="xxxxxxxxxx" name="numtel"></div>
   </form>
   	<div class="div4" > <?php echo $donnees['NumOrganisme']; ?></div>
   	<div class="div4" > <?php echo $donnees['Nom']; ?></div>

    </div>
	

    <?php
    }
   	?>

</body>
</html>