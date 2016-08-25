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
    
    <div class="text-center section">
        <!-- USER NAME -->
        <h1><?php echo $site->user()?></h1>

        <!-- BLUEPRINT TEXT -->
        <?php echo $page->text()->kirbytext() ?>
        
        <!-- LOGOUT -->
        <button class="btn btn-default btn-primary logout-btn">
           Logout <span class="glyphicon glyphicon-log-out"></span>
        </button>
   
        <!-- YOUR COLLECTIONS -->
        <!-- Title TODO Diana: do this more neatly in css?-->
        <div class="text-center section">
            <h1>Your Collections</h1>
        </div>
        <?php snippet('show-collections', array('limit' => 100, 'user' => $site->user()))?>
        
        <!-- YOUR COLLECTIONS -->
        <!-- Title TODO Diana: do this more neatly in css?-->
        <div class="text-center section">
            <h1>Your Exhibits</h1>
        </div>
        <?php snippet('show-exhibits', array('limit' => 100, 'user' => $site->user()))?>
        
    </div>
</div>

<!-- Footer -->
<?php snippet('footer') ?>