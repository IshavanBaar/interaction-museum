<?php 

return function($site, $pages, $page) {

    $query = get('q');
    
    // Only search the techniques
    // TODO search the collections
    $results = page('all-techniques')->search($query);

    return array(
    'query'      => $query,
    'results'    => $results
    );

};