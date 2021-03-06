<!-- Only access to here if logged in -->
<?php if($user = $site->user()): ?>    
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
                <div class="row">
                    <h2>My Collections</h2>
                    <hr>
                    <?php $collections = page('all-collections')->children()->visible()->filterBy('creator', $site->user());
                    snippet('show-collections', array('limit' => 100, 'collections' => $collections, 'width' => 'half')); ?>
                </div>
                
                <div class="row">
                    <!-- YOUR EXHIBITS -->
                    <h2>My Exhibits</h2>  
                    <hr>
                    <?php snippet('show-exhibits', array('limit' => 100, 'user' => $site->user()))?>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php snippet('footer') ?>
<?php else : 
    go('/'); 
?>
<?php endif; ?>