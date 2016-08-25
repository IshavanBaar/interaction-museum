var addedViaThumbnail = true;
var techniques = {}; 

$(document).ready(function(){
    
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

    $('body').on('hover', '#user', function (e) {
        $(".submenu").toggle();
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
    
    $(".logout-btn").click(function(e) {
        window.location.href = "/Logout";
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
    
    $("#add_interaction_btn").click(function() {
        $("#pop-up").show();
    });

    $("#close_popup").click(function() {
        $("#pop-up").hide();
    });
    
    $("#publish_exhibit_btn").click(function() {
        publishExhibit();    
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
        toggleSidebar();
    } 
    
    // Changed this line since sessionStorage.title was in some cases null.
    if(!isEmpty(sessionStorage.title) && !(!sessionStorage.title.trim())){
        $(".sidebar-brand").val(sessionStorage.title);
    }
});
