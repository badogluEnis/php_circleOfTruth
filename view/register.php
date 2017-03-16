	<form action="/register/create" method ="POST" class="register">
		<div class="form-group">
			<label class="control-label sr-only"
			for="firstname">First Name</label>
			<input name="username"
			data-custom-message="true"
			required="required"
			placeholder="Benutzername"
			type="text"
			class="form-control input-lg"
			id="username"
			aria-describedby="usernameStatus"> <span
			class="hidden glyphicon glyphicon-remove form-control-feedback"
			aria-hidden="true"></span> <span
			id="usernameStatus"
			class="help-block hidden">Bitte gib deinen Benutzernamen ein.</span>
		</div>

		<div class="form-group">
			<label class="control-label sr-only"
			for="password">Passwort</label>
			<input name="password"
				data-custom-message="true"
				pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"
				required="required"
				placeholder="Passwort"
				type="password"
				class="form-control input-lg"
				id="password"
				aria-describedby="passwordStatus">
				<span
				class="glyphicon hidden glyphicon-remove form-control-feedback"
				aria-hidden="true">
				</span>
				<span id="passwordStatus"
				class="hidden help-block">Bitte gin ein Passwort ein, welches
				mindestens ein gross und ein klein geschriebener Buchstabe enthält
				und eine Zahl oder ein Sonderzeichen müssen sich auch in deinem
				Passwort enthalten sein.
				</span>
		</div>
		<div class="form-group">
			<div class="button">
				<button type="submit" name="register" class="btn btn-lg btn-danger">Registrieren</button>
			</div>
		</div>
	</form>

</div>
