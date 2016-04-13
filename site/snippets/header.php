<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
	
	<!-- Custom keywords and descriptions in the metatags for each project 
	     Like in here: https://getkirby.com/blog/custom-metatags -->
	<?php if($page->description() != ''): ?>
		<meta name="description" content="<?php echo html($page->description()) ?>" />
	<?php else: ?>
		<meta name="description" content="<?php echo html($site->description()) ?>" />
	<?php endif ?>

	<?php if($page->keywords() != ''): ?>
		<meta name="keywords" content="<?php echo html($page->keywords()) ?>" />
		<?php else: ?>
		<meta name="keywords" content="<?php echo html($site->keywords()) ?>" />
	<?php endif ?>

	<?php echo css('assets/css/main.css') ?>

</head>
<body>

<header class="header cf" role="banner">
	<!-- LOGO -->
	<a class="logo" href="<?php echo url() ?>">
	  Interaction Museum 
	</a>
	
	<!-- MENU -->
	<?php snippet('menu') ?>
</header>