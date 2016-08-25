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
            // Medium Editor
            'assets/js/lib/medium-editor/dist/css/medium-editor.min.css',
            'assets/js/lib/medium-editor/dist/css/themes/default.css',
            'assets/js/lib/medium-editor-insert-plugin/dist/css/medium-editor-insert-plugin.min.css',
            'http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css',
        ))?>
        
        <!-- JS -->	
        <?php echo js(array(
            'assets/js/lib/modernizr-2.8.3-respond-1.4.2.min.js',
            'assets/js/lib/jquery/dist/jquery.min.js',
            'assets/js/lib/bootstrap.min.js',
            'assets/js/collectionSidebar.js',
            'assets/js/main.js',
            
            // Medium Editor (https://github.com/yabwe/medium-editor)
            'assets/js/lib/blueimp-file-upload/js/vendor/jquery.ui.widget.js',
            'assets/js/lib/blueimp-file-upload/js/jquery.iframe-transport.js',
            'assets/js/lib/blueimp-file-upload/js/jquery.fileupload.js',
            'assets/js/lib/medium-editor/dist/js/medium-editor.js',
            'assets/js/lib/handlebars/handlebars.runtime.min.js',
            'assets/js/lib/jquery-sortable/source/js/jquery-sortable-min.js',
            
            // Medium Editor insert plugin (https://github.com/orthes/medium-editor-insert-plugin)
            'assets/js/lib/medium-editor-insert-plugin/src/js/templates.js',
            'assets/js/lib/medium-editor-insert-plugin/src/js/core.js',
            'assets/js/lib/medium-editor-insert-plugin/src/js/embeds.js',
            'assets/js/lib/medium-editor-insert-plugin/src/js/images.js'
        ))?> 
        

    </head>
    <body>
        <div id="wrapper" class="toggled">