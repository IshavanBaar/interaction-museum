var techniques = {}; 
sessionStorage.techniquesNumber = 0;

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

    $('body').on('click', '.new_collection', function (e) {
        toggleSidebar(e);
    });
    
    // Add to/Remove from sidebar 
    $('body').on('click', '.add_to_collection_btn', function () {
        addToCollection($(this));
    });
    
    $('body').on('click', '.remove_from_collection_btn', function () {
        removeFromCollection($(this));
    });
    
    // Save/Discard collection
    $('body').on('click', '#save_collection_btn', function () {
        saveCollection($(this));
    });
    
    $('body').on('click', '#discard_collection_btn', function (e) {
        // TODO Reset
        toggleSidebar(e);
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
    sessionStorage.techniquesNumber++;
    // sessionStorage.setItem(sessionStorage.length, JSON.stringify(parsedResult.ListaPermessi));
    techniques[identifier + "-" + sessionStorage.techniquesNumber] = {
        id: identifier,
        image: thumbnail_image,
        title: thumbnail_title
    }
    sessionStorage['techniques'] = JSON.stringify(techniques);

    console.log(JSON.parse(sessionStorage['techniques']));
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

    // Toggle thumbnail button
    toggleButton(element, "remove");        
};

// Remove technique from sidebar
function removeFromCollection(element) {
    var element_id = element.parent().attr('id');
    var identifier = element_id.replace("-thumbnail","").replace("-sidebar","");
    
    // Toggle thumbnail button
    toggleButton($("#" + identifier + "-btn"), "add");
    
    // Remove from sidebar
    $("#" + identifier + "-sidebar").parent().remove();
}

// Toggle button to be set to the addOrRemove value.
function toggleButton(element, addOrRemove) {
    if(addOrRemove === "remove") {
        element.removeClass("add_to_collection_btn"); 
        element.addClass("remove_from_collection_btn"); 
    } else if (addOrRemove === "add") {
        console.log(element);
        element.removeClass("remove_from_collection_btn"); 
        element.addClass("add_to_collection_btn"); 
    }

    element.find("span").toggleClass("glyphicon-remove");
    element.toggleClass("btn-warning"); 
}

// Toggle sidebar on/off.
function toggleSidebar(e) {
    e.preventDefault();
    sessionStorage.title = "";
    console.log(sessionStorage);
    $("#wrapper").toggleClass("toggled");
    $(".add_to_collection_btn").css("display", "inline-block");
    $("#save_collection_btn").toggle();
    $("#discard_collection_btn").toggle();
    windowSizeCheck(300);
}

// Save collection as a new page. 
function saveCollection(element) {
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
    
    // Send to ajax if collection size > 1
    if (moreThanZero === true) {
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
    } else {
        showTooltip("There are no techniques in this collection!");
    }
}

// Show tooltip on error.
function showTooltip(title) {
    $('#save_collection_btn').tooltip({title: title});
    $('#save_collection_btn').tooltip('show');

     setTimeout(function(){
        $('#save_collection_btn').tooltip('destroy');
    }, 4000);
}
