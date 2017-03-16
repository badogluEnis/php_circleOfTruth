var passwordpattern = /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/g;

$(document).ready(function () {
	$('#password').change(function () {
		$(this).removeClass('has-success');
		$(this).removeClass('has-error');
		$(this).removeClass('has-feedback');

		
		if ($(this).val().match(passwordpattern)) {
			$(this).parent.addClass('has-success');
			$(this).parent.addClass('has-feedback');

		
		} else {
			$(this).parent.addClass('has-error');
			$(this).parent.addClass('has-feedback');

		}
	});
	
	$('#repassword').change(function () {
		$(this).parent.removeClass('validation-success');
		$(this).parent.removeClass('validation-error');
		
		if ($(this).val().match('#repassword')) {
			$(this).parent.addClass('validation-success');
			$(this).parent.addClass('has-feedback');

		
		} else {
			$(this).parent.addClass('validation-error');
			$(this).parent.addClass('has-feedback');

		}
	});
});