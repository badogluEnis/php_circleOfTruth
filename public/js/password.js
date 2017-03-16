var passwordpattern = /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/g;

$(document).ready(function () {
	$('#password').change(function () {
		$(this).removeClass('validation-success');
		$(this).removeClass('validation-error');
		$(this).removeClass('has-feedback');

		
		if ($(this).val().match(passwordpattern)) {
			$(this).addClass('validation-success');
			$(this).addClass('has-feedback');

		
		} else {
			$(this).addClass('validation-error');
			$(this).addClass('has-feedback');

		}
	});
	
	$('#repassword').change(function () {
		$(this).removeClass('validation-success');
		$(this).removeClass('has-feedback');
		$(this).removeClass('validation-error');
		
		if ($(this).val().match('#repassword')) {
			$(this).addClass('validation-success');
			$(this).addClass('has-feedback');

		
		} else {
			$(this).addClass('validation-error');
			$(this).addClass('has-feedback');

		}
	});
});