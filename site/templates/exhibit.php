<?php snippet('header') ?>

<!-- Menu -->
<?php snippet('menu')?>

<body>
    <div class="main container" role="main">
        <div class="text-center">
            <!-- TODO Diana: styling -->
            <h2 class="exhibit-title"><?php echo $page->title() ?></h2>
            <p>by: <?php echo $page->creator() ?></p>
            <div id="<?php echo $page->uid()?>-writings" ><?php echo $page->writings()?></div> 
        </div>
    </div>
</body>

<?php snippet('footer') ?> 