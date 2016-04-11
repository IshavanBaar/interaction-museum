<?php snippet('header') ?>
	
  <main class="main" role="main">
	<!-- Search bar -->
	<div id="search-bar" class="center">	
		<form class="search" action="">
		  <input type="search" placeholder="Search..." name="q" value="<?php echo esc($query) ?>" required>
		  <button type="submit">
			<img src="assets/images/search_white.png"/>
		  </button>
		</form>   
	</div>
	
	<!-- Search results -->
	<ul class="teaser cf">
	  <?php foreach($results as $result): ?>
	  <li>
		<?php if($image = $result->images()->sortBy('sort', 'asc')->first()): ?>
		<a href="<?php echo $result->url() ?>">
		  <img src="<?php echo $image->url() ?>" alt="<?php echo $result->title()->html() ?>">
		  <h5><a href="<?php echo $result->url() ?>"><?php echo $result->title()->html() ?></a></h5>
		</a>
		<?php endif ?>
	  </li>
	  <?php endforeach ?>
	</ul>
	
	<!--<?php foreach($results as $result): ?>
		<a href="<?php echo $result->url() ?>">
		  <?php echo $result->title()->html() ?>
		</a>
	<?php endforeach ?>-->
	
	<!-- Recently added -->
	<div class="text">
      <h1><?php echo $page->title()->html() ?></h1>
      <?php echo $page->text()->kirbytext() ?>
    </div>
	
	<!-- To switch back to collections, add recently-added snippet here -->
    <?php snippet('all-recently-added') ?>

  </main>

  <?php snippet('footer') ?>