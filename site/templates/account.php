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
    
    <div class="container-fluid">
        <div class="row text-center">
            <!-- USER NAME -->
            <h1>Welcome, <?php echo $site->user()?></h1>
        </div>
        <!-- LOGOUT -->
        <button class="btn btn-default btn-primary logout-btn">
           Logout <span class="glyphicon glyphicon-log-out"></span>
        </button>
   
        <!-- YOUR COLLECTIONS -->
        <div class="account-section">
            <h2>My Collections</h2>
            <hr>
             <?php snippet('show-collections', array('limit' => 100, 'technique' => 'none',  'user' => $site->user()))?>

        <!-- YOUR COLLECTIONS -->

            <h2>My Exhibits</h2>  
            <hr>
            <?php snippet('show-exhibits', array('limit' => 100, 'user' => $site->user()))?>
        </div>
    </div>
</div>

<!-- Footer -->
<?php snippet('footer') ?>