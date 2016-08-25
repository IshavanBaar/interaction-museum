<div class="container-fluid">
	<?php $styles = page('all-styles')->children()->visible() ?>
	<div class="row tags">
	    <?php $counter = 0;
	    foreach($styles as $style): 
	        if ($counter < $limit) : ?>

	            <div class="col-md-4 col-sm-6">
	                <div class="col-xs-12">
	                <a href="<?php echo url($style) ?>" >
	                    <div class="style">
	                        
	                            <h3><?php echo $style->title() ?></h3>

	                    </div>
	                  </a>
	                </div>
	            </div>
	             
	        <?php endif; ?> 
	    <?php $counter += 1; 
	    endforeach ?>
	</div>  
</div