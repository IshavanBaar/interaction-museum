<?php
$unwanted_accents = array(  'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );

if(kirby()->request()->ajax()) {
    
    // Get the collection arguments
    $data = kirby()->request()->data();
    reset($data);
    $data = key($data);
    $arguments = explode("!@!", $data);
    
    // Modify the arguments to use in Kirby
    $collection_title_spaces = (string) str_replace("_", " ", $arguments[0]); 
    $collection_title = (string) strtr(strtolower(str_replace("_", "-", $arguments[0])), $unwanted_accents);
    $technique_titles = (string) str_replace("_", " ", $arguments[1]); 
    
    // Add to collection, if not existing
    try {
    
        if (page('collections')->children()->has('collections/' . $collection_title)) {
            echo "Collection exists already";
        } else {
            // Create new page with the new technique.
            $page->create('collections/' .$collection_title, 'collection', array(
                'title' => $collection_title_spaces,
                'creator' => $site->user()->current(),
                'techniques' => $technique_titles
            ));
            echo "New collection was created.";
        }
    } catch(Exception $e) {
        echo "Something went wrong. Try again.";
        //echo $e->getMessage();
    }
}
else {
	header::status('404');
}

// KEEP CODE TO GET THE PAGE FROM A TITLE
//$technique_title = strtolower(str_replace("_", "-", $technique_title));
//$technique_title = strtr($technique_title, $unwanted_accents);
//$technique = page('recently-added')->children()->visible()->findByURI($technique_title);

/* KEEP CODE FOR EDITING COLLECTIONS */
/*if(strpos(page('collections/new-collection')->techniques(), $technique_title) !== false) {
    // Don't do anything, technique is already in collection.
    echo "Not Added";
} else {
    // Update page info with new technique.
    $old_techniques = page('collections/new-collection')->techniques();
    page('collections/new-collection')->update(array(
        'techniques' => $old_techniques . "," . $technique_title
    ));
    echo "Added";
}*/