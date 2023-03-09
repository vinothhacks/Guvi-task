$(document).ready(function(){
	$("form").submit(function(e){
		e.preventDefault();
		$.ajax({
			url: "php/register.php",
			method: "POST",
			data: $(this).serialize(),
			success: function(response){
				if(response == "success"){
					window.location.href = "login.html";
				}
			}
		});
	});
});