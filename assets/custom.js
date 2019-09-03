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
				$('#AddUserModal').modal('hide');
				$('#users').html('');
				showusers();
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
				var response = $.parseJSON(JSON.stringify(data));
				var count = 0;
				for (var i = response.length - 1; i >= 0; i--) {
					count++;
					$('#users').append(`
						<tr>
						  <th scope="row">${count}</th>
						  <td>${response[i].username}</td>
						  <td>${response[i].mobile}</td>
						  <td class="text-center">
							<svg class="mx-2" id="i-eye" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="30" height="30" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
							    <circle cx="17" cy="15" r="1" />
							    <circle cx="16" cy="16" r="6" />
							    <path d="M2 16 C2 16 7 6 16 6 25 6 30 16 30 16 30 16 25 26 16 26 7 26 2 16 2 16 Z" />
							</svg>
							<svg class="mx-2" id="i-edit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="30" height="30" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
							    <path d="M30 7 L25 2 5 22 3 29 10 27 Z M21 6 L26 11 Z M5 22 L10 27 Z" />
							</svg>
							<svg class="mx-2" id="i-trash" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
								<path d="M28 6 L6 6 8 30 24 30 26 6 4 6 M16 12 L16 24 M21 12 L20 24 M11 12 L12 24 M12 6 L13 2 19 2 20 6" />
							</svg>
						  </td>
						</tr>
						`);
				};
			},
			error: function(err) {
				console.error(err);
			}
		});
}