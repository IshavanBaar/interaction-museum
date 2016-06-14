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
            <p>Created by: <?php echo $page->creator() ?></p>
            
            <!-- GET TECHNIQUES -->       
            <?php snippet('techniques-in-collection', array('collection' => $page, 'limit' => -1))?>
        </div>
    </div>
</body>

<?php snippet('footer') ?> 