<?php    
$unwanted_accents = array(  'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );

if(kirby()->request()->ajax()) {
    
    // TITLE + UID
    $collection_title = kirby()->request()->get('collection_title');
    $collection_uid = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(" ","-", strtolower(strtr($collection_title, $unwanted_accents)))); 
    
    // TECHNIQUES + STRUCTURE 
    $collection_techniques = kirby()->request()->get('collection_techniques');
    $collection_techniques_structure = "";                                       
    foreach ($collection_techniques as $technique) {
        $structure_entry = "- technique: " . $technique . "\n";   
        $collection_techniques_structure = $collection_techniques_structure . $structure_entry; 
    }
    
    // Add to collection, if not existing
    try {
        if (page('collections')->children()->has('collections/' . $collection_uid)) {
            echo "Collection exists already";
        } else {
            // Create new page with the new technique.
            page('collections')->children()->create($collection_uid, 'collection', array(
                'title' => $collection_title,
                'creator' => $site->user()->current(),
                'techniques' => $collection_techniques_structure
            ));
            echo "Created collection:" . $collection_uid;
        }
    } catch(Exception $e) {
        echo "Something went wrong. Try again."; //or echo $e->getMessage();
    }
}
else {
	// Go back to homepage at unwanted access of this page.
    go('/');
}
