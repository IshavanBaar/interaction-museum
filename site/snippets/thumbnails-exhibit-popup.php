<!-- Puts entries in thumbnails-->
<?php 
$counter = 0;
foreach($entries as $technique): 
	$identifier = $technique->uid(); 
    if($technique->header_image()->isNotEmpty()) {
		$image = $technique->image((string)$technique->header_image());
    }
	else {
		$image = $technique->images()->sortBy('sort', 'asc')->first();
    }
    
    if ($counter < $limit) :
?>
        <!-- THUMBNAIL LINK -->
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="thumbnail" id="<?php echo $identifier?>-thumbnail">

                <div class="wrapper-overlay">
               <!-- overlay -->
                   <!-- <a href="#"  id="<?php echo $identifier?>-btn" class="overlay" title="Add to Exhibit"><span class="glyphicon glyphicon-plus"></span>  </a> -->
                   <!-- image -->
                    <img id="<?php echo $identifier ?>-image" src="<?php echo $image->url() ?>" alt="">
                    <div class="overlay btn add-to-exhibit-btn" id="<?php echo $identifier?>-btn">
                        <span class="glyphicon glyphicon-plus"></span>
                    </div>
                </div>
                <p id="<?php echo $identifier ?>-title" class="caption"><?php echo $technique->title()->html() ?></p>
            </div>
        </div>
    <?php endif; ?>
<?php $counter += 1;
endforeach; ?>