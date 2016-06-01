<?php snippet('header') ?>

<!-- ENTRY FIELDS -->
			<?php 
				/* IMAGES */
				$header_image = $page->image((string)$page->header_image());
				$trade_off_image = $page->image((string)$page->trade_off_image());
				//TODO fix alternative if the folder does not include any image
				
				/* TEXT */
				$name = $page->title()->html(); 
				$description = $page->description()->kirbytext();
				
				/* OTHER */
				$tags = $page->tags();
				$tagArray = explode(',', $tags);
				$try_out = $page->try_out();
				$video = $page->movie();
				$code_pen = "://codepen.io/";
			?>
<div class="container" role="main">
	<div class="row">
		<div class="col-md-4">
		
			<!-- TITLE -->
			<h1><?php echo $name ?></h1>

			<!-- DESCRIPTION -->
			
			<?php echo $description ?>
		
			<!-- TAGS -->
			<?php if($tags->isNotEmpty()): ?>
				<!-- <h3>Tags</h3> -->
				<div class="row tags">
					<?php foreach($tagArray as $tag): ?>
						<a href="../?q=<?php echo $tag ?>" class="label label-info"><?php echo $tag ?></a>
					<?php endforeach ?>
				</div>
			<?php endif ?>		
			
			<!-- RELATED PUBLICATIONS-->
			<?php if($page->related_publications()->isNotEmpty()): ?>
				<h2>Related Publications</h2>
				<?php foreach($page->related_publications()->toStructure() as $publication): ?>
					<div class="publication">
						
							<!-- TODO fix: title cannot have : inside -->
							<h3><a href="<?php echo $publication->link() ?>" target="_blank"> <?php echo $publication->title() ?> </a> </h3>		
							<span><em><?php echo $publication->type() ?></em></span>
							<br>
							<span>
								<strong>Year:</strong>
								<?php echo $publication->year() ?>
							</span>
						
							<?php
							$authors = $publication->authors();
							$authorsArray = explode(',', $authors);
							?>
							<!-- <strong>Authors:</strong><br/> -->
								<?php foreach($authorsArray as $author): ?>
									<br/><span><?php echo $author ?></span> 
								<?php endforeach ?>
							
						
					</div>
				<?php endforeach ?>
			<?php endif ?>
			
			<!-- </div> -->
		</div> <!-- end first column -->
		<div class="col-md-8">
			<div class="row">
			<!-- <h2>Media</h2> -->
			<!-- HEADER IMAGE -->
			<?php if($page->header_image()->isNotEmpty()): ?>	
				<figure>
					<img id="header_image" src="<?php echo $header_image->url();?>" alt="" class="col-xs-12"
					onmouseover="play(this);" onmouseout="stop(this);">
				</figure>
			<?php endif ?>
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
								style='width: 100%;' height='500' 
								frameborder='no' scrolling='no' allowtransparency='true' allowfullscreen='true'>
						</iframe>
					");
				?>
			<?php endif ?>
			
			<!-- VIDEO -->
			<?php if($video->isNotEmpty()){
					if(stripos($video, "youtube") !== false)
				 		{
				 			echo "<div class='videoWrapper'>" . youtube($video) . "</div>";
				 		}
				 	elseif (stripos($video, "vimeo") !== false)
				 		{
				 			echo "<div class='videoWrapper'>" . vimeo($video) . "</div>";
				 		}	
		 		} 
		 		?>
			<div class="text">
			<!-- EXTRA IMAGES -->
				
				<?php if($page->trade_off_image()->isNotEmpty()): ?>
					<h2>Extra images</h2>
					<figure>
						<img src="<?php echo $trade_off_image->url(); ?>" alt="" class="col-xs-12 trade-img">
					</figure>
				<?php endif ?>
			</div>
		</div> <!-- end 2nd column -->
	</div> <!-- end row -->
</div> <!-- end container  -->

<?php snippet('footer') ?>
