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
		<td><?= $frage->text; ?></td>
		<td><?= $frage->antwort; ?></td>
		<td><?= $frage->antwort; ?></td>
		<td><?= $frage->moralfrage; ?></td>
		<td>
			<div>
				<button type="submit" name="login" class="btn btn-sm btn-success">Akzeptieren</button>
			</div></td>
		<td>
			<div>
				<button type="submit" name="register" class="btn btn-sm btn-danger">Ablehnen</button>
			</div>
		</td>
	</tr>
<?php endforeach ?>
</table>
<?php } else {
	echo '<h2>Keine Weitere Fragen offen.</h2>';
}
