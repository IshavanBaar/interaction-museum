var AddTechniqueButton = MediumEditor.Extension.extend({
    name: 'addtechnique',

    init: function () {
        this.button = this.document.createElement('button');
        this.button.classList.add('medium-editor-action');
        this.button.innerHTML = '<i class="fa fa-search"></i> Add Technique';
        this.button.title = 'Add technique';
        this.button.id = 'search-technique-btn';
        this.button.addEventListener('click', function() {
            var selectedText = getSelectionText();
            console.log("button clicked");
            console.log(selectedText);
            searchTechniques(selectedText);
            showPopUp(selectedText);
        });
    },

    getButton: function () {
        return this.button;
    }
});

// $("#search-input-exhibit").change(function(){
//     var query = $("#search-input-exhibit").val();
//     searchTechniques(query);
// });
 $("#startSearch").click(function(){
    var query = $("#search-input-exhibit").val();
    searchTechniques(query);
});

 // Add to exhibit
$('body').on('click', '.add-to-exhibit-btn', function (e) {
    e.preventDefault();
    console.log($(this));
    addToExhibit($(this));
    $('#pop-up').hide();
});


var editor = new MediumEditor('.editable', {
    toolbar: {
        buttons: ['bold', 'italic', 'underline', 'anchor', 'h2', 'h3', 'quote', 'addtechnique']
    },
    extensions: {
        'addtechnique': new AddTechniqueButton()
    }
});

function searchTechniques(text) {
    $.ajax({
        url: 'exhibit-search',
        data: text,
        success : function(response) {
            $("#search-results").empty();
            $("#search-results").append(response);
        } 
    });
}

function getSelectionText() {
    var text = "";
    if (window.getSelection) {
        text = window.getSelection().toString();
    } else if (document.selection && document.selection.type != "Control") {
        text = document.selection.createRange().text;
    }
    return text;
}

function showPopUp(text) {
    // $('#search-input-exhibit').val(text); 
    // $('#search-form-exhibit').submit();
    $('#pop-up').show();
}

function addToExhibit(element){
    // Get information of clicked thumbnail.

    var thumbnail = element.parent().parent();
    var identifier = thumbnail.attr("id").replace("-thumbnail","");
    var thumbnail_image = thumbnail.find("#" + identifier + "-image").attr("src");
    var thumbnail_title = thumbnail.find("#" + identifier + "-title").html();       

    // Add it to the HTML
    appendTechniqueExhibit(identifier, thumbnail_image, thumbnail_title);

}
function appendTechniqueExhibit(id, image, title){
    $("#editor-content").append(
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

$(function () {
    $('.editable').mediumInsert({
        editor: editor
    });
});        

function publishExhibit() {
   var title = $('#editor-title').val();


    // Only proceed if not empty
    var contents = $('#editor-content').clone().text().replace(/ /g,'').replace(/(\r\n|\n|\r)/gm,'');
    if (title.length > 0 && contents != "+") {            
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
                //console.log(response);
                if (response.indexOf("Created exhibit:") > -1) {
                    // TODO Empty title and content of editor here

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
}