<?php snippet('header') ?>

<!-- Menu -->
<!-- TODO no option for creating collections here -->
<?php snippet('menu')?>

<body>
    <div class="main container" role="main">
        <div class="text">
            <!-- USER NAME -->
            <h1><?php echo $page->title()?></h1>
            
            <!-- BLUEPRINT TEXT -->
            <?php echo $page->text()->kirbytext() ?>
            
            <!-- JOKE -->
            <ul>
                <li style="color: white">Your Name?</li>
            </ul>
        </div>
    </div>
</body>

<?php snippet('footer') ?> 