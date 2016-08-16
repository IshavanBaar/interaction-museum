<?php snippet('header') ?>

<div id="sidebar-wrapper">
    <!-- Side bar -->
    <?php snippet('sidebar')?>

</div> 
<!-- Menu -->
<div id="page-content-wrapper">
     <div class="header">
        <!-- Menu -->
        <?php snippet('menu')?>

        <?php snippet('search-bar') ?>
    </div>

    <div class="main container" role="main">
        <div class="col-md-8 col-md-offset-2">
            <!-- TODO Diana: styling -->
            <h1 class="exhibit-title"><?php echo $page->title() ?></h1>
            <p>by: <?php echo $page->creator() ?></p>
            <div id="<?php echo $page->uid()?>-writings" ><?php echo $page->writings()?></div> 
        </div>
    </div>
</div>

<?php snippet('footer') ?> 