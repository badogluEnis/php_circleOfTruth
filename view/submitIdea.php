<h3>Sende uns hier deine Ideen für neue Fragen zu!</h3>
<br>


<form action="/idea/create" class="senden">

	<div class="formular">

		<div class="col-xs-12">
			<textarea required="required" class="form-control" name="frage"
				id="frage" rows="5" cols="30" placeholder="Frage"
				style="resize: none" required></textarea>
			<br>
			<br>
		</div>

		<div class="form-group col-xs-6 abstand">
			<label class="control-label sr-only" for="lastname">Korrekte Antwortmöglichkeit</label>
			<input name="antw1" data-custom-message="true" required="required"
				placeholder="Korrekte Antwortmöglichkeit" type="text" class="form-control input-lg"
				id="antw1" aria-describedby="antw1Status"> <span
				class="glyphicon glyphicon-remove hidden form-control-feedback"
				aria-hidden="true"></span> <span id="antw1Status"
				class="help-block hidden">Wie lautet die richtige Antwort?</span>
		</div>
		
		
		<div class="form-group col-xs-6 abstand">
			<label class="control-label sr-only" for="lastname">Falsche Antwortmöglichkeit</label>
			<input name="antw2" data-custom-message="true" required="required"
				placeholder="Korrekte Antwortmöglichkeit" type="text" class="form-control input-lg"
				id="antw2" aria-describedby="antw2Status"> <span
				class="glyphicon glyphicon-remove hidden form-control-feedback"
				aria-hidden="true"></span> <span id="antw2Status"
				class="help-block hidden">Wie lautet die falsche Antwort?</span>
		</div>

		<label> <input type="checkbox"> Die Frage ist eine Moralfrage*
		</label>

		<div class="submit">
			<button type="submit" name="submit" class="btn btn-success">Absenden</button>
		</div>

		<p class="radio">* Moralfrage bedeutet, dass es keine richtige Antwort
			gibt. Trotzdem werden beide Antwortm&oumlglichkeiten ben&oumltigt</p>

	</div>

</form>
