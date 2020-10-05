<?php

$username = 'pownstars';
$password = 'pownstars!';
//On établit la connexion
//$conn = new mysqli($servername, $username, $password);

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=pownstars;charset=utf8', $username, $password);
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	if (!empty($_POST) && !empty($_POST['name']) && !empty($_POST['message']))
	{
        	$date = new DateTime();
        	$req = $bdd->prepare("INSERT INTO posts (date, name, post) VALUES (:date,:name,:message)");
        	
		$req->bindValue(":date", $date->format('Y-m-d H:i:s'), PDO::PARAM_STR);
		$req->bindValue(":name", $_POST['name'], PDO::PARAM_STR);
		$req->bindValue(":message", $_POST['message'], PDO::PARAM_STR);	
		$req->execute();
		echo "done!";
	}
	header('Location: livredor.php');
}
catch(Exception $e)
{
	die('Erreur :'.$e->getMessage());
}

?>
