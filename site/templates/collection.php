<?php snippet('header') ?>

<div id="sidebar-wrapper">
    <!-- Side bar -->
    <?php snippet('sidebar')?>

</div> 
<!-- Menu -->
<div id="page-content-wrapper">
<?php snippet('menu')?>

<div class="container-fluid">
    <div class="collectionText">
        <!-- COLLECTION NAME -->
        <h1><?php echo $page->title() ?></h1>          
        <!-- CREATED BY -->
        <p>Created by: <?php echo $page->creator() ?></p>
        <!-- number of techniques -->
        <p>Includes: <?php echo $page->techniques()->toStructure()->count()?> techniques</p>
    </div>
    <!-- GET TECHNIQUES -->       
    <?php snippet('techniques-in-collection', array('collection' => $page, 'view' => "columns"))?>
</div>
</div>
<?php snippet('footer') ?> 