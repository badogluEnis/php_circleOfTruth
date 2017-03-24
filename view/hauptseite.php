<div class="mittig_home">
<?php
	require_once '../repository/FrageRepository.php';

	$min=0;
	$max = count($fragen) - 1;
	$index = mt_rand($min,$max);
;



	if (!empty($fragen)) {?>
		<h1>Frage:</h1>
		<h2><?= $fragen[$index]['frage']->text; ?></h2>


<?php } else {
	echo '<h2>Keine Fragen gefunden.</h2>';
} ?>




	<button type="button" class="btn btn-lg btn-success rundlinks"><?= $fragen[$index]['antworten'][1]->antwort; ?></button>
	<button type="button" class="btn btn-lg btn-danger rundrechts"><?= $fragen[$index]['antworten'][0]->antwort; ?></button>



</div>
