var addedViaThumbnail = true;
var sidebarOpen = false;
var techniques = {}; 

function activateSliders(){
    $('.slider').each(function(){
        //console.log("Sliders Activated");
        var sliderId =  $(this).attr('id');
        $("#" + sliderId).lightSlider({
            pager: false, 
            loop: true
        });
    });
}

function windowSizeCheck(sidebarSize){1
    if(($("#page-content-wrapper").width()!=null) && (($("#page-content-wrapper").outerWidth() - sidebarSize) <= 891)){
        $('#menu').insertBefore('#search-bar');
        $('#menu').addClass('mobile-menu');
        $('#search-bar').addClass('fullWidth');
        $('#menu').addClass('halfWidth');
        $('.navbar-header').addClass('halfWidth');
    }
}

function toggleSubmenu(){
    $(".submenu").toggle();      
}


$(document).ready(function(){
    activateSliders();
    windowSizeCheck(0);
    
        /* Toggle sidebar */
    $('body').on('mouseover', '.thumbnail', function () {
        var identifier = $(this).attr('id').replace("-thumbnail","");
        $(this).find("#" + identifier + "-btn").css("display", "inline-block");
    });
    
    $('body').on('mouseout', '.thumbnail', function () {
        var identifier = $(this).attr('id').replace("-thumbnail","");
        $(this).find("#" + identifier + "-btn").css("display", "none");
    });
    
    
    /* Toggle sidebar */
    $('body').on('click', '#new_collection', function (e) {
        // if it's on the collections page, go to techniques 
        e.preventDefault();
        emptyCollecton();
        toggleSidebar();

    });

    $('body').on('hover', '#userMenu', function (e) {
        $(".submenu").show();
    });
    
    // Add to/Remove from sidebar from thumbnail
    $('body').on('click', '.add_to_collection_btn', function (e) {
        e.preventDefault();
        toggleSidebar();
        addedViaThumbnail = true;
        addToCollection($(this));
    });
    
    // Add to/Remove from sidebar from technique
    $('body').on('click', '.add_to_collection_btn_technique', function (e) {
        addedViaThumbnail = false;
        e.preventDefault();
        toggleSidebar();
        addToCollection($(this));
    });
    
    $('body').on('click', '.remove_from_collection_btn_technique', function () {
        var id = $(this).attr("id").replace("btn_","");
        removeFromCollection(id);
    });
    
    $('body').on('click', '.remove_from_collection_btn', function () {
        var id = $(this).parent().attr('id').replace("-thumbnail","").replace("-sidebar","");
        removeFromCollection(id);
    });
    
    // Save/Empty collection
    $('body').on('click', '#save_collection_btn', function () {
        saveCollection($(this));
    });
    
    $('body').on('click', '#empty_collection_btn', function (e) {
      emptyCollecton();
    });
	

    $('body').on('click', '.close_sidebar_btn', function (e) {
        e.preventDefault();
        closeSidebar();
    });
    
    $('body').on('click', '.open_sidebar_btn', function (e) {
        e.preventDefault();
        toggleSidebar();
    });
    
    // Log out routine
    $(".logout-btn").click(function(e) {
        window.location.href = "/interaction-museum/Logout";
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
    
    $("#publish_exhibit_btn").click(function() {
        var button = $(this);
        
        var title = $('#editor-title').val();
        
        // Only proceed if not empty
        var contents = $('#editor-content').clone().text().replace(/ /g,'').replace(/(\r\n|\n|\r)/gm,'');
        if (title.length > 0 && contents != "+") {            
            //$('#editor-content').children('.medium-insert-buttons').remove();
            
            $('#editor-content').children('.medium-insert-buttons').empty().remove();
            var content = $('#editor-content').html();
            console.log(content);
            // Send to php in an array
            var exhibit = {
                exhibit_title : title,
                exhibit_content: content
            };  

            // TODO use session storage
            // TODO rewrite so that this is a function for both collection/exhibit creator
            $.ajax({
                url: 'exhibit-creator',
                data: exhibit,
                success : function(response) {
                    console.log(response);
                    if (response.indexOf("Created exhibit:") > -1) {
                        // TODO Empty title and content of editor here
                        $(exhibit_uid + "-writings").contents().filter(function() {
                            return (this.nodeType !== 3) ;
                        }).wrap( "<b></b>");
                        
                        var exhibit_uid = response.replace("Created exhibit:", "");
                        window.location.href = "/interaction-museum/all-exhibits/" + exhibit_uid;
                    } 
                    // Show tooltip if something went wrong
                    else {
                        showTooltip("#publish_exhibit_btn", response);
                    } 
                }
            });
        } else {
            showTooltip("#publish_exhibit_btn", "Please fill in a title and text");
        }
    });

    $('.sidebar-brand').bind('input', function(){
        sessionStorage.title = $(this).val();
    });
    
    // If a collection was in the making
    // TODO line below gives error in console on technique page.
    if(!isEmpty(JSON.parse(sessionStorage['techniques']))){
        techniques = JSON.parse(sessionStorage['techniques']);      
        for (key in techniques){
            appendTechnique(key, techniques[key].image, techniques[key].title);
            toggleButton($("#"+key+"-btn"), "remove");
        }
        // TODO change this with the help of boolean sidebarOpen.
        toggleSidebar();

    } 
    
    // Changed this line since sessionStorage.title was in some cases null.
    if(!isEmpty(sessionStorage.title) && !(!sessionStorage.title.trim())){
        $(".sidebar-brand").val(sessionStorage.title);
    }

});

function emptyCollecton(){
  for ( key in techniques){
        removeFromCollection(key);
    }
    sessionStorage.title = "";
    $(".sidebar-brand").val(sessionStorage.title);
}

// Add technique to sidebar from thumbnail/technique page.
function addToCollection(element) {
    // Get information of clicked thumbnail.
    if (addedViaThumbnail === true) {
        var thumbnail = element.parent();
        var identifier = thumbnail.attr("id").replace("-thumbnail","");
        var thumbnail_image = thumbnail.find("#" + identifier + "-image").attr("src");
        var thumbnail_title = thumbnail.find("#" + identifier + "-title").html();
    } else if (addedViaThumbnail === false) {
        var identifier = element.attr("id").replace("btn_","");
        var thumbnail_image = $("#header_image_" + identifier).attr("src");
        var thumbnail_title = $("#title_" + identifier).html();
    } 
    
    techniques[identifier] = {
        id: identifier,
        image: thumbnail_image,
        title: thumbnail_title
    }
    sessionStorage['techniques'] = JSON.stringify(techniques);
    
    // Add it to the HTML
    appendTechnique(identifier, thumbnail_image, thumbnail_title);
    // Toggle thumbnail button
    toggleButton(element, "remove");     
};

// Remove technique from session storage and sidebar
function removeFromCollection(id) {
    delete techniques[id];
    sessionStorage['techniques'] = JSON.stringify(techniques);
    
    var removeButtonId = "#" + id + "-btn";
    if (addedViaThumbnail === false) {
        removeButtonId = "#btn_" + id;  
    }
    toggleButton($(removeButtonId), "add");
    
    // Remove from sidebar
    $("#" + id + "-sidebar").remove();
}

// Toggle button to be set to the addOrRemove value.
function toggleButton(element, addOrRemove) {
    var addButtonClass = "add_to_collection_btn";
    var removeButtonClass = "remove_from_collection_btn";
    if (addedViaThumbnail === false) {
        addButtonClass = addButtonClass + "_technique";
        removeButtonClass = removeButtonClass + "_technique";
    }
    
    if(addOrRemove === "remove") {
        element.removeClass(addButtonClass); 
        element.addClass(removeButtonClass); 
        element.addClass("displayInline");
    } else if (addOrRemove === "add") {
        element.removeClass(removeButtonClass); 
        element.addClass(addButtonClass); 
    }

    element.find("i").toggleClass("glyphicon-minus");
    element.toggleClass("btn-danger"); 
}

function closeSidebar() {
    $("#wrapper").addClass("toggled");
    $("#save_collection_btn").toggle();
    $("#empty_collection_btn").toggle();
    $(".close_sidebar_btn").toggle();
    $(".open_sidebar_btn").toggle();
    windowSizeCheck(300); 
}

function toggleSidebar() {
    if($("#wrapper").hasClass("toggled")) {
        $("#wrapper").toggleClass("toggled");
        $("#save_collection_btn").toggle();
        $("#empty_collection_btn").toggle();
        $(".close_sidebar_btn").toggle();
        $(".open_sidebar_btn").toggle();
        windowSizeCheck(300); 
        sidebarOpen = true;
    }
    sidebarOpen = false;
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
    
    //TODO gives error on trim() when no title
    if (isEmpty(techniques)){
        showTooltip("#save_collection_btn", "There are no techniques in this collection!");
    } else if(!sessionStorage.title.trim()) {
        $(".sidebar-brand").focus();
        showTooltip("#save_collection_btn", "Your collection doesn't have a title");
    }
    else {
        $.ajax({
            url: 'collection-creator',
            data: collection,
            success : function(response) {
                if (response.indexOf("Created collection:") > -1) {
                    //remove all techniques from collection and reset session Storage
                    for (key in techniques){
                        removeFromCollection(key);
                    }
                    sessionStorage.title = "";
                    
                    var collection_uid = response.replace("Created collection:", "");
                    window.location.href = "/interaction-museum/all-collections/" + collection_uid;
                } 
                // If not logged in, log in.
                else if(response === "Login to save collections") {
                     window.location.href = "/interaction-museum/login";
                } else {
                    showTooltip("#save_collection_btn", response);
                } 
            }
        });
        
    } 
}
 
function appendTechnique(id, image, title){
    $("#sidebar").append(
        "<li class='col-xs-12'>" +
            "<div id='" + id + "-sidebar' class='thumbnail'>" +    
                "<button class='btn btn-circle btn-danger remove_from_collection_btn' title='Remove from collection' type='submit'>" +
                    "<i class='glyphicon glyphicon-minus'></i>" +
                "</button>" + 
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
    for (var key in obj) {
        if (hasOwnProperty.call(obj, key)) return false;
    }

    return true;
}

// Show tooltip on button button, with title title.
function showTooltip(button, title) {
    $(button).tooltip({title: title});
    $(button).tooltip('show');

     setTimeout(function(){
        $(button).tooltip('destroy');
    }, 4000);
}
