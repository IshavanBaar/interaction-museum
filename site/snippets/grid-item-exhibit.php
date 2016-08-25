<div class="col-sm-6">
    <div class="col-xs-12">
        <a href="<?php echo url($exhibit) ?>" >
            <div class="collection">
                <h3><?php echo $exhibit->title() ?></h3>
            </div>
        </a>
        <div class="extra_text">
                <p>by <?php echo $exhibit->creator() ?></p>     
        </div>
    </div>
</div>
