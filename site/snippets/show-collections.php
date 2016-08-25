<div class="container-fluid">
    <?php 
    $collections = page('all-collections')->children()->visible();
    $counter = 0;

    foreach($collections as $collection) {
        if ($counter < $limit) {
            // Filter on creator of the collection (account page) 
            if ($user !== 'all') { 
                if (strcmp($collection->creator(), $user) == 0) {     
                    snippet('grid-item-collection', array('collection' => $collection));
                } 
            }
            // Don't filter
            else {
                snippet('grid-item-collection', array('collection' => $collection));
            }
        }
        $counter += 1; 
    } ?>
</div>  