<?php
$unwanted_accents = array(  'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );

if(kirby()->request()->ajax()) {
    
    // Modify the title argument for use in Kirby
    $collection_title = kirby()->request()->get('collection_title');
    $collection_title_file = strtolower(strtr($collection_title, $unwanted_accents));      // No capitals and unwanted accents for the page file
    $collection_title_panel = str_replace("-"," ", $collection_title);                  // Spaces for the panel content file
    
    // Modify the techniques argument for use in Kirby 
    $collection_techniques = kirby()->request()->get('collection_techniques');
    $collection_techniques_panel = "";                                       
    foreach ($collection_techniques as $technique) {
        $structure_entry = "- technique: " . str_replace("-"," ", $technique) . "\n";   // Spaces for the panel content file
        $collection_techniques_panel = $collection_techniques_panel . $structure_entry; 
    }
    
    // Add to collection, if not existing
    try {
        if (page('collections')->children()->has('collections/' . $collection_title_file)) {
            echo "Collection exists already";
        } else {
            // Create new page with the new technique.
            page('collections')->children()->create($collection_title_file, 'collection', array(
                'title' => $collection_title_panel,
                'creator' => $site->user()->current(),
                'techniques' => $collection_techniques_panel
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