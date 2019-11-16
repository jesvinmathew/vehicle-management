$(function(){
	
	$("#form").validate({
		rules: {
			name: {
				required: true,
				minlength: 3
			},
			userName:{
				required: true,
				minlength: 4
			},
			current:{
				required: true,
				minlength: 5
			},
			pass:{
				required: true,
				minlength: 5
			},
			qualification: {
				required: true
			},
			phone: {
				required: true,
				number: true,
				minlength: 10
			},
			email: {
				required: true,
				email: true
			},
			message: {
				required: true
			}
		},
		messages: {
			name: {
				required: 'This field is required',
				minlength: 'Minimum length: 3'
			},
			userName:{
				required: 'This field is required',
				minlength:  'Minimum length: 4'
			},
            
			current:{
				required: 'This field is required',
				minlength:  'Minimum length: 5'
			},
			pass:{
				required: 'This field is required',
				minlength:  'Minimum length: 5'
			},
			company: {
				required: 'This field is required'
			},
			phone: {
				required: 'This field is required',
				number: 'Invalid phone number',
				minlength: 'Minimum length: 10'
			},
			email: 'Invalid e-mail address',
			message: {
				required: 'This field is required'
			}
		},
		success: function(label) {
			label.html('OK').removeClass('error').addClass('ok');
			setTimeout(function(){
				label.fadeOut(500);
			}, 2000)
		}
	});
	
});