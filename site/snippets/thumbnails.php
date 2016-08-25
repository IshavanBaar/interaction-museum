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
                <!-- Button to add to collection -->
                <button id="<?php echo $identifier?>-btn" 
                        class="btn btn-default btn-circle add_to_collection_btn" title="Add to collection" type="submit">
                    <i class="glyphicon glyphicon-plus"></i>
                </button>

                <a id="<?php echo $identifier ?>-link" href="<?php echo $identifier ?>" >
                    <!-- TODO fix if there is no gif file in the folder -->
                    <img id="<?php echo $identifier ?>-image" src="<?php echo $image->url() ?>" alt="" class="thumbnail-image">
                    <p id="<?php echo $identifier ?>-title" class="caption"><?php echo $technique->title()->html() ?></p>
                </a>
            </div>
        </div>
    <?php endif; ?>
<?php $counter += 1;
endforeach; ?>