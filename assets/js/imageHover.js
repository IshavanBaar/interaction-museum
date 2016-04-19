$(document).ready(function()
{
	// Get image source from document.
	var div = document.getElementById("dom-target");
	var image_source = div.textContent;
	
	// Show gif when hovered over, otherwise normal image.
	$("#header-image").hover(
		function() {
			$(this).attr("src", image_source.replace('.jpg', '.gif'));
		},
		function() {
			$(this).attr("src", image_source);
		}                         
	);            
});
