<?php


if ($antworten[0]->moralfrage == 0)
{
if ($antworten[0]->is_korrekt == 1)
{
  ?>
<h1>Korrekt!</h1>
<h2>Die richtige Antwort lautet: <?= $korrekt[$antworten[0]->id - 1]->antwort; ?></h2>
<?php
} else { ?>
  <h1>Falsch</h1>
  <h2>Die richtige Antwort lautet: <?= $korrekt[$antworten[0]->id - 1]->antwort; ?> </h2>
  <?php
}
} else {
  echo '<h2>Keine richtige Antwort da es eine Moralfrage ist.</h2>';
}

echo '<h3>Statistiken:</h3>';

?>

<a href="/Default"><button type="button" name="refresh" class="btn btn-lg btn-success">Nächste Frage</button></a>
