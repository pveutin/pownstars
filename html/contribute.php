<!DOCTYPE HTML>
<html>
	<head>
		<title>Pown Stars</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">
			<header id="header">
				<a class="logo" href="index.html">Pown Stars</a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>

			<nav id="menu">
				<ul class="links">
					<li><a href="index.html">Home</a></li>
					<li><a href="livredor.html">Livre d'or</a></li>
					<li><a href="contribute.php">Nos Sponsors</a></li>
					<li><a href="generic.html">A propos</a></li>
				</ul>
			</nav>

			<div id="heading" >
				<h1>Nos sponsors</h1>
			</div>

			<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">

					<!-- Elements -->
						<div class="row">
							<div class="col-12 col-12-medium">

								<!-- Text -->
								<h2>Vos dons</h2>
<?php

$username = 'pownstars';
$password = 'pownstars!';
//On établit la connexion
//$conn = new mysqli($servername, $username, $password);

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=pownstars;charset=utf8', $username, $password);
}
catch(Exception $e)
{
	die('Erreur :'.$e->getMessage());
}
$response = $bdd->query('SELECT * FROM dons');
echo '<div class="table-wrapper">
	<table>
		<thead>
			<tr>
				<th>Nom/Pseudo</th>
				<th>Montant</th>
				<th>Date</th>
				<th>Preuve de virement</th>
			</tr>
		</thead>
		<tbody>';

while ($donnees = $response->fetch())
{
	echo "<tr><td>".$donnees['pseudo']."</td><td>".$donnees['montant']."</td><td>".$donnees['date']."</td><td>".$donnees['proof']."</td></tr>";
}
$response->closeCursor();
echo '</tbody></table></div>';
?>
									<h2>Déposer le vôtre !</h2>

									<p>Pour encourager votre équipe favorite, c'est ici !</p>

									<form method="post" onsubmit="return Validate(this);" action="form2.php" enctype="multipart/form-data">
										<div class="row gtr-uniform">
											<div class="col-6 col-12-xsmall">
												<input type="text" name="pseudo" id="pseudo" value="" placeholder="Nom/Pseudo" />
											</div>
											<div class="col-6 col-12-xsmall">
												<input type="text" name="montant" id="montant" value="" placeholder="Montant du don" />
											</div>
											<!-- Break -->
											<!-- Break -->
											<div class="col-12">
												<input type="file"  name="preuve" id="preuve" placeholder="Votre preuve de virement" />
<!-- Les fichiers sont uploadés dans le répertoire : /var/www/html/uploads/ -->
											</div>
											<!-- Break -->
											<div class="col-12">
												<ul class="actions">
													<li><input type="submit" value="Poster" class="primary" /></li>
													<li><input type="reset" value="Annuler" /></li>
												</ul>
											</div>
										</div>
									</form>


							</div>
						</div>
					</div>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<div class="content">
						<section>
							<h3>Accumsan montes viverra</h3>
							<p>Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan varius montes viverra nibh in adipiscing. Lorem ipsum dolor vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing sed feugiat eu faucibus. Integer ac sed amet praesent. Nunc lacinia ante nunc ac gravida.</p>
						</section>
						<section>
							<h4>Sem turpis amet semper</h4>
							<ul class="alt">
								<li><a href="#">Dolor pulvinar sed etiam.</a></li>
								<li><a href="#">Etiam vel lorem sed amet.</a></li>
								<li><a href="#">Felis enim feugiat viverra.</a></li>
								<li><a href="#">Dolor pulvinar magna etiam.</a></li>
							</ul>
						</section>
						<section>
							<h4>Magna sed ipsum</h4>
							<ul class="plain">
								<li><a href="#"><i class="icon fa-twitter">&nbsp;</i>Twitter</a></li>
								<li><a href="#"><i class="icon fa-facebook">&nbsp;</i>Facebook</a></li>
								<li><a href="#"><i class="icon fa-instagram">&nbsp;</i>Instagram</a></li>
								<li><a href="#"><i class="icon fa-github">&nbsp;</i>Github</a></li>
							</ul>
						</section>
					</div>
					<div class="copyright">
						&copy; Untitled. Photos <a href="https://unsplash.co">Unsplash</a>, Video <a href="https://coverr.co">Coverr</a>.
					</div>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
	<script language="javascript">
	var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    
function Validate(oForm) {
    var arrInputs = oForm.getElementsByTagName("input");
    for (var i = 0; i < arrInputs.length; i++) {
        var oInput = arrInputs[i];
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }
                
                if (!blnValid) {
                    alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                    return false;
                }
            }
        }
    }
  
    return true;
}
	</script>
	</body>
</html>
