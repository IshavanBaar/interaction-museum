<h2><?php echo page('recently-added')->title()->html() ?></h2>

<ul class="teaser cf">
  <?php foreach(page('recently-added')->children()->visible()->limit(100) as $technique): ?>
  <li>
	<!-- HEADER IMAGE -->
	<?php 
		$header_image = (string)$technique->header_image();
		$image = $technique->image($header_image);
		$alternative = $technique->images()->sortBy('sort', 'asc')->first(); 
		//TODO fix if no image is there
	?>
	
	<!-- THUMBNAIL LINK -->
    <a href="<?php echo $technique->url() ?>">
      <img src="<?php echo file_exists($image) ? $image->url() : $alternative->url(); ?>" alt="">
	  <h5><a href="<?php echo $technique->url() ?>"><?php echo $technique->title()->html() ?></a></h5>
    </a>
  </li>
  <?php endforeach ?>
</ul>
