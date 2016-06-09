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
    var new_collection = {};
    
    $(".create_collection").click(function(e) {
        console.log("Here");
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        $(".add_to_collection_btn").css("display", "inline-block");
    });
    
    /* Sidebar toggle on/off */
    $(".add_to_collection_btn").click(function(e) {
        console.log($("#wrapper").toggleClass());

        var thumbnail = $(this).parent();
        var thumbnail_URL = thumbnail.find("#thumbnail-technique").attr("href");
        var thumbnail_image = thumbnail.find("#thumbnail-image").attr("src");
        var thumbnail_title = thumbnail.find("#thumbnail-title").html();
        
        console.log(thumbnail_URL);
        
        new_collection.push(thumbnail_title);
        //$(".add_to_collection_btn")
        $("#sidebar").append(
       
            "<li>" +
                "<div class='thumbnail'>" +
                    "<a href='" + thumbnail_URL + "'>" +
                        "<img src='" + thumbnail_image + "' alt=''" +
                        "onmouseover='play(this);' onmouseout='stop(this);'>" +
                        "<p class='caption'>" + thumbnail_title + "</p>" +
                    "</a>" +
                "</div>" +
            "</li>"
        );
    });
	
    /* Video / GIF hover */
	$("#video-hover").hide();

	$("#header_image").hover(function() {
        $("#video-hover").toggle();
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

    /*
        <li>
            <div class="thumbnail">
                <a href="../../recently-added/knotty-gestures">
                    <img src="<?php echo $image->url();?>" alt=""
                    onmouseover="play(this);" onmouseout="stop(this);">

                    <p class="caption"><?php echo $technique->title()->html() ?></p>
                </a>
            </div>
        </li>
    */