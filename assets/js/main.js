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
function windowSizeCheck(){
    if($("#page-content-wrapper").width() < 1420){
        $("#search-bar").removeClass("pull-right");
        console.log("I'm here");
    }
}

$(document).ready(function(){
    
    
    /* Toggle sidebar */
    $(".create_collection").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        $(".add_to_collection_btn").css("display", "inline-block");
        $("#save_collection_btn").toggle();
        $("#discard_collection_btn").toggle();
        windowSizeCheck();
        console.log($("#page-content-wrapper").width());
    });
    
    /* Add technique to sidebar */
    $(".add_to_collection_btn").click(function(e) {
        // Get information of clicked thumbnail.
        var thumbnail = $(this).parent();
        var thumbnail_title = thumbnail.find("#thumbnail-title").html();
        var thumbnail_URL = thumbnail.find("#thumbnail-technique").attr("href");      
        var thumbnail_image = thumbnail.find("#thumbnail-image").attr("src");

        var identifier = thumbnail_title.replace(/\s/g, "-") + "-sidebar";
        
        // If not already in HTML, add it.
        if ($("#" + identifier).length === 0) {
            $("#sidebar").append(
                "<li id='" + identifier + "' class='col-xs-12'>" +
                    "<div class='thumbnail'> <button class='btn btn-warning remove_from_collection_btn' type='submit'> <span class='glyphicon glyphicon-remove'></span></button>" + 
                        "<a href='" + thumbnail_URL + "'>" +
                            "<img src='" + thumbnail_image + "' alt=''" +
                            "onmouseover='play(this);' onmouseout='stop(this);'>" +
                            "<p class='caption'>" + thumbnail_title + "</p>" +
                        "</a>" +
                    "</div>" +
                "</li>"
            );   
        } 
        // If already in there, remove it.
        else {
            $("#" + identifier).remove();
        }
        
        // Change add/remove button
        $(this).find("span").toggleClass("glyphicon-remove");
        $(this).toggleClass("btn-warning"); 
    });
    $(".remove_from_collection_btn").click(function(e) {
        $(this).parent().remove();
      
    });
    /* Save techniques in sidebar in a php collection */
    $("#save_collection_btn").click(function(e) {
        var sidebar_title = $(".sidebar-brand").html();
        var collection_title = sidebar_title.toLowerCase().replace(/\s/g,'-');
        
        var sidebar_techniques = "";
        var counter = 0;
        $('#sidebar li').each(function() {
            if (counter !== 0) {
                sidebar_techniques = sidebar_techniques + ",";
            }
            var technique = $(this).find(".caption").html();
            sidebar_techniques = sidebar_techniques + technique;
            counter = counter + 1;
        });
        
        // TODO if no selected techniques: error message.
        
        // Send to php collection
        var arguments = sidebar_title + "!@!" + sidebar_techniques;
        $.ajax({
            url: 'collection-creator',
            data: arguments,
            success : function(response) {  
                // TODO if (response === "Collection exists already"): error message.
                console.log(response);
                
                if (response === "New collection was created.") {
                    console.log("here");
                    window.location.href = "/interaction-museum/collections/" + collection_title;
                }
            }
        });
        
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
