<!-- Header -->
<?php snippet('header') ?>

<body>

    <div id="wrapper" class="toggled">

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
                        <!-- COLLECTION NAME -->
                        <h1><?php echo $collection->title() ?></h1>
            
                        <!-- CREATED BY -->
                        <p>Created by: <?php echo $collection->creator() ?></p>
                
                        <?php snippet('techniques-in-collection', array('collection' => $collection, 'limit' => 3)); ?>
                    </div>
                <?php endforeach ?>
            
            </div>

        </div>
    </div>
</body>

<!-- Footer -->
<?php snippet('footer') ?>