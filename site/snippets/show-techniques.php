<div class="container-fluid">
    <!-- RECENTLY ADDED TECHNIQUES -->
    <?php $all_techniques = page('all-techniques')->children()->visible()->sortBy('date', 'asc');?>
    <?php snippet('thumbnails', array('entries' => $all_techniques, 'limit' => $limit))?>
</div>
