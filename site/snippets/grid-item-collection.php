<?php if ($width == 'half') : ?>
<div class="col-sm-6">
    <div class="col-xs-12">
<?php endif; ?>
        <a href="<?php echo url($collection) ?>" >
            <div class="collection">
                <h3><?php echo $collection->title() ?></h3> 
            </div>
        </a>
        <div class="extra_text">
            <p><?php echo $collection->techniques()->toStructure()->count()?> techniques</p>     
        </div>
<?php if ($width == 'half') : ?>
    </div>
</div>
<?php endif; ?>