<?php

$techniques = array();
foreach($collection->techniques()->toStructure() as $structure_entry) {
    // Get technique title from structure.
    $technique_uid = $structure_entry->technique();
    
    // Get technique page, and add to array.
    $technique = page('recently-added/' . $technique_uid);
    
    array_push($techniques, $technique);
} 

if($view === "sliders" ) {
    snippet('thumbnails-slider', array('entries' => $techniques));
} else if ($view === "columns") {
    snippet('thumbnails', array('entries' => $techniques));
}

?>