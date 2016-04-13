<?php snippet('header') ?>
	
	<div class="container" role="main">
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
		<?php if($image = $result->images()->sortBy('sort', 'asc')->first()):
		$image->dimensions()->fitWidth(400) ?>
		<a href="<?php echo $result->url() ?>">
		  <img src="<?php echo $image->url() ?>" alt="<?php echo $result->title()->html() ?>">
		  <h5><a href="<?php echo $result->url() ?>"><?php echo $result->title()->html() ?></a></h5>
		</a>
		<?php endif ?>
	  </li>
	  <?php endforeach ?>
	</ul>
	
	<!-- RECENTLY ADDED -->
    <?php snippet('recently-added') ?>

</div>

  <?php snippet('footer') ?>