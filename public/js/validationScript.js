function valid(element) {
	element.next().addClass("hidden");
	element.parent().removeClass("has-error");
	element.parent().removeClass("has-feedback");
	element.next().next().addClass("hidden");
}

function invalid(element) {
	element.next().removeClass("hidden");
	element.parent().addClass("has-error");
	element.parent().addClass("has-feedback");
	element.next().next().removeClass("hidden");

	if (element.attr("data-custom-message") == null) {
		element.next().next().html(element.context.validationMessage);
	}

}

function validate(element) {
	if (element.context.validity.valid) {
		valid(element);
	} else {
		invalid(element);
	}
}

function registerListeners() {
	requiredElements = $("input");
	requiredElements.each(function() {
		$(this).keyup(function() {
			validate($(this));
		});
		$(this).change(function() {
			validate($(this));
		});
	});
}

function validateForm() {
	requiredElements = $("input");
	requiredElements.each(function() {
		validate($(this));
	});
}

$("#submit").click(function(event) {
	validateForm();
});

$(document).ready(function() {
	registerListeners();
});