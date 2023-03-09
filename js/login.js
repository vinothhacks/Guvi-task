function login()
	{
		var uname = document.getElementById("email").value;
		var pwd = document.getElementById("pwd1").value;
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(uname =='')
		{
			alert("please enter mail-id.");
		}
		else if(pwd=='')
		{
        	alert("enter the password");
		}
		else if(!filter.test(uname))
		{
			alert("Enter valid email id.");
		}
		else if(pwd.length < 6)
		{
			alert("Password length should more than 6.");
		}
		else
		{
	        alert('Thank You for Login');
            window.location = "/profile.html";
			}
	}
	function clearFunc()
	{
		document.getElementById("email").value="";
		document.getElementById("pwd1").value="";
	}
$(document).ready(function(){
    $("form").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: "php/login.php",
            method: "POST",
            data: $(this).serialize(),
            success: function(response){
                if(response == "success"){
                    window.location.href = "profile.html";
                }
            }
        });
    });
});