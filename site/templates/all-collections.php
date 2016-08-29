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
    
    <div class="text-center section container-fluid">
        <h1>All <?php echo $page->title()?></h1>

        <!-- All collections -->
        <?php $collections = page('all-collections')->children()->visible();
        snippet('show-collections', array('limit' => 100, 'collections' => $collections, 'width' => 'half')) ?>
    </div>
</div>

<!-- Footer -->
<?php snippet('footer') ?>