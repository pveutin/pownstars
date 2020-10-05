<?php

$username = 'pownstars';
$password = 'pownstars!';
$base_url = '/var/www/html/uploads/';

//On établit la connexion
//$conn = new mysqli($servername, $username, $password);

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=pownstars;charset=utf8', $username, $password);
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	if (!empty($_POST) && !empty($_POST['pseudo']) && !empty($_POST['montant'] && !empty($_FILES['preuve'])))
	{
        	$date = new DateTime();
        	$req = $bdd->prepare("INSERT INTO dons (date, pseudo, montant, proof) VALUES (:date,:pseudo,:montant, :proof)");
		$req->bindValue(":date", $date->format('Y-m-d H:i:s'), PDO::PARAM_STR);
		$req->bindValue(":pseudo", $_POST['pseudo'], PDO::PARAM_STR);
		$req->bindValue(":montant", $_POST['montant'], PDO::PARAM_STR);
		$req->bindValue(":proof", $_FILES['preuve']['name'], PDO::PARAM_STR);
		$req->execute();
		$uploadfile =$base_url . basename($_FILES['preuve']['name']);
		if (move_uploaded_file($_FILES['preuve']['tmp_name'], $uploadfile)){
			echo "OK! fichier dispo : " . $uploadfile;
		}
		echo "done!";
	}
	header('Location: contribute.php');
}
catch(Exception $e)
{
	die('Erreur :'.$e->getMessage());
}

?>
