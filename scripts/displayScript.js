$(document).ready(
	function(){
		branch();
});

function branch(){
	$("#closer").click(
		function(){
		$("#topAlert").fadeOut();
	});
	$("strong").click(
		function(){
			if($("#bright").text()=="dark")
				$("#bright").text("light");
			else
				$("#bright").text("dark");
		}
	);
}
