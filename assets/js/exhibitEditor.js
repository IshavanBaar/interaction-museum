var selectedElement = "";

var AddTechniqueButton = MediumEditor.Extension.extend({
    name: 'addtechnique',

    init: function () {
        this.button = this.document.createElement('button');
        this.button.classList.add('medium-editor-action');
        this.button.innerHTML = '<i class="fa fa-plus"></i> Insert Technique';
        this.button.title = 'Add technique';
        this.button.id = 'search-technique-btn';
        this.button.addEventListener('click', function() {
            var selectedText = getSelectionText();
            selectedElement = window.getSelection().anchorNode.parentNode;
            searchTechniques(selectedText);
        });
    },

    getButton: function () {
        return this.button;
    }
});

var editor = new MediumEditor('.editable', {
    toolbar: {
        buttons: ['bold', 'italic', 'underline', 'anchor', 'h2', 'h3', 'quote', 'addtechnique']
    },
    extensions: {
        'addtechnique': new AddTechniqueButton()
    }
});

 $("#startSearch").click(function(){
    var query = $("#search-input-exhibit").val();
    searchTechniques(query);
});

 // Add to exhibit
$('body').on('click', '.add-to-exhibit-btn', function (e) {
    e.preventDefault();
    addToExhibit($(this));
    $('#pop-up').hide();
});

function searchTechniques(selectedText) {
    $("#search-results").empty();
    $.ajax({
        url: 'exhibit-search',
        data: selectedText,
        success : function(response) {
            $("#search-results").append(response);
            showPopUp(selectedText);
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
    var techniqueId = thumbnail.attr("id").replace("-thumbnail","");
    var techniqueImage = thumbnail.find("#" + techniqueId + "-image").attr("src");
    var techniqueTitle = thumbnail.find("#" + techniqueId + "-title").html();       
    
    selectedElement.insertAdjacentHTML( 'afterEnd', 
        "<div class='medium-insert-images medium-insert-active medium-insert-images-wide'>" +
            "<figure contenteditable='false'>" +
                "<img src='" + techniqueImage + "'>" +
                "<p class='thumbnail-caption'>" + techniqueTitle + "</p>" + 
                "<figcaption contenteditable='true' class='medium-insert-caption-placeholder' data-placeholder='Type caption for image (optional)'></figcaption>" +
            "</figure>" +
        "</div>" 
    ); 
}

$(function () {
    $('.editable').mediumInsert({
        editor: editor
    });
});        

function publishExhibit() {
    var title = $('#editor-title').val(); 
    var contents = $('#editor-content').clone().text().replace(/ /g,'').replace(/(\r\n|\n|\r)/gm,'');
    
    // Only proceed if not empty
    if (title.length > 0 && contents != "+") {            
        $('#editor-content').children('.medium-insert-buttons').empty().remove();
        var content = $('#editor-content').html();
        
        // Send to php in an array
        var exhibit = {
            exhibit_title : title,
            exhibit_content: content
        };  

        // TODO use session storage
        // TODO rewrite so that this is a function for both collection/exhibit creator
        $.ajax({
            url: 'exhibit-creator',
            type: 'POST',
            data: exhibit,
            success : function(response) {
                if (response.indexOf("Created exhibit:") > -1) {
                    var exhibit_uid = response.replace("Created exhibit:", "");
                    
                    // TODO should URL include /interaction-museum/ before?
                    window.location.href = "all-exhibits/" + exhibit_uid;
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
