
function activateSliders(){
    
    $('.slider').each(function(){
        console.log("Sliders Activated");
       var sliderId =  $(this).attr('id');
       $("#" + sliderId).lightSlider({
        pager: false, 
        loop: true
       });
    });
}

function windowSizeCheck(sidebarSize){
    if(($("#page-content-wrapper").width()!=null) && (($("#page-content-wrapper").outerWidth() - sidebarSize) <= 852)){
        $('#menu').insertBefore('#search-bar');
        $('#menu').addClass('mobile-menu');
        $('#search-bar').addClass('fullWidth');
        $('#menu').addClass('halfWidth');
        $('.navbar-header').addClass('halfWidth');
    }
}

$(document).ready(function(){

    activateSliders();
    windowSizeCheck(0);

    /* Toggle sidebar */
    $(".create_collection").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        $(".add_to_collection_btn").css("display", "inline-block");
        $("#save_collection_btn").toggle();
        $("#discard_collection_btn").toggle();
        windowSizeCheck(300);
    });
    
    // Add to/Remove from sidebar 
    $('body').on('click', '.add_to_collection_btn', function () {
        addToCollection($(this));
    });
    
    $('body').on('click', '.remove_from_collection_btn', function () {
        removeFromCollection($(this));
    });
    
    /* Save techniques in sidebar in a php collection */
    $("#save_collection_btn").click(function(e) {
        // Get collection title
        var collection_title = $(".sidebar-brand").val();
        
        // Get collection technique
        var collection_techniques = new Array();
        var moreThanZero = false;
        $('#sidebar li').each(function() {
            moreThanZero = true;
            var identifier = $(this).find("div[id*='-sidebar']").attr("id").replace("-sidebar","");
            collection_techniques.push(identifier);
        });
        
        // Send to php in an array
        var collection = {
            collection_title : collection_title, 
            collection_techniques: collection_techniques
        };

        
        if (moreThanZero === true) {
            $.ajax({
                url: 'collection-creator',
                data: collection,
                success : function(response) {  
                    // TODO error message for response === "Collection exists already"
                    console.log(response);
                    if (response.indexOf("Created collection:") > -1) {
                        var collection_uid = response.replace("Created collection:", "");
                        window.location.href = "/interaction-museum/collections/" + collection_uid;
                    }
                }
            });
        } else {
            // TODO error message for no selected technique
        }
    });
	
    // Log out routine
    $(".logout-btn").click(function(e) {
        window.location.href = "/interaction-museum/Logout"
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

// Add technique to sidebar
function addToCollection(element) {
    // Get information of clicked thumbnail.
    var thumbnail = element.parent();
    var identifier = thumbnail.attr("id").replace("-thumbnail","");
    var thumbnail_image = thumbnail.find("#" + identifier + "-image").attr("src");
    var thumbnail_title = thumbnail.find("#" + identifier + "-title").html();

    // Add it to the HTML
    $("#sidebar").append(
        "<li class='col-xs-12'>" +
            "<div id='" + identifier + "-sidebar' class='thumbnail'>" +    
                "<button class='btn btn-warning remove_from_collection_btn' type='submit'> <span class='glyphicon glyphicon-remove'></span></button>" + 
                "<a href='" + identifier + "'>" +
                    "<img src='" + thumbnail_image + "' alt='' >" +
                    "<p class='caption'>" + thumbnail_title + "</p>" +
                "</a>" +
            "</div>" +
        "</li>"
    );   

    toggleButton(element, "add");        
};

// Remove technique from sidebar
function removeFromCollection(element) {
    var identifier = element.parent().attr('id').replace("-thumbnail","").replace("-sidebar","");
    $("#" + identifier + "-sidebar").remove();

    toggleButton(element, "remove");
}

// Toggle add/remove button and classes for technique.
function toggleButton(element, addOrRemove) {
    if(addOrRemove === "add") {
        element.removeClass("add_to_collection_btn"); 
        element.addClass("remove_from_collection_btn"); 
    } else if (addOrRemove === "remove") {
        element.removeClass("remove_from_collection_btn"); 
        element.addClass("add_to_collection_btn"); 
    }

    element.find("span").toggleClass("glyphicon-remove");
    element.toggleClass("btn-warning"); 
}

// String can contain latin characters, apostrophes and dashes (also from spaces). No commas, or special characters.
/*
function normalizeString(inputString, lettercase) {
    inputString = inputString.latinize();
    inputString = inputString.replace(/[^a-zA-Z0-9\'\- ]/g,"");
>>>>>>> refs/remotes/origin/master
    inputString = inputString.toLowerCase();
    inputString = inputString.replace(/\s/g, "-");
    return inputString;
}
*/

/* --------------------- MOUSE HOVER --------------------- */
/*// Replaces the JPG image for a GIF. 
function play(image) {
     var GIF = image.src.replace('.jpg', '.gif');
     image.src = GIF;

     I tried a border, but it is not working.
    image.classList.remove('stopping');
    image.classList.add('playing');
}

// Replaces the GIF image for a JPG. 
function stop(image) {
     var JPG = image.src.replace('.gif', '.jpg');
     image.src = JPG;
}*/