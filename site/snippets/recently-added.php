<div class="row">
<h2 class="col-xs-12"><?php echo page('recently-added')->title()->html() ?></h2>
  <?php foreach(page('recently-added')->children()->visible()->limit(100) as $technique): ?>
    <div class="col-sm-4">
    <h2><?php echo $technique->title()->html() ?></h2>
      <p><?php echo $technique->text()->excerpt(80) ?></p>
      <p><a class="btn btn-default" href="<?php echo $technique->url() ?>" role="button">View details &raquo;</a></p>
     
      <?php if($image = $technique->images()->sortBy('sort', 'asc')->first()): ?>
     
        <a href="<?php echo $technique->url() ?>" class="thumbnail">
          <img src="<?php echo $image->url() ?>" alt="<?php echo $technique->title()->html() ?>" >
        </a>
      <?php endif ?>
    </div>
  <?php endforeach ?>
</div>






      