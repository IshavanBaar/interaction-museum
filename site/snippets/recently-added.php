<h2><?php echo page('recently-added')->title()->html() ?></h2>

<ul class="teaser cf">
  <?php foreach(page('recently-added')->children()->visible()->limit(3) as $technique): ?>
  <li>

    <!-- NO DESCRIPTION EXCERPT <p><?php echo $technique->text()->excerpt(80) ?> <a href="<?php echo $technique->url() ?>">read&nbsp;more&nbsp;→</a></p>-->
	<!-- NO AUTHOR <p><?php echo $technique->added_by()->html() ?><p>-->
	
    <?php if($image = $technique->images()->sortBy('sort', 'asc')->first()): ?>
    <a href="<?php echo $technique->url() ?>">
      <img src="<?php echo $image->url() ?>" alt="<?php echo $technique->title()->html() ?>" >
	  <h5><a href="<?php echo $technique->url() ?>"><?php echo $technique->title()->html() ?></a></h5>
    </a>
    <?php endif ?>
  </li>
  <?php endforeach ?>
</ul>

<p><a href="<?php echo page('recently-added') ?>">more &nbsp; →</a></p>
