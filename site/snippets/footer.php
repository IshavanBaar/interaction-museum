		<hr>
 	 	<footer class="footer" role="contentinfo">
 	 		<div class="container">
				<div class="row">
					<div class="col-sm-6 copyright">
						<?php echo $site->copyright()->kirbytext() ?>				
					</div>
					<div class="col-sm-6 colophon text-right">
						<?php echo $site->authors()->kirbytext() ?>		
					</div>
				</div>
 	 		</div>
		</footer>
	
	<?php echo js(array(
		'assets/js/lib/jquery-1.12.3.js',
		'assets/js/lib/bootstrap.min.js',
		'assets/js/main.js',
		'assets/js/imageHover.js',
	))?>

		
  </body>
</html>