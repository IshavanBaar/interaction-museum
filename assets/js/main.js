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
    if($("#page-content-wrapper").width() < 769){    
        $('#menu').insertBefore('#search-bar');
        $('#menu').addClass('mobile-menu');
    }
}

$(document).ready(function(){
    
    windowSizeCheck();
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

        var identifier = normalizeString(thumbnail_title).toLowerCase() + "-sidebar";
        
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
        // Get collection title
        var collection_title = normalizeString($(".sidebar-brand").html());
        
        // Get collection technique
        var collection_techniques = new Array();
        $('#sidebar li').each(function() {
            var technique = normalizeString($(this).find(".caption").html());
            collection_techniques.push(technique);
        });
        
        // TODO if no selected techniques: error message.
        
        // Send to php as a normalized string with two arguments.
        var collection = {
            collection_title : collection_title, 
            collection_techniques: collection_techniques
        };
        
        console.log(collection);
        $.ajax({
            url: 'collection-creator',
            data: collection,
            success : function(response) {  
                // TODO if (response === "Collection exists already"): error message.
                console.log(response);
                
                if (response === "New collection was created.") {
                    console.log("here");
                    window.location.href = "/interaction-museum/collections/" + collection_title.toLowerCase();
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

// String can contain characters and dashes (from spaces). No commas, or special characters.
function normalizeString(inputString) {
    inputString = inputString.replace(/[^a-zA-Z0-9 ]/g,"");
    inputString = inputString.replace(/\s/g, "-");
    return inputString;
}
