<?php snippet('header') ?>

<!-- Menu -->
<!-- TODO no option for creating collections here -->
<?php snippet('menu')?>

<body>
    <div class="main container" role="main">
        <div class="text">
            <!-- COLLECTION NAME -->
            <h1><?php echo $page->title() ?></h1>
            
            <!-- CREATED BY -->
            <p><strong>Created by: <?php echo $page->creator() ?></strong></p>
            
            <!-- TECHNIQUES -->
            <p><?php echo $page->techniques()?></p>
        </div>
    </div>
</body>

<?php snippet('footer') ?> 