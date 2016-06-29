<!doctype html>
<html class="no-js" lang="<?php echo $site->language() ?>">
    <!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">

        <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
        <meta name="description" content="<?php echo $site->description()->html() ?>">
        <meta name="keywords" content="<?php echo $site->keywords()->html() ?>">

        <!-- CSS -->
        <?php echo css(array(
            'assets/css/bootstrap.css',
            'assets/css/main.css',
            'assets/css/sidebar/simple-sidebar.css',
            'assets/css/slider/lightslider.css',
            'assets/css/medium-editor/medium-editor.css',
            'assets/css/medium-editor/medium-editor-themes/beagle.css'
        ))?>
        
        <!-- JS -->	
        <?php echo js(array(
            'assets/js/lib/modernizr-2.8.3-respond-1.4.2.min.js',
            'assets/js/lib/jquery-1.12.3.js',
            'assets/js/lib/bootstrap.min.js',
            'assets/js/slider/lightslider.js',
            'assets/js/main.js',
            'assets/js/medium-editor/medium-editor.min.js',
            'assets/js/medium-editor/custom-html.js',
            'assets/js/medium-editor/insert-technique.js'
        ))?> 
    </head>
    <body>
        <div id="wrapper" class="toggled">