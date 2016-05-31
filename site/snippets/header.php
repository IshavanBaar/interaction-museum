<!doctype html>
<html class="no-js" lang="<?php echo $site->language() ?>">
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
	<meta name="description" content="<?php echo $site->description()->html() ?>">
	<meta name="keywords" content="<?php echo $site->keywords()->html() ?>">

	<!-- CSS -->
	<?php echo css('assets/css/bootstrap.css') ?>
	<?php echo css('assets/css/main.css') ?>
	
	<!-- MODERNIZER FOR OLD BROWSERS -->	
	<?php echo js('assets/js/lib/modernizr-2.8.3-respond-1.4.2.min.js') ?>
	
	<?php echo js(array(
		'assets/js/lib/jquery-1.12.3.js',
		'assets/js/lib/bootstrap.min.js',
		'assets/js/main.js',
	))?>
	
</head>
<body>
	<nav class="navbar navbar-default navbar-top">
		<div class="container-fluid">
			<div class="navbar-header col-md-10">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>				
				<a class="navbar-brand" href="<?php echo url() ?>">Interaction Museum</a>
				<div id="search-bar" class="col-xs-3 col-sm-3 col-md-8 pull-right search-results">
			        <form class="navbar-form search" role="search" action="<?php echo page('home')->url() ?>" method="get" >
			          <div class="input-group">
			            <input type="search" class="form-control" placeholder="Search..." name="q" id="searchBar" value="" action="">
			            <div class="input-group-btn">
			              <button class="btn btn-default btn-primary" type="submit"><span class="glyphicon glyphicon-search"></span></button>
			            </div>
			          </div>
			        </form>
				</div>
			</div>
			
			<div class="collapse navbar-collapse">
			  <ul class="nav navbar-nav navbar-right">
			    <!-- SHOW VISIBLE PAGES -->
				<?php foreach($pages->visible() as $p): ?>
			        <li>
			          <a <?php e($p->isOpen(), ' class="active"') ?> href="<?php echo $p->url() ?>"><?php echo $p->title()->html() ?></a>
			        </li>
			    <?php endforeach ?>

			    
				<!-- ACCOUNT NAME / LOGOUT -->
				<?php if($user = $site->user()): ?>
					<li>
					  <a href="<?php echo url('account') ?>"><?php echo $user?></a>
					</li>
				<?php else: ?>
					<li>
					  <a href="<?php echo url('login') ?>">Login</a>
					</li>
				<?php endif; ?>
				
			  </ul>
			</div>
		</div>
	</nav>
