
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

var techniques = {}; 

$(document).ready(function(){
    
    activateSliders();
    windowSizeCheck(0);
    
    /* Toggle sidebar */

    $('body').on('click', '.new_collection', function (e) {
        e.preventDefault();
        sessionStorage.title = "";
        toggleSidebar();
    });
    
    // Add to/Remove from sidebar 
    $('body').on('click', '.add_to_collection_btn', function () {
        console.log($(this));
        addToCollection($(this));
    });
    
    $('body').on('click', '.remove_from_collection_btn', function () {
        var id = $(this).parent().attr('id').replace("-thumbnail","").replace("-sidebar","");
        removeFromCollection(id);
    });
    
    // Save/Discard collection
    $('body').on('click', '#save_collection_btn', function () {
        saveCollection($(this));
    });
    
    $('body').on('click', '#discard_collection_btn', function (e) {
        for ( key in techniques){
            removeFromCollection(key);
        }
        sessionStorage.title = "";
        $(".sidebar-brand").val(sessionStorage.title);
        toggleSidebar();
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

    $('.sidebar-brand').bind('input', function(){
        sessionStorage.title = $(this).val();
    });
    //if a collection was in the making
    if(!isEmpty(JSON.parse(sessionStorage['techniques']))){
        techniques = JSON.parse(sessionStorage['techniques']);      
        for ( key in techniques){
            appendTechnique(key, techniques[key].image, techniques[key].title);
            toggleButton($("#"+key+"-btn"), "remove");
        }
        toggleSidebar();

    }else{
        console.log("no techniques");
    }

    if(!(!sessionStorage.title.trim())){
        $(".sidebar-brand").val(sessionStorage.title);
    }

});

// Add technique to sidebar
function addToCollection(element) {
    // Get information of clicked thumbnail.
    var thumbnail = element.parent();
    var identifier = thumbnail.attr("id").replace("-thumbnail","");
    var thumbnail_image = thumbnail.find("#" + identifier + "-image").attr("src");
    var thumbnail_title = thumbnail.find("#" + identifier + "-title").html();
    
    // sessionStorage.setItem(sessionStorage.length, JSON.stringify(parsedResult.ListaPermessi));
    techniques[identifier] = {
        id: identifier,
        image: thumbnail_image,
        title: thumbnail_title
    }
    sessionStorage['techniques'] = JSON.stringify(techniques);
    console.log(JSON.parse(sessionStorage['techniques']));
    // Add it to the HTML
    appendTechnique(identifier, thumbnail_image, thumbnail_title);
    // Toggle thumbnail button
    toggleButton(element, "remove"); 
    console.log(element);       
};

// Remove technique from sidebar
function removeFromCollection(id) {
    //deletes it from session storage 
    delete techniques[id];
    sessionStorage['techniques'] = JSON.stringify(techniques);
    // Toggle thumbnail button
    toggleButton($("#" + id + "-btn"), "add");
    
    // Remove from sidebar
    $("#" + id + "-sidebar").remove();

}

// Toggle button to be set to the addOrRemove value.
function toggleButton(element, addOrRemove) {
    if(addOrRemove === "remove") {
        element.removeClass("add_to_collection_btn"); 
        element.addClass("remove_from_collection_btn"); 
        element.addClass("displayInline");
    } else if (addOrRemove === "add") {
        // console.log(element);
        element.removeClass("remove_from_collection_btn"); 
        element.addClass("add_to_collection_btn"); 
    }

    element.find("span").toggleClass("glyphicon-remove");
    element.toggleClass("btn-warning"); 
}

function toggleSidebar() {

    $("#wrapper").toggleClass("toggled");
    $(".add_to_collection_btn").toggleClass("displayInline");
    $("#save_collection_btn").toggle();
    $("#discard_collection_btn").toggle();
    windowSizeCheck(300);
}

    
function saveCollection(element) {    
    var collection_techniques = [];
    // Get technique UID
    techniques = JSON.parse(sessionStorage['techniques']);      
    for (key in techniques){
        collection_techniques.push(key);
    }

    // Send to php in an array
    var collection = {
        collection_title : sessionStorage.title, 
        collection_techniques: collection_techniques
    };

    if(!isEmpty(techniques) && !(!sessionStorage.title.trim())) {
        $.ajax({
            url: 'collection-creator',
            data: collection,
            success : function(response) {  
                console.log(response);
                if (response.indexOf("Created collection:") > -1) {
                    var collection_uid = response.replace("Created collection:", "");
                    window.location.href = "/interaction-museum/all-collections/" + collection_uid;
                } 
                // Show tooltip if something went wrong
                else if (response.indexOf("exists already") > -1 
                           || response === "Something went wrong. Try again.") {
                    showTooltip(response);
                } 
            }
        });
        //remove all techniques from collection and reset session Storage
        for ( key in techniques){
            removeFromCollection(key);
        }
        sessionStorage.title = "";
    } else if (isEmpty(techniques)){

        showTooltip("There are no techniques in this collection!");
    }else {
       
        $(".sidebar-brand").focus();
         showTooltip("Your collection doesn't have a title");
    }
}
 
function appendTechnique(id, image, title){
    $("#sidebar").append(
        "<li class='col-xs-12'>" +
            "<div id='" + id + "-sidebar' class='thumbnail'>" +    
                "<button class='btn btn-warning remove_from_collection_btn' type='submit'> <span class='glyphicon glyphicon-remove'></span></button>" + 
                "<a href='" + id + "'>" +
                    "<img src='" + image + "' alt='' >" +
                    "<p class='caption'>" + title + "</p>" +
                "</a>" +
            "</div>" +
        "</li>"
    ); 
}

function isEmpty(obj) {

    // null and undefined are "empty"
    if (obj == null) return true;

    // Assume if it has a length property with a non-zero value
    // that that property is correct.
    if (obj.length > 0)    return false;
    if (obj.length === 0)  return true;

    // Otherwise, does it have any properties of its own?
    // Note that this doesn't handle
    // toString and valueOf enumeration bugs in IE < 9
    for (var key in obj) {
        if (hasOwnProperty.call(obj, key)) return false;
    }

    return true;
}

// Show tooltip on error.
function showTooltip(title) {
    $('#save_collection_btn').tooltip({title: title});
    $('#save_collection_btn').tooltip('show');

     setTimeout(function(){
        $('#save_collection_btn').tooltip('destroy');
    }, 4000);
}
