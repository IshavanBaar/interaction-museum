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
    
    <div class="text-center section">
        <h1>All <?php echo $page->title()?></h1>

        <!-- All exhibits -->
        <?php snippet('show-exhibits', array('limit' => 100, 'user' => 'all'))?>
    </div>
</div>

<!-- Footer -->
<?php snippet('footer') ?>