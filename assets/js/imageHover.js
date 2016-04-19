$(document).ready(function()
{
	var div = document.getElementById("dom-target");
	var image_source = div.textContent;

	$("#header-image").hover(
		function() {
			console.log("Hover");
			$(this).attr("src", image_source.replace('.jpg', '.gif'));
			console.log($(this).attr("src"));
		},
		function() {
			console.log("Not hover");
			$(this).attr("src", image_source);
			console.log($(this).attr("src"));
		}                         
	);            
});
