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
				<div id="chartContainer" style="height: 50px; width: 100%;"></div>
				</td>
			</tr>
		<?php } ?>
		</table>
		<?php } else {
			echo '<h2>Keine kürzlich beantworteten Fragen.</h2>';
		}?>

		<script type="text/javascript">
		window.onload = function () {
			var chart = new CanvasJS.Chart("chartContainer",
			{
				title:{
					text: ""
				},
				animationEnabled: true,
				legend:{
					verticalAlign: "center",
					horizontalAlign: "left",
					fontSize: 20,
					fontFamily: "Helvetica"
				},
				theme: "theme2",
				data: [
				{
					type: "pie",
					indexLabelFontFamily: "Calibri",
					indexLabelFontSize: 20,
					indexLabel: "{label} {y}%",
					startAngle:-20,
					showInLegend: true,
					dataPoints: [
					{  y: 50%, label: "Richtig beantwortet" },
					{  y: 50%, label: "Falsch beantwortet" }
					]
				}
				]
			});
			chart.render();
		}
		</script>