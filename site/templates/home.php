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
                        <p>Find interaction techniques that inspire new designs. Design with cutting edge interactions, developed by Human-Computer Interaction research.</p>
                </div>
            </div>
            <?php snippet('filters', array('filter_on' => 'technology', 'limit' => 10)) ?>
            <?php snippet('search-bar') ?>

        </div>
        <div class="container-fluid">
            <!-- TODO Diana: style these items in the included snippets, and style the line break-->
            <!-- Picked techniques, for now the 6 most recent -->     
            <div class="text-center section">
                <h1>Picked Techniques</h1>
                <?php snippet('show-techniques', array('limit' => 6)) ?>
                <a class="btn btn-primary view-more" href="<?php echo url('all-techniques') ?>">See more techniques</a>
                <hr>
            </div>
           
            <!-- Picked collections, for now the 3 most recent -->   
            <div class="text-center">
                <h1>Picked Collections</h1>
                <?php snippet('show-collections', array('limit' => 4, 'user' => 'all')) ?>
                <a class="btn btn-primary view-more" href="<?php echo url('all-collections') ?>">See more collections</a>
                <hr>
            </div>
            
            <!-- Styles, for now all -->   
            <div class="text-center">
                <h1>Filter on Interaction Style</h1>
                <?php snippet('show-styles', array('limit' => 100, 'technique' => 'none', 'user' => 'all')) ?>    
                <hr>
            </div>
        </div>
    </div>

<!-- Footer -->
<?php snippet('footer') ?>
