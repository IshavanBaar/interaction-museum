/* Replaces the JPG image for a GIF. */
function play(image) {
    // var GIF = image.src.replace('.jpg', '.gif');
    // image.src = GIF;

    // I tried a border, but it is not working.
    //image.classList.remove('stopping');
    //image.classList.add('playing');
}

/* Replaces the GIF image for a JPG. */
function stop(image) {
    // var JPG = image.src.replace('.gif', '.jpg');
    // image.src = JPG;
}

$(document).ready(function(){
    /* Sidebar toggle on/off */
    $("#sidebar_toggle").click(function(e) {
        console.log("here");
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
	
    /* Video / GIF hover */
	$("#video-hover").hide();

	$("#header_image").hover(function() {
        $("#video-hover").toggle();
        console.log("i'm in here");
    });

    $("#video-hover").hover(function() {
        $("#video-hover").toggle();

    });

    $("#header_image").click(function() {
        $("#gif").hide();
    });

    $("#video-hover").click(function() {
        $("#gif").hide();
    });
});
