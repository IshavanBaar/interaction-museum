// Toggles sidebar
function toggleSidebar() {
    if($("#wrapper").hasClass("toggled")) {
        $("#wrapper").toggleClass("toggled");
        $("#save_collection_btn").toggle();
        $("#empty_collection_btn").toggle();
        $(".close_sidebar_btn").toggle();
        $(".open_sidebar_btn").toggle();
        windowSizeCheck(300);
    }
}

// Opens sidebar
function closeSidebar() {
    $("#wrapper").addClass("toggled");
    $("#save_collection_btn").toggle();
    $("#empty_collection_btn").toggle();
    $(".close_sidebar_btn").toggle();
    $(".open_sidebar_btn").toggle();
    windowSizeCheck(300); 
}

// Adds technique to sidebar from thumbnail/technique page.
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

// Removes technique from session storage and sidebar
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

// Empties collection
function emptyCollecton(){
  for ( key in techniques){
        removeFromCollection(key);
    }
    sessionStorage.title = "";
    $(".sidebar-brand").val(sessionStorage.title);
}

// Saves collection
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
                    window.location.href = "all-collections/" + collection_uid;
                } 
                // If not logged in, log in.
                else if(response === "Login to save collections") {
                     window.location.href = "login";
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

// Toggles +/- button to be set to the addOrRemove value.
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

// Shows tooltip on button button, with title title.
function showTooltip(button, title) {
    $(button).tooltip({title: title});
    $(button).tooltip('show');

     setTimeout(function(){
        $(button).tooltip('destroy');
    }, 4000);
}

// Checks if object is empty
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
