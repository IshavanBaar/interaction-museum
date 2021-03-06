<!-- Only access to here if logged in -->
<?php if($user = $site->user()): ?>   

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
                <a id="add_interaction_btn" class="btn btn-primary col-md-2 col-md-offset-2 exhibit-button">Save</a>
                <a id="publish_exhibit_btn" class="btn btn-primary col-md-2 col-md-offset-4 exhibit-button">Publish</a>
            </div>
        </div>
        <script src="assets/js/exhibitEditor.js"></script>
    </div>

    <?php snippet('footer') ?> 
<?php else : 
    go('/'); 
?>
<?php endif; ?>