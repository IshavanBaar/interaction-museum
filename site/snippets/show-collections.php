<div class="text-center" >
    <?php $counter = 0;
    foreach($collections as $collection) {
        if ($counter < $limit) {
            snippet('grid-item-collection', array('collection' => $collection, 'width' => $width));
        }
        $counter += 1; 
    } ?>
</div>  