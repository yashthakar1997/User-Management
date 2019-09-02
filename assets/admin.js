$(document).ready(function() {

	$(document).on('click','#install-save-changes', function() {
		$.ajax({
			url: "installation.php",
			method: "POST",
			data: {
				action: 'save-configs',
				hostname: $('#hostname').val(),
				username: $('#username').val(),
				password: $('#password').val(),
				database: $('#database').val()
			},
			success: function(data){
				var response = $.parseJSON(JSON.stringify(data));
				let res;
				Object.keys(response).forEach(key => {
					$('#msg').append(Object.values(response[key]));
				});
				
				// if(response.message == 'success'){
				// 	window.location.replace("dashboard.php");
				// }	
			},
			error: function(data){
				console.log(data);
			}	
		})
	});

});
