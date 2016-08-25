<div class="text-center" >
    <?php 
    $collections = page('all-collections')->children()->visible();
    $counter = 0;

    foreach($collections as $collection) {
        if ($counter < $limit) {
            // Filter on creator of the collection (account page) 
            if (($user !== 'all') && ($technique == 'none')){ 
                if (strcmp($collection->creator(), $user) == 0) {     
                    snippet('grid-item-collection', array('collection' => $collection));
                } 
            }
            // Don't filter
            else if($user == 'all') {
                
                snippet('grid-item-collection', array('collection' => $collection));
            } else {
                //if a technique id is sent
                foreach($collection->techniques()->toStructure() as $collectionItem) {
                   
                        if (strcmp($collectionItem, $technique) == 0) {     
                            snippet('grid-item-collection', array('collection' => $collection));
                        }
                    }
            }
        }
        $counter += 1; 
    } ?>
</div>  