document.title = 'Login Page';
$(document).ready(
	function(){
		$("#login").css("display","block");
	});
function displayToggle()
	{
		var loginTab = document.getElementById('login');
		var signTab = document.getElementById('signUp');
		if(loginTab.style.display == 'block')
		{
			loginTab.style.display = 'none';
			signTab.style.display = 'block';
			document.title = 'Sign Up Page';
		}
		else 
		{
			loginTab.style.display = 'block';
			signTab.style.display = 'none';
			document.title = 'Login Page';
		}
	}
