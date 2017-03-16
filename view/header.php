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
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Circle of truth</title>
<link rel="icon" type="image/png" href="img/icon.ico">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Baloo+Bhaina"
	rel="stylesheet">



</head>
<body>

	<div class="container bbc-container">
		<nav class="navbar navbar-bbc">
			<div class="row bbc-vertical-align">
				<div class="col-xs-2">
					<a class="logo" href="/Default" link><img rel="icon" class="logo" alt="Logo"
						src="img/logo.png"></a>
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
							<li><a href="/Default">Home</a></li>
							<li><a href="/Answered">Kürzlich beantwortet</a></li>
							<li><a href="/idea">Idee einsenden</a></li>
							<li><a href="/About">&Uumlber uns</a></li>
							<li><a>Eingeloggt als: <?php $benutzername ?></a></li>
						</ul>
					</div>

				</div>
			</div>
		</nav>

		<div class="container">

<h1><?= $heading ?></h1>

<div class="inhalt">
