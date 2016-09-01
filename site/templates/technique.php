<?php snippet('header') ?>
<div id="sidebar-wrapper">
    <!-- Side bar -->
    <?php snippet('sidebar')?>
</div>   

<div id="page-content-wrapper">
     <div class="header">
                <!-- Menu -->
            <?php snippet('menu')?>

            <?php snippet('search-bar') ?>
        </div>
    
    <!-- ENTRY FIELDS -->
    <?php 
        /* PAGE ID */
        $identifier = $page->uid();
        
        /* TEXT */
        $name = $page->title()->html(); 
        $description = $page->description()->kirbytext();

        /* IMAGE */
        $header_image = $page->header_image()->toFile();

        /* OTHER */
        $tags = $page->tags();
        $tagArray = explode(',', $tags);
        $try_out = $page->try_out();
        $video = $page->movie();
        $video_file = $page->movie_file()->toFile();
        $code_pen = "://codepen.io/";

        /* EXTRA IMAGES */
        // Transform the comma-separated list of filenames into a file collection
        $filenames = $page->extra_images()->split(',');
        if(count($filenames) < 2) $filenames = array_pad($filenames, 2, '');
        $files = call_user_func_array(array($page->files(), 'find'), $filenames);
    ?>

    <div class="container" role="main">
        <div class="row section">
            <div class="col-md-4">
                <!-- TITLE -->
                <h1 id="title_<?php echo $identifier?>"><?php echo $name ?></h1>
                
                <!-- DESCRIPTION -->	
                <?php echo $description ?>
                <!-- TAGS -->
                <?php if($tags->isNotEmpty()): ?>
                    <div class="row tags">
                        <?php foreach($tagArray as $tag): ?>
                            <a href="<?php echo page('home')->url() . '/q=' . $tag ?>" class="label label-info"><?php echo $tag ?></a>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>	
                <!-- Button to add to collection -->
                <h5>Options</h5>
                <button id="<?php echo $identifier?>-btn-technique" class="btn add_to_collection_btn technique_btn" title="Add to collection" type="submit">
                    <i class="glyphicon glyphicon-plus"></i> Add to collection
                </button>
                
                <!-- RELATED PUBLICATIONS-->
                <?php if($page->related_publications()->isNotEmpty()): ?>
                    <h5>Related publications</h5>
                    <?php foreach($page->related_publications()->toStructure() as $publication): ?>
                        <div class="publication">
                            <h3><a href="<?php echo $publication->link() ?>" target="_blank"> <?php echo $publication->title() ?> </a> </h3>		
                            <span>
                                <strong>Conference:</strong>
                                <span><?php echo $publication->type() . ', ' . $publication->year()?><span>
                            </span>
                            <br>
                            <span>
                                <strong>By:</strong>
                                <span><?php echo $publication->authors(); ?></span>  
                            </span>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>			
                
                <!-- FEATURED IN COLLECTION: -->                
                <h5>Also featured in</h5>
                <?php 
                $collections = array();
                foreach(page('all-collections')->children()->visible() as $collection) {
                    foreach($collection->techniques()->toStructure() as $collectionItem) {
                        if (strcmp($collectionItem, $page->uid()) == 0) {     
                            array_push($collections, $collection);
                        }
                    }
                }
                snippet('show-collections', array('limit' => 100, 'collections' => $collections, 'width' => 'whole')) ?>
                
            </div> <!-- end first column -->

            <div class="col-md-8">	

                <!-- PREVIEW IMAGE -->
                <div class='row'>
                        <figure><img id="header_image_<?php echo $identifier?>" class="header_image_noclick col-xs-12" src="<?php echo $header_image->url()?>" alt="" class="col-xs-12"></figure>
                </div> 
                
                <div class="media">
                    <!-- TRY OUT -->
                    <?php if($try_out->isNotEmpty()): ?>
                        <h5>Try it out</h5>
                        <!-- If the try out is a code pen, use a different link to embed it nicely. -->
                        <?php if(strpos($try_out, $code_pen) !== false) : 
                            $try_out = str_replace("/pen/", "/embed/", $try_out); ?>
                            <iframe src='<?php echo $try_out ?>' style='width: 100%;' height='300'
                                    frameborder='no' scrolling='no' allowtransparency='true' allowfullscreen='true'>
                            </iframe>
                        <?php else : ?>
                            <iframe src="<?php echo $try_out ?>" style='width: 100%;' height='500' 
                                    frameborder='no' scrolling='no' allowtransparency='true' allowfullscreen='true'>
                            </iframe>
                        <?php endif; 
                    endif; ?>

                    <!-- EXTRA VIDEO / IMAGES -->	
                    <?php if ($page->extra_images()->isNotEmpty() || $video->isNotEmpty()): ?>
                        <h5>More</h5>
                    
                        <!-- VIDEO -->
                        <?php if($video->isNotEmpty()): ?>
                            <?php if(stripos($video, "youtube") !== false): ?>
                                <div class='videoWrapper'><?php echo youtube($video);?></div>
                            <?php elseif (stripos($video, "vimeo") !== false): ?>
                                <div class='videoWrapper '><?php echo vimeo($video);?></div>
                            <?php endif; ?>
                        <?php elseif($page->movie_file()->isNotEmpty()): ?>
                            <video controls name="media">
                              <source src="<?php echo $video_file->url() ?>" type="<?php echo $video_file->mime() ?>">  
                            </video>
                        <?php endif; ?>
                    
                        <!-- IMAGES -->
                        <?php if ($page->extra_images()->isNotEmpty()):
                            foreach($files as $file) : ?>
                                <figure>
                                    <img src="<?php echo $file->url()?>" alt="" class="col-xs-12 trade-img">
                                    <?php if ($file->caption() != ''): ?>
                                        <!-- TODO Diana styling of caption -->
                                        <figcaption>
                                            <span>
                                              <?php echo html($file->caption()) ?>
                                            </span>
                                        </figcaption>
                                    <?php endif; ?>
                                </figure>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php snippet('footer') ?>
