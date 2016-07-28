<div class="container-fluid">
    <?php $collections = page('all-collections')->children()->visible();
    $counter = 0;
    foreach($collections as $collection):
        if ($counter < $limit) : ?>
            <div class="col-sm-6">
                <div class="col-xs-12">
                <a href="<?php echo url($collection) ?>" >
                    <div class="collection">
                        
                            <h3><?php echo $collection->title() ?></h3>
                            <p><?php echo $collection->techniques()->toStructure()->count()?> techniques</p>
                        
                    </div>
                </a>
                </div>
            </div>
        <?php endif; ?>
    <?php $counter += 1; 
    endforeach ?>
</div>  