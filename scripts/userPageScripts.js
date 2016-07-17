$(document).ready(function(){
	start();
});

function start(){
	$("#sideBar1").click(function(){
		$("#sideBar1").addClass("active");
		$("#userDetails").removeClass("hidden");

		$("#sideBar2").removeClass("active");
		$("#articleSection").addClass("hidden");

		$("#sideBar3").removeClass("active");
		$("#commentSection").addClass("hidden");

	});
	$("#sideBar2").click(function(){
		$("#sideBar2").addClass("active");
		$("#articleSection").removeClass("hidden");

		$("#sideBar1").removeClass("active");
		$("#userDetails").addClass("hidden");

		$("#sideBar3").removeClass("active");
		$("#commentSection").addClass("hidden");

	});
	$("#sideBar3").click(function(){
		$("#sideBar3").addClass("active");
		$("#commentSection").removeClass("hidden");

		$("#sideBar2").removeClass("active");
		$("#articleSection").addClass("hidden");

		$("#sideBar1").removeClass("active");
		$("#userDetails").addClass("hidden");
	});
}