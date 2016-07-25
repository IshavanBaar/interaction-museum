<!-- Header -->
<?php snippet('header') ?>


<div id="sidebar-wrapper">
    <!-- Side bar -->
    <?php snippet('sidebar')?>
</div>   

<div id="page-content-wrapper">
    <!-- Menu -->
    <?php snippet('menu')?>

    <!-- All collections -->
    <div class="container-fluid">
        <!-- Title TODO Diana: do this more neatly in css?-->
        <div class="text-center">
            <h1>All <?php echo $page->title()?></h1>
        </div>
        
        <!-- All styles -->
        <?php snippet('show-styles', array('limit' => 100)) ?>
    </div>

</div>

<!-- Footer -->
<?php snippet('footer') ?>