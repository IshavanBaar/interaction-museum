<?php

/*

---------------------------------------
License Setup
---------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/

// License key.
c::set('license', 'K2-PERSONAL-057b18ed282611f69fc8b050beebc5b2');

/* 
---------------------------------------
Roles for system
---------------------------------------

Client will not be able to login to panel, but to site only

*/
c::set('roles', array(
  array(
    'id'      => 'admin',
    'name'    => 'Admin',
    'default' => true,
    'panel'   => true
  ),
  array(
    'id'      => 'editor',
    'name'    => 'Editor',
    'panel'   => true
  ),
  array(
    'id'      => 'client',
    'name'    => 'Client',
    'panel'   => false
  )
));

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
   
 // Omit 'recently-added' in the page URL 
 array(
   'pattern' => '(:any)',
   'action'  => function($uid) {

     $page = page($uid);

     if(!$page) $page = page('recently-added/' . $uid);
     if(!$page) $page = site()->errorPage();

     return site()->visit($page);

   }
 ),
 array(
   'pattern' => 'recently-added/(:any)',
   'action'  => function($uid) {
     go($uid);
   }
 )
));