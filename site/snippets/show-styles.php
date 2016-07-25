<?php $styles = page('all-styles')->children()->visible() ?>
<div class="row tags">
    <?php $counter = 0;
    foreach($styles as $style): 
        if ($counter < $limit) : ?>
            <!-- TODO Diana: style this -->
            <a href="<?php echo url($style) ?>" class="style-thumbnail label-info"><?php echo $style->title() ?></a>
        <?php endif; ?> 
    <?php $counter += 1; 
    endforeach ?>
</div>  