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
		
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="<?php url('assets/js/vendor/jquery-1.11.2.min.js') ?>"><\/script>')</script>

    <?php echo js('assets/js/vendor/bootstrap.min.js'); ?>
    <?php echo js('assets/js/main.js'); ?>
		
  </body>
</html>