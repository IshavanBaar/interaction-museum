<?php

// License key.
c::set('license', 'K2-PERSONAL-057b18ed282611f69fc8b050beebc5b2');

// Cache
//c::set('cache', true);

/* 
---------------------------------------
Roles for system
---------------------------------------
*/
c::set('roles', array(
  // Access to full panel.
  array(
    'id'      => 'admin',
    'name'    => 'Curator',
    'default' => true,
    'panel'   => true
  ),
  // Access to adding new techniques only (Future) 
  array(
    'id'      => 'contributor',
    'name'    => 'Contributor',
    'panel'   => false
    //'panel/pages/blogs/add' => true //SOMETHING LIKE THIS
  )
));

/* 
---------------------------------------
URL routing
---------------------------------------
*/
c::set('routes', array(
 // When Logout URL is opened, call logout action method. Capitals for safety.
 array(
   'pattern' => 'Logout',
   'action'  => function() {
     if($user = site()->user()) $user->logout();
     // Goes to home page now, but can be set to login.
     go('/');
   }
 ),
   
 // Omit 'all-techniques' in the page URL 
 array(
   'pattern' => '(:any)',
   'action'  => function($uid) {

     $page = page($uid);

     if(!$page) $page = page('all-techniques/' . $uid);
     if(!$page) $page = site()->errorPage();

     return site()->visit($page);

   }
 ),
 array(
   'pattern' => 'all-techniques/(:any)',
   'action'  => function($uid) {
     go($uid);
   }
 ),
));
