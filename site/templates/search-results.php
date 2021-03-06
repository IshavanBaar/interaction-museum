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
        
        <!-- Search results -->
        <div class="container-fluid">
            <!-- If results, show number of results and results in thumbnail -->
            <?php if(count($results->toArray()) > 0): ?>	
                <h2 class='col-xs-12'><?php echo count($results->toArray()) . " Results for " . esc($query); ?></h2>
                <div class='search-results teaser'><?php echo snippet('thumbnails', array('entries' => $results, 'limit' => 100)); ?></div>

            <!-- If no results, show that we didn't find anything -->
            <?php elseif(count($results->toArray()) === 0 && strlen($query) > 0): ?> 
                <h2 class='col-xs-12'>We did not find anything</h2>
            <?php endif; ?>

        </div>

<!-- Footer -->
<?php snippet('footer') ?>


