<?php
$unwanted_accents = array(  'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );

$techniques = array();
foreach($collection->techniques()->toStructure() as $collection_item) {
    // Get technique title from structure.
    $technique_title = $collection_item->technique();

    // Clean string. Turn spaces to dashes. Remove capitals, special characters.            
    $technique_title = preg_replace("/[^a-zA-Z0-9 \-]/", "", $technique_title);
    $technique_title = strtolower(str_replace(" ", "-", $technique_title));    
    $technique_title = strtr($technique_title, $unwanted_accents);

    // Get technique page, and add to array.
    $technique = page('recently-added')->children()->visible()->findByURI($technique_title);
    array_push($techniques, $technique);
} 
?>

<!-- TECHNIQUES THUMBNAIL --> 
<?php snippet('thumbnails', array('entries' => $techniques, 'limit' => $limit))?>