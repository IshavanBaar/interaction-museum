<div class="col-sm-6">
    <div class="col-xs-12">
        <a href="<?php echo url($collection) ?>" >
            <div class="collection">
                <h3><?php echo $collection->title() ?></h3>
                <p><?php echo $collection->techniques()->toStructure()->count()?> techniques</p>     
            </div>
        </a>
    </div>
</div>