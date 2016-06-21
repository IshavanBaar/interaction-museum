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
        
        <?php 
        $collections = page('all-collections')->children()->sortBy('modified', 'desc')->limit(15);            
        foreach ($collections as $collection) :
        ?>
            <!-- TITLE, CREATOR, SHOW ALL -->
            <div class="row"> 
                <a href="<?php echo $collection->url() ?>">  
                <h1 class="collectionText col-xs-12 collectionLink"><?php echo $collection->title() ?> ( <?php echo $collection->techniques()->toStructure()->count()?> )</h1></a>
            </div>
            
            <!-- THUMBNAILS SLIDER -->
            <ul id="light-slider-<?php echo $collection->uid()?>" class="slider">
                <?php snippet('techniques-in-collection', array('collection' => $collection, 'view' => "sliders")); ?>
            </ul>
            
            <hr>

        <?php endforeach ?>
    
    </div>

</div>

<!-- Footer -->
<?php snippet('footer') ?>