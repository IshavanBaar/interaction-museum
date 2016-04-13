<div class="container-fluid">
<!-- Search bar -->
<div id="search-bar" class="col-lg-6 col-lg-offset-3 search-results">
    <form class="search" action="">
    <div class="input-group">
    
      <input action="" type="search" class="form-control" placeholder="Search..." name="q" value="<?php echo esc($query) ?>" required>
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit">
        	<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
        </button>
      </span>
     
    </div><!-- /input-group -->
     </form>   
  </div><!-- /.col-lg-6 -->

<!-- Search results -->

<div class="search-results teaser">
  
   <?php foreach($results as $result): ?>
    <div class="col-md-4, col-sm-4">      
      <!-- HEADER IMAGE -->
	<?php 
		$image = $result->image((string) $result->header_image());
		$alternative = $result->images()->sortBy('sort', 'asc')->first(); 
		//TODO fix if no image is there
	?>

      <!-- THUMBNAIL LINK -->
      <a href="<?php echo $result->url() ?>" class="thumbnail">
        <img src="<?php echo file_exists($image) ? $image->url() : $alternative->url(); ?>" alt="">
        <h3><?php echo $result->title()->html() ?></h3>
      </a>
      
    </div>
  <?php endforeach ?>
</div>

</div>