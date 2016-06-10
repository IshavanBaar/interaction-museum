<?php snippet('header') ?>
<?php snippet('menu') ?>

<body>
	<div class="container text" role="main">
	  <h1><?php echo $page->title()->html() ?></h1>
	  <?php echo $page->text()->kirbytext() ?>
	</div>
</body>

<?php snippet('footer') ?>