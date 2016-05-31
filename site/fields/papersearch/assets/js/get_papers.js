$(document).ready(function() {
	var input = $('#form-field-title');
	
	if (input.val().length > 3) {
		getPapers(input.val());
	}
	
	input.on('input', function() { 
		getPapers(input.val());
	});
	
	function getPapers(inputValue) {
		if (inputValue.length > 3) {
			$.ajax({
				type: "GET",
				url: "../../../../assets/js/get_papers.php",
				data:{ query: inputValue}, 
				success: function(data){
                    // Adding a structure field here
					/*$('.structure-entries').html(
                    '<div id="structure-entry-0wYI7k6eDppFJpjxGtmHFW8PBqHyG5p9" class="structure-entry ui-sortable-handle">' +
                        '<div class="structure-entry-content text">' +
                            'Enhancing Target Acquisition by Dynamic Resizing of the Cursor’s Activation Area<br>' +
                            'http://dl.acm.org/citation.cfm?doid=1054972.1055012<br> CHI 05 Proceedings<br> Tovi Grossman, Ravin Balakrishnan<br> 2005' +  
                        '</div>' +
                        '<nav class="structure-entry-options cf">' +
                            '<a href="http://localhost/interaction-museum/panel/pages/recently-added/new-technique/field/related_publications/structure/0wYI7k6eDppFJpjxGtmHFW8PBqHyG5p9/update" class="btn btn-with-icon structure-edit-button" data-modal="">' +
                                '<i class="icon icon-left fa fa-pencil"></i>Edit' +
                            '</a>' + 
                            '<a href="http://localhost/interaction-museum/panel/pages/recently-added/new-technique/field/related_publications/structure/0wYI7k6eDppFJpjxGtmHFW8PBqHyG5p9/delete" class="btn btn-with-icon structure-delete-button" data-modal="">' +
                                '<i class="icon icon-left fa fa-trash-o"></i>Delete' +
                            '</a>' +
                        '</nav>' +
                    '</div>');*/
                    
                    /*<div class="structure-empty ui-sortable-handle">
                    No entries yet. <a href="http://localhost/interaction-museum/panel/pages/recently-added/new-technique/field/related_publications/structure/add" class="structure-add-button" data-modal="">Add the first entry</a>
                    </div>*/

				}
			})
		}
	}
});

