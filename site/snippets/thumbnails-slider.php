<!-- Puts entries in thumbnails-->
<?php 

foreach($entries as $technique): 
	if($technique->header_image()->isNotEmpty()):
		$image = $technique->image((string)$technique->header_image());
	else:
		$image = $technique->images()->sortBy('sort', 'asc')->first();
	endif;
?>
	<!-- THUMBNAIL LINK -->
	<li>		
        <div class="thumbnail">

            <a id="thumbnail-technique" href="<?php echo $technique->uid() ?>">
                <img id="thumbnail-image" src="<?php echo $image->url() ?>" alt="">
                <p id="thumbnail-title" class="caption"><?php echo $technique->title()->html() ?></p>
            </a>
        </div>
	</li>
<?php endforeach ?>