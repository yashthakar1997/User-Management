$(document).ready(function() {
	$(document).on('click','#login', function() {
		$.ajax({
			url: "login.php",
			method: "POST",
			data: {
				username: $('#username').val(),
				password: $('#password').val()
			},
			success: function(data){
				$('.msg-box').removeClass('d-none').slideDown();
				var response = $.parseJSON(JSON.stringify(data));
				$('#msg').text(response.message);
				if(response.message == 'success'){
					window.location.replace("dashboard.php");
				}
			},
			error: function(data){
				console.log(data);
			}	
		})
	});

	$(document).on('click','#addUser', function() {
		$.ajax({
			url: "addUser.php",
			method: "POST",
			data: {
				username: $('#username').val(),
				password: $('#password').val(),
				mobile: $('#mobile').val(),
				address: $('#address').val(),
				status: $('#status').is(":checked")
			},
			success: function(data) {
				console.log(data);
			},
			error: function(err) {
				console.error(err);
			}
		});
	});



});


function showusers(limit,offset) {
		// show users
	$.ajax({
			url: "showusers.php",
			method: "POST",
			data: {
				limit: limit,
				offset: offset,
			},
			success: function(data) {
				console.log(data);
				var response = $.parseJSON(JSON.stringify(data));
				var count = 0;
				for (var i = response.length - 1; i >= 0; i--) {
					count++;
					$('#users').append(`
						<tr>
						  <th scope="row">${count}</th>
						  <td>${response[i].username}</td>
						  <td>${response[i].mobile}</td>
						  <td>${response[i].status}</td>
						</tr>
						`);
				};
			},
			error: function(err) {
				console.error(err);
			}
		});
}