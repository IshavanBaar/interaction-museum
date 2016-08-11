<!-- Header -->
<?php snippet('header') ?>


<div id="sidebar-wrapper">
    <!-- Side bar -->
    <?php snippet('sidebar')?>
</div>   

<div id="page-content-wrapper">
    <div class="header">
       <!-- Menu -->
        <?php snippet('menu')?>
        <?php snippet('search-bar') ?>
    </div>
    
    <!-- Title TODO Diana: do this more neatly in css?-->
    <div class="text-center section">
        <h1>All <?php echo $page->title()?></h1>

        <!-- All collections -->
        <?php snippet('show-collections', array('limit' => 100))?>
    </div>
</div>

<!-- Footer -->
<?php snippet('footer') ?>