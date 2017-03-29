<!--
  /$$$$$$  /$$                     /$$                            /$$$$$$          /$$                           /$$     /$$
 /$$__  $$|__/                    | $$                           /$$__  $$        | $$                          | $$    | $$
| $$  \__/ /$$  /$$$$$$   /$$$$$$$| $$  /$$$$$$         /$$$$$$ | $$  \__/       /$$$$$$    /$$$$$$  /$$   /$$ /$$$$$$  | $$$$$$$
| $$      | $$ /$$__  $$ /$$_____/| $$ /$$__  $$       /$$__  $$| $$$$          |_  $$_/   /$$__  $$| $$  | $$|_  $$_/  | $$__  $$
| $$      | $$| $$  \__/| $$      | $$| $$$$$$$$      | $$  \ $$| $$_/            | $$    | $$  \__/| $$  | $$  | $$    | $$  \ $$
| $$    $$| $$| $$      | $$      | $$| $$_____/      | $$  | $$| $$              | $$ /$$| $$      | $$  | $$  | $$ /$$| $$  | $$
|  $$$$$$/| $$| $$      |  $$$$$$$| $$|  $$$$$$$      |  $$$$$$/| $$              |  $$$$/| $$      |  $$$$$$/  |  $$$$/| $$  | $$
 \______/ |__/|__/       \_______/|__/ \_______/       \______/ |__/               \___/  |__/       \______/    \___/  |__/  |__/

-->
<?php
require_once '../repository/BenutzerRepository.php';
require_once '../lib/ConnectionHandler.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Circle of truth</title>
<link rel="icon" type="image/png" href="/img/icon.ico">
<link href="/css/bootstrap.min.css" rel="stylesheet">
<link href="/css/style.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Baloo+Bhaina"
	rel="stylesheet">
<script src="public/js/jquery-2.1.4.min.js"></script>
<script src="public/js/Chart.js" ></script>



</head>
	<body>
		<div class="container bbc-container">
			<nav class="navbar navbar-bbc">
				<div class="row bbc-vertical-align">
					<div class="col-xs-2">
						<a class="logo" href="/Default" link><img rel="icon" class="logo" alt="Logo"
							src="/img/logo.png"></a>
					</div>
					<div class="col-xs-10">
						<div class="navbar-header">
							<button class="navbar-toggle" type="button" data-toggle="collapse"
								data-target="#navbar" aria-expanded="true" aria-controls="navbar">
								<span class="sr-only">Toggle navigation</span><span
									class="icon-bar"></span> <span class="icon-bar"></span> <span
									class="icon-bar"></span>
							</button>
						</div>
						<div id="navbar" class="collapse navbar-collapse">
							<ul class="nav navbar-nav">
							<?php
							if (isset($_SESSION['user'])) {
								?>
								<li class="<?php if($page=='hauptseite'){echo 'active';}?>"><a href="/Default" style="text-decoration: none;">Home</a></li>
								<li class="<?php if($page=='recentlyAnswered'){echo 'active';}?>"><a href="/Answered" style="text-decoration: none;">Kürzlich beantwortet</a></li>
								<li class="<?php if($page=='submitIdea'){echo 'active';}?>"><a href="/idea" style="text-decoration: none;">Idee einsenden</a></li>
								<li class="<?php if($page=='aboutUs'){echo 'active';}?>"><a href="/About" style="text-decoration: none;">Über uns</a></li>
								<?php
									if ($_SESSION ['user']['admin']) {
										?>
										<li class="menuitem <?php if($page=='adminpanel'){echo 'active';}?>"><a href="/Admin" style="text-decoration: none;">Adminpanel</a></li>
										<?php
									}?>
									<li><a  style="text-decoration: none;" href="#">Eingeloggt als: <?php echo $_SESSION ['user']['name']; ?></a></li>
									<li><a style="text-decoration: none;"  href="/Logout">Logout</a></li>
								<?php } ?>
							</ul>
						</div>

					</div>
				</div>
			</nav>
			<div class="container">
		<h1><?= $heading ?></h1>
	<div class="inhalt">
