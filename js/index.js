$(document).ready(function() {
	$("#signInButton").on("click",function() {
		var $username = $("#usernameText").val();
		var $password = $("#passwordText").val();
		
		$.ajax({
			url : "./src/index.php",
			type: "POST",
			data : { "user" : $username, "pass" : $password},
			success: function(data)
			{
				//window.location.replace(data);
			}
		});
	});
});