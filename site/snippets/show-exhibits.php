<div class="container-fluid">
    <?php $exhibits = page('all-exhibits')->children()->visible();
    $counter = 0;
    

    
    foreach($exhibits as $exhibit):
        // TODO get full name if available
        /*if ($site->user($exhibit->creator())->firstName()->content()->has('firstName')) { 
        //if ($exhibit->creator()->firstName()->isNotEmpty() && $exhibit->creator()->lastName()->isNotEmpty()) {
            echo "yo";
            $name = $site->user($exhibit->creator())->firstName() . " " . $site->user($exhibit->creator())->lastName();
        } else { 
            $name = $exhibit->creator(); 
        }*/
        
        // Display exhitits
        if ($counter < $limit) : ?>
            <div class="col-sm-6">
                <div class="col-xs-12">
                    <a href="<?php echo url($exhibit) ?>" >
                        <div class="collection">
                            <h3><?php echo $exhibit->title() ?></h3>
                            <p>by <?php echo $exhibit->creator() ?></p>     
                        </div>
                    </a>
                </div>
            </div>
        <?php endif; ?>
    <?php $counter += 1; 
    endforeach ?>
</div>  