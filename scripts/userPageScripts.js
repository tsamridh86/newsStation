$(document).ready(function(){
	start();
});

function start(){
	$("#sideBar1").click(function(){
		$("#sideBar1").addClass("active");
		$("#sideBar2").removeClass("active");
		$("#sideBar3").removeClass("active");
	});
	$("#sideBar2").click(function(){
		$("#sideBar2").addClass("active");
		$("#sideBar1").removeClass("active");
		$("#sideBar3").removeClass("active");
	});
	$("#sideBar3").click(function(){
		$("#sideBar3").addClass("active");
		$("#sideBar2").removeClass("active");
		$("#sideBar1").removeClass("active");
	});
}