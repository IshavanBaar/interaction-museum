var addedViaThumbnail = true;
var techniques = {}; 

$(document).ready(function(){
    /* ------- Add to Collection Buttons ------- */
    $('body').on('mouseover', '.thumbnail', function () {
        var identifier = $(this).attr('id').replace("-thumbnail","");
        $(this).find("#" + identifier + "-btn").css("display", "inline-block");
    });
    
    $('body').on('mouseout', '.thumbnail', function () {
        var identifier = $(this).attr('id').replace("-thumbnail","");
        $(this).find("#" + identifier + "-btn").css("display", "none");
    });
    
    // Add to/Remove from sidebar from thumbnail
    $('body').on('click', '.add_to_collection_btn', function (e) {
        e.preventDefault();
        toggleSidebar();
       if($(this).attr("id").indexOf("-technique")>-1){
           addedViaThumbnail = false;
           console.log('im in a technique');
        }else{
            addedViaThumbnail = true;
            console.log('im not in a technique');
        }
        addToCollection($(this));
    });

    $('body').on('click', '.remove_from_collection_btn', function () {
        var id;
        if($(this).hasClass("technique_btn")){
            id = $(this).attr("id").replace("-btn-technique","");
            addedViaThumbnail = false;
            console.log('im in a technique');
        }else{
            id = $(this).parent().attr('id').replace("-thumbnail","").replace("-sidebar","");
            addedViaThumbnail = true;
            console.log('im not in a technique');
        }
        removeFromCollection(id);
    });

    /* ------- New/Save/Empty Collections ------- */
    $('body').on('click', '#new_collection', function (e) {
        // if it's on the collections page, go to techniques 
        e.preventDefault();
        emptyCollecton();
        toggleSidebar();
    });
    
    $('body').on('click', '#save_collection_btn', function () {
        saveCollection($(this));
    });
    
    $('body').on('click', '#empty_collection_btn', function (e) {
      emptyCollecton();
    });
    
    /* ------- Sidebar ------- */
	
    $('body').on('click', '.close_sidebar_btn', function (e) {
        e.preventDefault();
        closeSidebar();
    });
    
    $('body').on('click', '.open_sidebar_btn', function (e) {
        e.preventDefault();
        toggleSidebar();
    });

    $(".logout-btn").click(function(e) {
        // TODO should URL include /interaction-museum/ before?
        window.location.href = "Logout";
    });

    /* ------- Exhibit Editor ------- */
    
    $("#add_interaction_btn").click(function() {
        $("#pop-up").show();
    });

    $("#close_popup").click(function() {
        $("#pop-up").hide();
    });
    
    $("#publish_exhibit_btn").click(function() {
        publishExhibit();    
    });
    
    /* ------- Session Storage for Collections ------- */
    
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
            toggleButton($("#"+key+"-btn-technique"), "remove");
        }
        toggleSidebar();
    } 
    
    // Changed this line since sessionStorage.title was in some cases null.
    if(!isEmpty(sessionStorage.title) && !(!sessionStorage.title.trim())){
        $(".sidebar-brand").val(sessionStorage.title);
    }
});
