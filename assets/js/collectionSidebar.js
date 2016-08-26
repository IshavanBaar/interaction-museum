function windowSizeCheck(sidebarSize){
    if(($("#page-content-wrapper").width()!=null) && (($("#page-content-wrapper").outerWidth() - sidebarSize) <= 891)){
        //to do
    }
}

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
    console.log('im in addToCollection');
    if (addedViaThumbnail === true) {
        console.log('im in addToCollection via thumbnail');
        var thumbnail = element.parent();
        var identifier = thumbnail.attr("id").replace("-thumbnail","");
        var thumbnail_image = thumbnail.find("#" + identifier + "-image").attr("src");
        var thumbnail_title = thumbnail.find("#" + identifier + "-title").html();
    } else if (addedViaThumbnail === false) {
        console.log('im in addToCollection via technique');
        var identifier = element.attr("id").replace("-btn-technique","");
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
    console.log(sessionStorage);
};

// Removes technique from session storage and sidebar
function removeFromCollection(id) {
    delete techniques[id];
    sessionStorage['techniques'] = JSON.stringify(techniques);
    
    var removeButtonId = "#" + id + "-btn";
    if (addedViaThumbnail === false) {
        removeButtonId = "#" + id + "-btn-technique";  
    }
    toggleButton($(removeButtonId), "add");
    
    // Remove from sidebar
    // TODO Diana nice toggle visibility animation doesn't work
    $("#" + id + "-sidebar").remove().toggle("fast");
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
        // Check if request URL needs to be changed, because of current open page.
        var requestURL = "collection-creator";
        if (currentlyOnCollection() === true) { requestURL = "../" + requestURL; }
        
        // Makes request to create collection
        $.ajax({
            url: requestURL,
            type: 'POST',
            data: collection,
            success : function(response) {
                if (response.indexOf("Created collection:") > -1) {
                    // Remove all techniques from collection and reset session Storage
                    for (key in techniques){
                        removeFromCollection(key);
                    }
                    sessionStorage.title = "";
                    
                    // Go to the new collection page
                    var collection_uid = response.replace("Created collection:", "");
                    var windowLocation = "all-collections/" + collection_uid;
                    if (currentlyOnCollection() === true) { windowLocation = "../" + windowLocation; }
                    window.location.href = windowLocation;
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

// Returns if the user is currently on a collection page
function currentlyOnCollection() {
    var currentURL = window.location.href;

    // URL for request needs to be different if you are on a collection page 
    var folder = "all-collections/";
    var indexInURL = currentURL.lastIndexOf(folder);
    var everythingAfter = currentURL.substring(indexInURL + folder.length, currentURL.length);
    
    // For example: all-collections/menus
    if (indexInURL > -1 && everythingAfter.length > 0) {
        return true;
    }
    return false;
}

 
function appendTechnique(id, image, title){
    var techniqueInSidebar =
        "<li id='" + id + "-sidebar' class='col-xs-12' style='display:none'>" +
            "<div class='thumbnail'>" +    
                "<button class='btn btn-danger remove_from_collection_btn' title='Remove from collection' type='submit'>" +
                    "<i class='glyphicon glyphicon-remove'></i>" +
                "</button>" + 
                "<a href='" + id + "'>" +
                    "<img src='" + image + "' alt='' >" +
                    "<p class='caption'>" + title + "</p>" +
                "</a>" +
            "</div>" +
        "</li>";
    $(techniqueInSidebar).appendTo("#sidebar").toggle("fast");
}

// Toggles +/- button to be set to the addOrRemove value.
function toggleButton(element, addOrRemove) {
    var addButtonClass = "add_to_collection_btn";
    var removeButtonClass = "remove_from_collection_btn";
    if (addedViaThumbnail === false) {
        // addButtonClass = addButtonClass + "_technique";
        // removeButtonClass = removeButtonClass + "_technique";
        console.log(addButtonClass + ' '+ removeButtonClass)
    }
    
    if(addOrRemove === "remove") {
        console.log('im in remove');
        element.removeClass(addButtonClass); 
        element.addClass(removeButtonClass); 
        // element.addClass("displayInline");
    } else if (addOrRemove === "add") {
        console.log('im in add');
        element.removeClass(removeButtonClass); 
        element.addClass(addButtonClass); 
    }

    element.find("i").toggleClass("glyphicon-check");
    element.toggleClass("btn-success"); 
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
