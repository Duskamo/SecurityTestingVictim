$(document).ready(function() {
	// on page-load
	$.ajax({
		url : "./src/getEmail.php",
		type: "GET",
		success: function(data)
		{
			$("#emailText").val(data);
		}
	});
	
	$.ajax({
		url : "./src/getComments.php",
		type: "GET",
		success: function(data)
		{
			var comments = data.split(',');
			comments.pop();
			
			var content = "<ul class='list-group'>";
			for (var i = 0; i < comments.length; i++) {
				content += "<li class='list-group-item'>" + comments[i] + "</il>";
			}
			content += "</ul>";

			$("#emailOutput").html(content);
		}
	});

	// on action
	$("#emailButton").on("click",function() {
		$email = $("#emailText").val();
		
		$.ajax({
			url : "./src/putEmail.php",
			type: "POST",
			data : { "email" : $email},
			success: function(data)
			{
				$("#emailText").val(data);
			}
		});
	});
	
	$("#commentButton").on("click", function() {
		$comment = $("#commentText").val();
		
		$.ajax({
			url : "./src/postComment.php",
			type: "POST",
			data : { "comment" : $comment},
		});
		
		$.ajax({
			url : "./src/getComments.php",
			type: "GET",
			success: function(data)
			{
				var comments = data.split(',');
				comments.pop();
				
				var content = "<ul class='list-group'>";
				for (var i = 0; i < comments.length; i++) {
					content += "<li class='list-group-item'>" + comments[i] + "</il>";
				}
				content += "</ul>";

				$("#emailOutput").html(content);
			}
		});
	});
});