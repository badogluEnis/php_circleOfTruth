	
<div class="anmelden_registrieren">
	<form action="/register/create" method ="POST" class="register">
		<div class="register">
			<input name="username"
			data-custom-message="true"
			required="required"
			placeholder="Benutzername"
			type="text"
			class="form-control"
			id="username"
			aria-describedby="usernameStatus"> <span
			class="hidden glyphicon glyphicon-remove form-control-feedback"
			aria-hidden="true"></span> <span
			id="usernameStatus"
			class="help-block hidden">Bitte gib deinen Benutzernamen ein.</span>
		</div>

		<div class="register">
			<input name="password"
				style="margin-top: 25px;"			
				data-custom-message="true"
				required="required"
				placeholder="Passwort"
				type="password"
				class="form-control"
				id="password"
				aria-describedby="passwordStatus">
				<span
				class="glyphicon hidden glyphicon-remove form-control-feedback"
				aria-hidden="true">
				</span>
				<span id="passwordStatus"
				class="hidden help-block">Bitte gib ein Passwort ein, welches
				mindestens ein gross und ein klein geschriebener Buchstabe enthält
				und eine Zahl oder ein Sonderzeichen müssen sich auch in deinem
				Passwort enthalten sein.
				</span>
		</div>
		
				<div class="register">
			<input name="repassword"
				style="margin-top: 25px;"			
				data-custom-message="true"
				required="required"
				placeholder="Passwort wiederholen"
				type="password"
				class="form-control"
				id="repassword"
				aria-describedby="passwordStatus">
				<span
				class="glyphicon hidden glyphicon-remove form-control-feedback"
				aria-hidden="true">
				</span>
				<span id="passwordStatus"
				class="hidden help-block">Passwörter stimmen nicht überein
				</span>
		</div>
		
		<div class="form-group">
			<div class="button">
				<button type="submit" name="register" class="btn btn-lg btn-danger" style="margin-top: 25px;">Registrieren</button>
			</div>
		</div>
	</form>

</div>
