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

            <div class="intro row">
                <div class="col-sm-12 ">
                    <h1>A Collection of Innovative Interactions</h1>
                    <p>Find interaction techniques from Human-Computer Interaction research that inspire new designs.
                </div>
            </div>
            <?php snippet('search-bar') ?>

        </div>
        <div class="container-fluid">
            <!-- TODO Diana: style these items in the included snippets, and style the line break-->
            <!-- Picked techniques, for now the 6 most recent -->     
            <div class="text-center section">
                <h1>Techniques we <i style="color:red" class="glyphicon glyphicon-heart"></i></h1>
                
                <?php snippet('show-techniques-in-collection', array('collection' => page('all-collections/picked-techniques'), 'limit' => 6)) ?>
                
                <a class="btn btn-primary view-more" href="<?php echo url('all-techniques') ?>">See more techniques</a>
                <hr>
            </div>
           
            <!-- Picked collections, for now the 3 most recent -->   
            <div class="text-center">
                <h1>Collections we <i style="color:red" class="glyphicon glyphicon-heart"></i></h1>
                
                <?php $picked_collections = array();
                foreach(page('all-collections/picked-collections')->techniques()->toStructure() as $collection) {
                    $collection_page = page('all-collections/' . $collection->technique());
                    array_push($picked_collections, $collection_page);
                }
                snippet('show-collections', array('limit' => 4, 'collections' => $picked_collections, 'width' => 'half')) ?>
                
                <a class="btn btn-primary view-more" href="<?php echo url('all-collections') ?>">See more collections</a>
                <hr>
            </div>
        </div>
    </div>

<!-- Footer -->
<?php snippet('footer') ?>
