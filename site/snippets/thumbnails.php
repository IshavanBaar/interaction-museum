<!-- Puts entries in thumbnails-->
<?php foreach($entries as $technique): 
	if($technique->header_image()->isNotEmpty()):
		$image = $technique->image((string)$technique->header_image());
	else:
		$image = $technique->images()->sortBy('sort', 'asc')->first();
	endif;
?>
	<!-- THUMBNAIL LINK -->
	<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
		<div class="thumbnail">
            <!-- Button to add to collection -->
            <button class="btn btn-default add_to_collection_btn" type="submit">
                <span class="glyphicon glyphicon-plus"></span>
            </button>
            
            <a id="thumbnail-technique" href="<?php echo $technique->url() ?>">
                <!-- TODO fix if there is no gif file in the folder -->

				<img id="thumbnail-image" src="<?php echo $image->url() ?>" alt=""
				onmouseover="play(this);" onmouseout="stop(this);">


				<p id="thumbnail-title" class="caption"><?php echo $technique->title()->html() ?></p>
			</a>
		</div>
	</div>
<?php endforeach ?>