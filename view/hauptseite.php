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


		<a href="/answer?id=<?= $fragen[$index]['antworten'][$fragenindex2]->id ?>"><button type="button" name="right" class="btn btn-lg btn-danger"><?= $fragen[$index]['antworten'][$fragenindex2]->antwort; ?></button></a>
		<a href="/answer?id=<?= $fragen[$index]['antworten'][$fragenindex]->id ?>"><button type="button" name ="left" class="btn btn-lg btn-success"><?= $fragen[$index]['antworten'][$fragenindex]->antwort; ?></button></a>

		<?php } else {
			echo '<h2>Keine Fragen gefunden.</h2>';
		} ?>


</div>
