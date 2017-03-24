<?php
require_once '../repository\AdminRepository.php';


//if (!empty($antworten)) { ?>
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
		<td><?= print_r($antwort); ?></td>
		<td><?= print_r($antwort); ?></td>
		<td><?= print_r($antwort); ?></td>
	</tr>
<?php endforeach ?>
</table>
<?php
