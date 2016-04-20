<?php snippet('header') ?>

<div class="container" role="main">
	<div class="row">
		
		<!-- ENTRY FIELDS -->
		<?php 
			/* IMAGES */
			$header_image = $page->image((string)$page->header_image());
			$trade_off_image = $page->image((string)$page->trade_offs());
			//TODO fix alternative if the folder does not include any image
			
			/* TEXT */
			$title = $page->title()->html(); 
			$description = $page->description()->kirbytext();
			
			/* OTHER */
			$tags = $page->tags();
			$tagArray = explode(',', $tags);
			$try_out = $page->try_out();
			$code_pen = "://codepen.io/";
		?>
		
		<!-- HEADER IMAGE -->
		<?php if($page->header_image()->isNotEmpty()): ?>	
			<figure>
				<img src="<?php echo $header_image->url();?>" alt="" class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12"
				onmouseover="play(this);" onmouseout="stop(this);">
			</figure>
		<?php endif ?>
		
		<div class="col-lg-8 col-lg-offset-2">
			<!-- TITLE -->
			<h1><?php echo $title ?></h1>

			<!-- DESCRIPTION -->
			<div class="text">
				<?php echo $description ?>
			</div>
			
			<!-- TRY OUT -->
			<?php if($try_out->isNotEmpty()): ?>
				<h2>Try It Out</h2>
				<?php 
					// If the try out is a code pen, use a different link to embed it nicely.
					if(strpos($try_out, $code_pen) !== false): 
						$try_out = str_replace("/pen/", "/embed/", $try_out);
					endif;
					
					print("
						<iframe src=" . $try_out . " 
								style='width: 100%;' height='300' 
								frameborder='no' scrolling='no' allowtransparency='true' allowfullscreen='true'>
						</iframe>
					");
				?>
			<?php endif ?>
			
			<!-- TRADE-OFFS/COMPARISON -->
			<?php if($page->trade_offs()->isNotEmpty()): ?>
				<h2>Trade offs & Comparison</h2>
				<figure>
					<img src="<?php echo $trade_off_image->url(); ?>" alt="" class="col-xs-12 trade-img">
				</figure>
			<?php endif ?>
			
			<!-- TAGS -->
			<div class="row tags">
				<?php foreach($tagArray as $tag): ?>
					<a href="../?q=<?php echo $tag ?>" class="label label-info"><?php echo $tag ?></a>
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

<!-- SCRIPT + HIDDEN DIV TO PASS VARIABLES -->
<div id="dom-target" style="display: none;">
    <?php echo htmlspecialchars($header_image->url()); ?>
</div>

<?php snippet('footer') ?>
