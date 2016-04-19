<div class="container-fluid">

	<!-- SEARCH BAR -->
	<div id="search-bar" class="col-lg-6 col-lg-offset-3 search-results">
		<form class="search" action="">
			<div class="input-group">
				<input action="" type="search" class="form-control" placeholder="Search..." name="q" value="" required>
				<span class="input-group-btn">
				  <button class="btn btn-default btn-primary" type="submit">
				   <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
				  </button>
				</span>
			</div>
		</form>   
	</div>

	<!-- TITLE OF COLLECTION PAGE -->
	<!-- TODO Styling + What happens if there are no results? -->
	<?php if(count($results->toArray()) > 0): ?>
		<h2 class="col-xs-12"><?php echo count($results->toArray())?> Results For "<?php echo esc($query)?>"</h2>
	<?php endif ?>
	
	<!-- SEARCH RESULTS -->
	<div class="search-results teaser">
		<?php foreach($results as $result): 
			$image = $result->image((string) $result->header_image());
			$alternative = $result->images()->sortBy('sort', 'asc')->first();?> 

			<!-- THUMBNAIL LINK -->
			<div class="col-md-4 col-sm-6">
				<div class="thumbnail">
					<a href="<?php echo $result->url() ?>" >
						<img src="<?php echo file_exists($image) ? $image->url() : $alternative->url(); ?>" alt="">
						<p class="caption"><?php echo $result->title()->html() ?></p>
					</a>
				</div>
			</div>
		<?php endforeach ?>
	</div>
</div>