<div class="container-fluid">
    <!-- TITLE OF COLLECTION PAGE -->
    <!-- <h2 class="col-xs-12"><?php echo page('recently-added')->title()->html() ?></h2> -->

    <!-- RECENTLY ADDED TECHNIQUES -->
    <!-- TODO sort by created/modified date -->
    <?php $recently_added = page('recently-added')->children()->visible()->sortBy('modified', 'desc')->limit(100);?>
    <?php snippet('thumbnails', array('entries' => $recently_added))?>
</div>
