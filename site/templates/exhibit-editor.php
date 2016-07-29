<?php snippet('header-exhibit-creator') ?>

<!-- Menu -->
<?php snippet('menu')?>

<body>
    <div class="main container" role="main">
        <div id="editor" class="container">
            <input type="text" id="editor-title" class="col-md-6 col-md-offset-2" placeholder="Title">
            <a id="publish_exhibit_btn" class="btn btn-primary col-md-2">Publish</a>
            <div id="editor-content" class="editable">
                
            </div>
        </div>

        <script>
            //rangy.init();
            
            var AddTechniqueButton = MediumEditor.Extension.extend({
                name: 'addtechnique',
                
                init: function () {
                    this.button = this.document.createElement('button');
                    this.button.classList.add('medium-editor-action');
                    this.button.innerHTML = '<i class="fa fa-search"></i> Add Technique';
                    this.button.title = 'Add technique';
                    this.button.id = 'search-technique-btn';
                    this.button.addEventListener('click', function() {
                        //var selection = this.classApplier.toggleSelection();
                        console.log("button clicked");
                        console.log(rangy.saveSelection());
                        console.log(this.classApplier.getSelection());
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

            $(function () {
                $('.editable').mediumInsert({
                    editor: editor
                });
            });
        </script>
    </div>
</body>

<?php snippet('footer') ?> 