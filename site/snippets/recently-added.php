<div class="container-fluid">
  <h2  class="col-xs-12"><?php echo page('recently-added')->title()->html() ?></h2>


  <?php foreach(page('recently-added')->children()->visible()->limit(100) as $technique): 
      $header_image = (string)$technique->header_image();
      $image = $technique->image($header_image);
      $alternative = $technique->images()->sortBy('sort', 'asc')->first(); 
    //TODO fix if no image is there
      ?>
 <!-- HEADER IMAGE -->
      <!-- THUMBNAIL LINK -->
      <div class="col-md-4 ">
      <div class="thumbnail">
      <a href="<?php echo $technique->url() ?>" >
        <img src="<?php echo file_exists($image) ? $image->url() : $alternative->url(); ?>" alt="">
        <p class="panel-title"><?php echo $technique->title()->html() ?></p>
      </a>
      </div>
      </div>
      
      <div class="card">
  <img class="card-img-top" data-src="..." alt="Card image cap">
  <div class="card-block">
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
    
  <?php endforeach ?>

</div>