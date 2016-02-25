$(document).ready(function() {
	$("#emailButton").on("click",function() {
		$email = $("#emailText").val();
		
		$.ajax({
			url : "./src/email.php",
			type: "POST",
			data : { "email" : $email},
			success: function(data)
			{
				$("#emailOutput").html(data);
			}
		});
	});
	
	$("#getEmailButton").on("click",function() {
		$email = $("#getEmailText").val();
		
		$.ajax({
			url : "./src/getEmail.php",
			type: "GET",
			data : { "getEmail" : $email},
			success: function(data)
			{
				$("#emailOutput").html(data);
			}
		});
	});
	
	$("#commentButton").on("click", function() {
		$comment = $("#commentText").val();
		
		$.ajax({
			url : "./src/comment.php",
			type: "GET",
			data : { "comment" : $comment},
			success: function(data)
			{
				$("#emailOutput").html(data);
			}
		});
	});
});