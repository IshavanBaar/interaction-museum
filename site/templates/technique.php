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
			<img src="<?php echo file_exists($image) ? $image->url() : $alternative->url(); ?>" alt="" class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
		</figure>
		
		<div class="col-lg-8 col-lg-offset-2">
			<!-- TITLE -->
			<h1><?php echo $page->title()->html() ?></h1>

			<!-- DESCRIPTION -->
			<div class="text">
				<?php echo $page->description()->kirbytext() ?>
			</div>

			<!-- TRADE-OFFS/COMPARISON -->
			<h2>Trade offs & Comparison</h2>
			
			<?php 
			$trade_offs = $page->image((string)$page->trade_offs());
			?>
			<figure>
				<img src="<?php echo file_exists($trade_offs) ? $trade_offs->url() : $alternative->url(); ?>" alt="" class="col-xs-12 trade-img">
			</figure>
			
			
			<!-- TAGS -->
			<!-- <h2>Tags</h2> -->
			<?php
			$tags = $page->tags();
			$tagArray = explode(',', $tags);
			?>
			<div class="row tags">
				<?php foreach($tagArray as $tag): ?>
					<span class="label label-info"><?php echo $tag ?></span>
				<?php endforeach ?>
			</div>
			<!--<li><b>Year:</b> <time datetime="<?php echo $page->date('c') ?>"><?php echo $page->date('Y', 'year') ?></time></li>-->
			
			<!-- RELATED PUBLICATIONS-->
			<!-- TODO fix: title cannot have : inside -->
			<h2>Related Publications</h2>
			<?php foreach($page->related_publications()->toStructure() as $publication): ?>
				<div class="row publication">
				<div class="col-lg-8">
					<h3><a href="<?php echo $publication->link() ?>" target="_blank"><?php echo $publication->title() ?></a>	</h3>		
					<span><em><?php echo $publication->type() ?></em></span>
				</div>
				<div  class="col-lg-4">
					<?php
					$authors = $publication->authors();
					$authorsArray = explode(',', $authors);
					?>
					<strong>Authors:</strong><br/>
					
						<?php foreach($authorsArray as $author): ?>
							<span><?php echo $author ?></span> <br/>
						<?php endforeach ?>
		
					<span>
						<b>Year:</b>
						<?php echo $publication->year() ?>
					</span>
				</div>
				</div><!-- end row -->
			<?php endforeach ?>
			
			<!-- NEXT / PREV -->
			<!--<div class="col-lg-2, col-lg-offset-5">
			
				<nav class="nextprev " role="navigation">
				  <?php if($prev = $page->prevVisible()): ?>
				  <a class="prev" href="<?php echo $prev->url() ?>">&larr; previous</a>
				  <?php endif ?>
				  <?php if($next = $page->nextVisible()): ?>
				  <a class="next" href="<?php echo $next->url() ?>">next &rarr;</a>
				  <?php endif ?>
				</nav>
				</div>
			-->
		</div>
	</div>
</div>

<?php snippet('footer') ?>
