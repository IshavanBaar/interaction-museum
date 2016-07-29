<?php snippet('header') ?>

<div id="sidebar-wrapper">
    <!-- Side bar -->
    <?php snippet('sidebar')?>

</div> 
<!-- Menu -->
<div id="page-content-wrapper">
    <div class="header">
                <!-- Menu -->
            <?php snippet('menu')?>

            <?php snippet('search-bar') ?>
    </div>


    <div class="container-fluid">
        <div class="collectionText">
            <!-- STYLE NAME -->
            <h1><?php echo $page->title() ?></h1>          
            <!-- STYLE DESCRIPTION -->
            <p><?php echo $page->description()?></p>
        </div>
        <!-- GET TECHNIQUES WITH THIS STYLE -->       
        <?php $techniques = page('all-techniques')->children()->visible();
        $techniques_with_style = array();
        foreach($techniques as $technique) {
            foreach($technique->styles()->split() as $category) {
                if($category === $page->uid()) {
                    array_push($techniques_with_style, $technique);
                }
            }
        }
        snippet('thumbnails', array('entries' => $techniques_with_style, 'limit' => 100));
        ?>
        
    </div>
</div>

<?php snippet('footer') ?> 