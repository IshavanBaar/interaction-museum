<?php snippet('header-exhibit-creator') ?>
    <div class="header">
                <!-- Menu -->
            <?php snippet('menu')?>

            <?php snippet('search-bar-exhibit') ?>
                    <!-- Search results -->
            <?php snippet('search') ?>
    </div>


    <div class="main container" role="main">

        <div id="editor" class="container">
            <input type="text" id="editor-title" class="col-md-6 col-md-offset-2" placeholder="Title">
            <a id="publish_exhibit_btn" class="btn btn-primary col-md-2">Publish</a>
            <div id="editor-content" class="editable">
                
            </div>
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