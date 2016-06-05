	function displayToggle()
	{
		var loginTab = document.getElementById('login');
		var signTab = document.getElementById('signUp');
		if(loginTab.style.display == 'block')
		{
			loginTab.style.display = 'none';
			signTab.style.display = 'block';
		}
		else 
		{
			loginTab.style.display = 'block';
			signTab.style.display = 'none';
		}
	}
