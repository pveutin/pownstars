<!DOCTYPE HTML>
<html>
	<head>
		<title>Pown Stars</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />
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
					<li><a href="livredor.php">Livre d'or</a></li>
					<li><a href="contribute.php">Nos Sponsors</a></li>
					<li><a href="generic.html">A propos</a></li>
				</ul>
			</nav>

			<div id="heading" >
				<h1>Livre d'or</h1>
			</div>

			<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">

					<!-- Elements -->
						<div class="row">
							<div class="col-12 col-12-medium">

								<!-- Text -->
								<h2>Tous les messages</h2>
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
$response = $bdd->query('SELECT * FROM posts');
echo '<div class="table-wrapper" style="padding:10px">
	<table id="posts" class="display compact">
		<thead>
			<tr>
				<th>Nom/Pseudo</th>
				<th>Message</th>
				<th>Date</th>
			</tr>
		</thead>
		<tbody>';

while ($donnees = $response->fetch())
{
	echo "<tr><td>".$donnees['name']."</td><td>".$donnees['post']."</td><td>".$donnees['date']."</td></tr>";
}
$response->closeCursor();
echo '</tbody></table></div>';
?>


<br/>
<hr>									<h2>Laissez le vôtre !</h2>

									<p>Pour encourager votre équipe favorite, c'est ici !</p>

									<form method="post" action="form.php">
										<div class="row gtr-uniform">
											<div class="col-6 col-12-xsmall">
												<input type="text" name="name" id="nom" value="" placeholder="Nom/Pseudo" />
											</div>
											<div class="col-6 col-12-xsmall">
												<input type="email" name="email" id="email" value="" placeholder="Email" />
											</div>
											<!-- Break -->
											<!-- Break -->
											<div class="col-12">
												<textarea name="message" id="textarea" placeholder="Votre message c'est ici ..." rows="6"></textarea>
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
			<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
			<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script language="javascript">
	$(document).ready(function() {
    		$('#posts').DataTable( {
			"language" : {"url":"https://cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"}
		});
	} );
	</script>	

</body>
</html>
