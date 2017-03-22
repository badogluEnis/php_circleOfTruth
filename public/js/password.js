var passwordpattern = /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/g;

$(document).ready(function () {
	$('#password').keyup(function () {
		$(this).parent().removeClass('has-success');
		$(this).parent().removeClass('has-error');
		$(this).parent().removeClass('has-feedback');

		
		if ($(this).val().match(passwordpattern)) {
			$(this).parent().addClass('has-success');
			$(this).parent().addClass('has-feedback');

		
		} else {
			$(this).parent().addClass('has-error');
			$(this).parent().addClass('has-feedback');



		}
	});
	
	$('#repassword').keyup(function () {
		$(this).parent().removeClass('has-success');
		$(this).parent().removeClass('has-error');
		
		
		if ($(this).val() == $('#password').val()) {
			$(this).parent().addClass('has-success');


		
		} else {
			$(this).parent().addClass('has-error');


		}
	});
});