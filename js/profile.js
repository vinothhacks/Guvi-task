$(document).ready(function(){
	$("form").submit(function(e){
		e.preventDefault();
		$.ajax({
			url: "php/profile.php",
			method: "POST",
			data: $(this).serialize(),
			success: function(response){
				if(response == "success"){
					window.location.href = "index.html";
				}
			}
		});
	});
});