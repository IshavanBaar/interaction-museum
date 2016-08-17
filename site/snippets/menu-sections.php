<!-- SHOW VISIBLE PAGES -->
<?php foreach($pages->visible()->sortBy('title', 'desc') as $p): ?>
    <li>
        <a 
            <?php if($p->isOpen()): ?>
                class="section_active"
            <?php else: ?>
                class="section_inactive"
            <?php endif; ?>
            href="<?php echo $p->url() ?>">
            <?php echo $p->title()->html() ?>
        </a>
    </li>
<?php endforeach ?>

