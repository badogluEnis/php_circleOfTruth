<?php
require_once '../repository\AdminRepository.php';


if (!empty($fragen)) { ?>
<table class="table table-hover mittig_admin">
	<tr>
		<th>Frage</th>
		<th>Korrekte Antwort</th>
		<th>Falsche Antwort</th>
		<th>Moralfrage?</th>
		<th>Akzeptieren</th>
		<th>Ablehnen</th>
	</tr>
<?php foreach ($fragen as $frage): ?>

	<tr>
		<td><?= $frage['frage']->text; ?></td>
		<td><?= $frage['antworten'][0]->antwort; ?></td>
		<td><?= $frage['antworten'][1]->antwort; ?></td>
		<td><?= ($frage['frage']->moralfrage == 1) ? 'Ja' : 'Nein'; ?></td>
		<td>
				<div>
					<a class="btn btn-sm btn-success" href="/admin/accept?id=<?= $frage['frage']->id ?>">Akzeptieren</a>
				</div></td>
				<td>
					<div>
						<a class="btn btn-sm btn-danger" href="/admin/denie?id=<?= $frage['frage']->id ?>">Ablehnen</a>
					</div>
				</td>
	</tr>
<?php endforeach ?>
</table>
<?php } else {
	echo '<h2>Keine weiteren Fragen offen.</h2>';
}
