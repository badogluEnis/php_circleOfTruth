<div class="mittig_home">
<?php
	require_once '../repository/FrageRepository.php';

	$min=0;
	$max = count($fragen) - 1;
	$index = mt_rand($min,$max);

	$fragenindex = mt_rand(0,1);


	if ($fragenindex == 1) {
		$fragenindex2 = 0;
	} else {
		$fragenindex2 = 1;
	}

	if (!empty($fragen)) {?>
		<h1>Frage:</h1>
		<h2><?= $fragen[$index]['frage']->text; ?></h2>


<?php } else {
	echo '<h2>Keine Fragen gefunden.</h2>';
} ?>

	<a href="/answer/press_right"><button type="button" name="right" class="btn btn-lg btn-danger rundrechts"><?= $fragen[$index]['antworten'][$fragenindex2]->antwort; ?></button></a>
	<a href="/answer/press_left"><button type="button" name ="left" class="btn btn-lg btn-success rundlinks"><?= $fragen[$index]['antworten'][$fragenindex]->antwort; ?></button></a>



</div>
