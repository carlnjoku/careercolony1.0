$.validator.setDefaults(
{
	//submitHandler: function() { alert("submitted!"); },
	showErrors: function(map, list) 
	{
		this.currentElements.parents('label:first, div:first').find('.has-error').remove();
		this.currentElements.parents('.form-group:first').removeClass('has-error');
		
		$.each(list, function(index, error) 
		{
			var ee = $(error.element);
			var eep = ee.parents('label:first').length ? ee.parents('label:first') : ee.parents('div:first');
			
			ee.parents('.form-group:first').addClass('has-error');
			eep.find('.has-error').remove();
			eep.append('<p class="has-error help-block">' + error.message + '</p>');
		});
		//refreshScrollers();
	}
});

$(function()
{
	// validate signup form on keyup and submit
	$("#validateSubmitForm").validate({
		rules: {
			companyName: "required",
			postedBy: "required",
			phone: "required",
			location: "required",
			state: "required",
			classification: "required",
			
			desc: {
				ignore: ":hidden:not(textarea)",
				required: true,
				minlength: 100
			},
			
			email: {
				required: true,
				email: true
			},
			
			agree: "required"
		},
		messages: {
			companyName: "Please enter company name",
			postedBy: "Please enter your company name",
			phone: "Please enter valid phone number",
			location: "Please enter your lastname",
			state: "Please select state",
			classification: "Please select job classification",
			desc: {
				required: "Please enter job description and responsibility",
				minlength: "Please provide detailed job description"
			},
			
			email: "Please enter a valid email address",
			agree: "Please accept our policy"
		}
	});

	// propose username by combining first- and lastname
	$("#username").focus(function() {
		var firstname = $("#firstname").val();
		var lastname = $("#lastname").val();
		if(firstname && lastname && !this.value) {
			this.value = firstname + "." + lastname;
		}
	});

	//code to hide topic selection, disable for demo
	var newsletter = $("#newsletter");
	// newsletter topics are optional, hide at first
	var inital = newsletter.is(":checked");
	var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
	var topicInputs = topics.find("input").attr("disabled", !inital);
	// show when newsletter is checked
	newsletter.click(function() {
		topics[this.checked ? "removeClass" : "addClass"]("gray");
		topicInputs.attr("disabled", !this.checked);
	});
});