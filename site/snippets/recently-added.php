<div class="row">
      <h2  class="col-xs-12"><?php echo page('recently-added')->title()->html() ?></h2>


  <?php foreach(page('recently-added')->children()->visible()->limit(100) as $technique): ?>
  <div class="col-sm-4">
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
</div>
  <?php endforeach ?>

</div>