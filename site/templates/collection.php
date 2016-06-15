<?php snippet('header') ?>

<!-- Menu -->
<!-- TODO no option for creating collections here -->
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

<?php snippet('footer') ?> 