var div = document.getElementById("dom-target");
var image_source = div.textContent;

$("#header-image")
	.mouseover(function() {
		console.log("Hover");
		$(this).attr("src", image_source.replace('.jpg', '.gif'));
		console.log($(this).attr("src"));
	})
	.mouseout(function() {
		console.log("Not hover");
		$(this).attr("src", image_source);
		console.log($(this).attr("src"));
	}                         
);            

//http://localhost/interaction-museum/recently-added/
//C:\xampp\htdocs\interaction-museum\content\recently-added\1-bubble-cursor\bubble_cursor.gif

/*var source = "\..\content\recently-added\1-bubble-cursor\bubble_cursor.gif";
var source2 = $("header-image").src;
console.log(source2);*/
	