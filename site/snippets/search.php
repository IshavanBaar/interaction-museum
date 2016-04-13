<!-- Search bar -->
<div id="search-bar" class="search-results">	
	<form class="search" action="">
	  <input type="search" placeholder="Search..." name="q" value="<?php echo esc($query) ?>" required>
	  <button type="submit">
		<img src="assets/images/search_white.png"/>
	  </button>
	</form>   
</div>

<!-- Search results -->
<ul class="teaser search-results cf">
  <?php foreach($results as $result): ?>
  <li>
	<!-- HEADER IMAGE -->
	<?php 
		$image = $result->image((string) $result->header_image());
		$alternative = $result->images()->sortBy('sort', 'asc')->first(); 
		//TODO fix if no image is there
	?>
	
	<!-- THUMBNAIL LINK -->
    <a href="<?php echo $result->url() ?>">
      <img src="<?php echo file_exists($image) ? $image->url() : $alternative->url(); ?>" alt="">
	  <h5><a href="<?php echo $result->url() ?>"><?php echo $result->title()->html() ?></a></h5>
    </a>
  </li>
  <?php endforeach ?>
</ul>