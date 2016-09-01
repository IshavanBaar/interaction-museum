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
        
        <div class="container-fluid col-md-6 col-md-offset-3">
   
            <div class="text-center">
                <!-- USER NAME -->
                <h1><?php echo $page->title()?></h1>
            </div>
            <div class="text">
                <!-- BLUEPRINT TEXT -->
                <?php echo $page->text()->kirbytext() ?>

                <!-- JOKE -->
                <ul>
                    <li style="color: white">Your Name?</li>
                </ul>
            </div>
        </div>
    </div>
</body>

<?php snippet('footer') ?> 