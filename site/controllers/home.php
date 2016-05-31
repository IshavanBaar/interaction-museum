<?php 

return function($site, $pages, $page) {

  $query = get('q');
  $results = $site->search($query);

  return array(
    'query'      => $query,
    'results'    => $results
  );

};