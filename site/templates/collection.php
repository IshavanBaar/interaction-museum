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
            <?php
            $unwanted_accents = array(  'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );
    
            $techniques_titles = explode(",", $page->techniques());
            $techniques = array();

            foreach($techniques_titles as $techniques_title) {
                $technique_title = strtolower(str_replace(" ", "-", $techniques_title));
                $technique_title = strtr($technique_title, $unwanted_accents);
                $technique = page('recently-added')->children()->visible()->findByURI($technique_title);
                array_push($techniques, $technique);
            }
            ?>
            
            <?php snippet('thumbnails', array('entries' => $techniques))?>
        </div>
    </div>
</body>

<?php snippet('footer') ?> 