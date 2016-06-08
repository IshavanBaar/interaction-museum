<?php snippet('header') ?>
	<p>Related pages</p>
    <?php
        $options = array('startURI' => 'recently-added', 'searchItems' => 'gestures');
        $results = relatedpages($options);
    ?>
    
    <?php if($results->count() < 1): ?>
        <p>No related pages</p>
    <?php else: ?>
        <ul>    
            <?php foreach($results as $relpage): ?>
                <li><a href="<?php echo $relpage->url() ?>"><?php echo $relpage->title() ?></a></li>
            <?php endforeach ?>
        </ul>
    <?php endif; ?>
</div>

<?php snippet('footer') ?>