$(document).ready(
	function(){
		branch();
});

function branch(){
	$("#bright").text("dark");		//this has to be set in the beginning as the value is constantly used in the functions below
	$("#closer").click(
		function(){
		$("#topAlert").fadeOut();
	});
	$("strong").click(
		function(){
			if($("#bright").text()=="light")
				{
					//switch over to the darker theme for easier reading in low light conditions
					$("#bright").text("dark");
					$(".bigBack").css("background-color","#BC8F8F");
					$(".reading").css({"background-color":"white","color":"black"});
					
				}
			else	//if this thing is dark, switch over to a ligher color schema
			{
				$("#bright").text("light");
				$(".bigBack").css("background-color","#000000");
				$(".reading").css({"background-color":"#661a00","color":"#f2f2f2"});
			}
		}
	);
}
