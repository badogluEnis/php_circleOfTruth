<?php
require_once '../repository\AdminRepository.php';


if (!empty($antworten)) { ?>
<table class="table table-hover mittig_admin">
	<tr>
		<th>Frage</th>
		<th>Korrekte Antwort</th>
		<th>Deine Antwort</th>
    <th>Statistik</th>
	</tr>
<?php foreach ($antworten as $antwort): ?>
	<tr>
		<td><?= print_r($antwort); ?></td>
		<td><?= $antwort['antworten'][0]->antwort; ?></td>
		<td><?= $antwort['antworten'][1]->antwort; ?></td>
		<td><?= ($antwort['frage']->moralfrage == 1) ? 'Ja' : 'Nein'; ?></td>
		<td>
				<div>
					<a class="btn btn-sm btn-success" href="/admin/accept?id=<?= $antwort['frage']->id ?>">Akzeptieren</a>
				</div></td>
			<form action ="/admin/denie" method="POST">
				<td>
					<div>
						<a class="btn btn-sm btn-danger" href="/admin/denie?id=<?= $antwort['frage']->id ?>">Ablehnen</a>
					</div>
				</td>
			</form>
	</tr>
<?php endforeach ?>
</table>
<?php } else {
	echo '<h2>Keine kürlich beantworteten Fragen gefunden.</h2>';
}
