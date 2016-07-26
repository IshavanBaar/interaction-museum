<?php snippet('header') ?>

<!-- Menu -->
<?php snippet('menu')?>

<body>
    <div class="main container" role="main">
        <div class="text-center">
            <!-- TODO Diana: styling -->
            <h2 class="exhibit-title col-md-8 col-md-offset-2"><?php echo $page->title() ?></h2>
            <p>by: <?php echo $page->creator() ?></p>
            <?php echo $page->writings()?>
        </div>
    </div>
</body>

<?php snippet('footer') ?> 