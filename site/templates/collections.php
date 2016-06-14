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
                $collections = page('collections')->children()->sortBy('modified', 'desc')->limit(15);            
                foreach ($collections as $collection) :
                ?>
                    <div class="row">
                        <div class="collectionText">
                            <!-- COLLECTION NAME -->
                            <h1><a href="<?php echo $collection->url() ?>"><?php echo $collection->title() ?></a></h1>
                
                            <!-- CREATED BY -->
                            <p>Created by: <?php echo $collection->creator() ?></p>
                        </div>
                     <ul id="light-slider-<?php echo $collection->uid()?>" class="slider">
                     <?php snippet('techniques-in-collection', array('collection' => $collection, 'view' => "sliders")); ?>
                     </ul>
                    </div>

                <?php endforeach ?>
            
            </div>

        </div>


<!-- Footer -->
<?php snippet('footer') ?>