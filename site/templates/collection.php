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
            <p>Created by: <?php echo $page->creator() ?>, <?php echo $page->techniques()->toStructure()->count()?> techniques</p>
        </div>
        <!-- GET TECHNIQUES -->       
        <?php $techniques = array();
        foreach($page->techniques()->toStructure() as $structure_entry) {
            // Get technique title from structure.
            $technique_uid = $structure_entry->technique();

            // Get technique page, and add to array.
            $technique = page('all-techniques/' . $technique_uid);

            array_push($techniques, $technique);
        } 
        snippet('thumbnails', array('entries' => $techniques, 'limit' => 100));?>
    </div>
</div>

<?php snippet('footer') ?> 