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

    <div class="container-fluid">
        <div class="collectionText section">
            <!-- COLLECTION NAME -->
            <h1><?php echo $page->title() ?></h1>          
            <!-- CREATED BY -->
            <p>Created by: <?php echo $page->creator() ?>, <?php echo $page->techniques()->toStructure()->count()?> techniques</p>
        </div>
        <!-- GET TECHNIQUES -->     
        <?php snippet('show-techniques-in-collection', array('collection' => $page, 'limit' => 100)); ?>
    </div>
</div>

<?php snippet('footer') ?> 