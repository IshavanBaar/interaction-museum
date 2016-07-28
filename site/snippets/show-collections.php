<div class="row tags">
    <?php $collections = page('all-collections')->children()->visible();
    $counter = 0;
    foreach($collections as $collection):
        if ($counter < $limit) : ?>
            <!-- TODO Diana: style -->
            <a href="<?php echo url($collection) ?>" class="style-thumbnail label-info">
                <h3><?php echo $collection->title() ?></h3>
                <p><?php echo $collection->techniques()->toStructure()->count()?> techniques</p>
            </a>
        <?php endif; ?>
    <?php $counter += 1; 
    endforeach ?>
</div>  