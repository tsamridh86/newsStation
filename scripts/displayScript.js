$(document).ready(
	function(){
		branch();
});

function branch(){
	$("#bright").text("dark");
	$("#closer").click(
		function(){
		$("#topAlert").fadeOut();
	});
	$("strong").click(
		function(){
			if($("#bright").text()=="light")
				{
					$("#bright").text("dark");
					$(".bigBack").css("background-color","#BC8F8F");
				}
			else	//if this thing is light
			{
				$("#bright").text("light");
				$(".bigBack").css("background-color","#000000");
			}
		}
	);
}
