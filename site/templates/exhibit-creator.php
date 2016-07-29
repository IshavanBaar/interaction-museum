<?php    
$unwanted_accents = array(  'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );

if(kirby()->request()->ajax()) {
    
    // TITLE + UID
    $exhibit_title = kirby()->request()->get('exhibit_title');
    $exhibit_uid = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(" ","-", strtolower(strtr($exhibit_title, $unwanted_accents)))); 
    
    // TECHNIQUES + STRUCTURE 
    $exhibit_content = kirby()->request()->get('exhibit_content');
    // Put techniques later.
    
    // Add to collection, if not existing
    try {
        if (page('all-exhibits')->children()->has('all-exhibits/' . $exhibit_uid)) {
            echo "'" . $exhibit_title . "' exists already. Change the name!";
        } else if($site->user() === false) { 
            echo "Login to publish exhibits.";
        }
        else {
            // Create new page with the new technique.
            page('all-exhibits')->children()->create($exhibit_uid, 'exhibit', array(
                'title' => $exhibit_title,
                'creator' => $site->user()->current(),
                'writings' => $exhibit_content
            ));
            echo "Created exhibit:" . $exhibit_uid;
        }
    } catch(Exception $e) {
        echo "Something went wrong. Try again."; 
        //or echo $e->getMessage();
    }
}
else {
	// Go back to homepage at unwanted access of this page.
    go('/');
}
