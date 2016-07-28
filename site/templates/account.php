<?php snippet('header-logged-out') ?>

<div class="header">
                <!-- Menu -->
            <?php snippet('menu')?>

            <?php snippet('search-bar') ?>
    </div>

<div class="main container" role="main">
    <div class="text col-md-3 col-xs-6 col-md-offset-5 col-xs-offset-3">
        <!-- USER NAME -->
        <h1><?php echo $site->user()?></h1>

        <!-- BLUEPRINT TEXT -->
        <?php echo $page->text()->kirbytext() ?>

         <!-- LOGOUT -->
        <button class="btn btn-default btn-primary logout-btn">
           Logout <span class="glyphicon glyphicon-log-out"></span>
       </button>
    </div>
</div>

<?php snippet('footer') ?> 