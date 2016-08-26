<?php 

return function($site, $pages, $page) {

    $query = get('q');
    
    // TODO search the collections too, and group
    $results = page('all-techniques')->search($query);

    return array(
    'query'      => $query,
    'results'    => $results
    );

};