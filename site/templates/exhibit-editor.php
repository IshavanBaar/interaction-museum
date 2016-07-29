<?php snippet('header-exhibit-creator') ?>
    <div class="header">
                <!-- Menu -->
            <?php snippet('menu')?>

    </div>


    <div class="main container" role="main">
        <?php snippet('pop-up') ?>
        <div id="editor" class="container">
            <input type="text" id="editor-title" class="col-md-6 col-md-offset-2" placeholder="Title">
            
            <div id="editor-content" class="editable col-xs-12"></div>
            <a id="publish_exhibit_btn" class="btn btn-primary col-md-2">Publish</a>
            <a id="add_interaction_btn" class="btn btn-primary col-md-2">Add Interaction</a>
        </div>
         
         
        <script>
            var editor = new MediumEditor('.editable');

            $(function () {
                $('.editable').mediumInsert({
                    editor: editor
                });
            });
        </script>
    </div>


<?php snippet('footer') ?> 