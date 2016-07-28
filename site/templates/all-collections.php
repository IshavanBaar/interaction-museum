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
    </div>
    
    <!-- All collections -->
    <div class="container-fluid">
        
        <!-- Changed to thumbnails with only the title and number of techniques -->
        <?php snippet('show-collections', array('limit' => 100))?>
        
        <!-- OLD CODE (using lightslider). If not used, delete all of it, including plugin -->
        <!--<?php 
        $collections = page('all-collections')->children()->sortBy('modified', 'desc')->limit(100);            
        foreach ($collections as $collection) :?>-->
            <!-- Title, creator and number of techniques --> 
            <!--<div class="row"> 
                <a href="<?php echo $collection->url() ?>">  
                    <h1 class="collectionText col-xs-12 collectionLink">
                    <?php echo $collection->title() ?> (<?php echo $collection->techniques()->toStructure()->count()?>)
                    </h1>
                </a>
            </div>-->
            
            <!-- Show all collections. If more than 3, view is slider -->
            <!--<ul id="light-slider-<?php echo $collection->uid()?>" class="slider">
                <?php snippet('show-collections-old', array('collection' => $collection, 'view' => "sliders")); ?>
            </ul>
            
            <hr>

        <?php endforeach ?>-->
    
    </div>
</div>

<!-- Footer -->
<?php snippet('footer') ?>