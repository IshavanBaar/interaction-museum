<?php snippet('header') ?>

<div class="container" role="main">
	<div class="row">
		
		<!-- HEADER IMAGE -->
		<?php 
		$header_image = (string)$page->header_image();
		$image = $page->image($header_image);
		$alternative = $page->images()->sortBy('sort', 'asc')->first(); 
			//TODO fix if no image is there
		?>

		<figure>
			<img src="<?php echo file_exists($image) ? $image->url() : $alternative->url(); ?>" 
			alt="" class="col-xs-12">
		</figure>
		
		<div class="col-lg-8 col-lg-offset-2">
			<!-- TITLE -->
			<h1><?php echo $page->title()->html() ?></h1>

			<!-- DESCRIPTION -->
			<div class="text">
				<?php echo $page->description()->kirbytext() ?>
			</div>

			<!-- TRADE-OFFS/COMPARISON -->
			<h3>Trade offs  Comparison</h3>

			<!-- TAGS -->
			<ul class="meta ">
				<!--<li><b>Year:</b> <time datetime="<?php echo $page->date('c') ?>"><?php echo $page->date('Y', 'year') ?></time></li>-->
				<li><b>Tags:</b> <?php echo $page->tags() ?></li>
			</ul>
		</div>

<!-- NEXT / PREV 
		<div class="col-lg-2, col-lg-offset-5">
		
		<nav class="nextprev " role="navigation">
		  <?php if($prev = $page->prevVisible()): ?>
		  <a class="prev" href="<?php echo $prev->url() ?>">&larr; previous</a>
		  <?php endif ?>
		  <?php if($next = $page->nextVisible()): ?>
		  <a class="next" href="<?php echo $next->url() ?>">next &rarr;</a>
		  <?php endif ?>
		</nav>
	</div>-->
</div>
</div>

<?php snippet('footer') ?>