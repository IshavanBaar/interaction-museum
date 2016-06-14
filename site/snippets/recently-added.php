<div class="container-fluid">
    <!-- RECENTLY ADDED TECHNIQUES -->
    <?php $recently_added = page('recently-added')->children()->visible()->sortBy('modified', 'desc');?>
    <?php snippet('thumbnails', array('entries' => $recently_added, 'limit' => 100))?>
</div>
