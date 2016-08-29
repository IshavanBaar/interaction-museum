 <?php $techniques = array();
foreach($collection->techniques()->toStructure() as $structure_entry) {
    // Get technique title from structure.
    $technique_uid = $structure_entry->technique();

    // Get technique page, and add to array.
    $technique = page('all-techniques/' . $technique_uid);

    array_push($techniques, $technique);
} 

snippet('thumbnails', array('entries' => $techniques, 'limit' => $limit));?>