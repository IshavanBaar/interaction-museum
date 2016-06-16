<div class="container-fluid">
    <!-- RECENTLY ADDED TECHNIQUES -->
    <?php $all_techniques = page('all-techniques')->children()->visible()->sortBy('modified', 'desc');?>
    <?php snippet('thumbnails', array('entries' => $all_techniques, 'limit' => 100))?>
</div>
