<div class="text-center">
    <?php 
    $exhibits = page('all-exhibits')->children()->visible();
    $counter = 0;
    // TODO get full name if available
    
    foreach($exhibits as $exhibit) {
        if ($counter < $limit) {
            // Filter on creator of the collection (account page) 
            if ($user !== 'all') { 
                if (strcmp($exhibit->creator(), $user) == 0) {     
                    snippet('grid-item-exhibit', array('exhibit' => $exhibit));
                } 
            }
            // Don't filter
            else {
                snippet('grid-item-exhibit', array('exhibit' => $exhibit));
            }
        }
        $counter += 1; 
    } ?>
</div>  