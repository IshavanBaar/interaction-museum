<?php snippet('header') ?>

<div class="container" role="main">
	<div class="row">
		
		<!-- ENTRY FIELDS -->
		<?php 
			/* IMAGES */
			$header_image = $page->image((string)$page->header_image());
			$trade_off_image = $page->image((string)$page->trade_offs());
			$alternative = $page->images()->sortBy('sort', 'asc')->first(); 
			//TODO fix alternative if the folder does not include any image
			
			/* TEXT */
			$title = $page->title()->html(); 
			$description = $page->description()->kirbytext();
			
			/* OTHER */
			$tags = $page->tags();
			$tagArray = explode(',', $tags);
		?>
		
		<!-- HEADER IMAGE -->
		<?php if(file_exists($header_image)): ?>
			<figure>
				<img src="<?php echo file_exists($header_image) ? $header_image->url() : $alternative->url(); ?>" alt="" class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
			</figure>
		<?php endif ?>
		
		<div class="col-lg-8 col-lg-offset-2">
			<!-- TITLE -->
			<h1><?php echo $title ?></h1>

			<!-- DESCRIPTION -->
			<div class="text">
				<?php echo $description ?>
			</div>

			<!-- TRADE-OFFS/COMPARISON -->
			<?php if(file_exists($trade_off_image)): ?>
				<h2>Trade offs & Comparison</h2>
			
				<figure>
					<img src="<?php echo file_exists($trade_off_image) ? $trade_off_image->url() : $alternative->url(); ?>" alt="" class="col-xs-12 trade-img">
				</figure>
			<?php endif ?>
			
			<!-- TAGS -->
			<div class="row tags">
				<?php foreach($tagArray as $tag): ?>
					<span class="label label-info"><?php echo $tag ?></span>
				<?php endforeach ?>
			</div>
			
			<!-- RELATED PUBLICATIONS-->
			<h2>Related Publications</h2>
			<?php foreach($page->related_publications()->toStructure() as $publication): ?>
				
				<div class="row publication">
					<div class="col-lg-8">
						<!-- TODO fix: title cannot have : inside -->
						<h3><a href="<?php echo $publication->link() ?>" target="_blank"> <?php echo $publication->title() ?> </a> </h3>		
						<span><em><?php echo $publication->type() ?></em></span>
					</div>
					<div class="col-lg-4">
						<?php
						$authors = $publication->authors();
						$authorsArray = explode(',', $authors);
						?>
						<strong>Authors:</strong><br/>
							<?php foreach($authorsArray as $author): ?>
								<span><?php echo $author ?></span> <br/>
							<?php endforeach ?>
						<span>
							<strong>Year:</strong>
							<?php echo $publication->year() ?>
						</span>
					</div>
				</div>
			<?php endforeach ?>
	
		</div>
	</div>
</div>

<?php snippet('footer') ?>
