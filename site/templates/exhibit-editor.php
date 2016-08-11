<?php snippet('header-exhibit-creator') ?>
    
<div class="header">
    <!-- Menu -->
    <?php snippet('menu')?>
</div>

<div class="main container" role="main">
    <?php snippet('pop-up') ?>
    <div class="container">
        <div class="row">
            <input type="text" id="editor-title" class="col-md-8 col-md-offset-2" placeholder="Title">
            <div id="editor-content" class="editable col-md-8 col-md-offset-2"></div>
        </div>
        <div class="row">
            <a id="add_interaction_btn" class="btn btn-primary col-md-2 col-md-offset-2">Save</a>
            <a id="publish_exhibit_btn" class="btn btn-primary col-md-2 col-md-offset-4">Publish</a>
        </div>
    </div>
    <script>
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
                    showPopUp(selectedText);
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
            $('#search-input-exhibit').val(text); 
            $('#search-form-exhibit').submit();
            $('#pop-up').show();
        }
        
        $(function () {
            $('.editable').mediumInsert({
                editor: editor
            });
        });
    </script>
</div>


<?php snippet('footer') ?> 