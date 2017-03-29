


<?php

if (!empty($antworten)) { ?>
	<table class="table table-hover mittig_admin">
		<tr>
			<th>Frage</th>
			<th>Korrekte Antwort</th>
			<th>Deine Antwort</th>
	    <th>Statistik</th>
		</tr>
		<?php
		 foreach ($antworten as $antwort) { ?>
			<tr>
				<td><?= $antwort->text; ?></td>
				<td><?= $antwort->moralfrage ? '-' : $korrekt[$antwort->id - 1]->antwort; ?></td>
				<td><?= $antwort->antwort; ?></td>
				<td>
				</td>
			</tr>
		<?php } ?>
		</table>
		<?php } else {
			echo '<h2>Keine kürzlich beantworteten Fragen.</h2>';
		}?>

