<!-- SHOW VISIBLE PAGES -->
<?php foreach($pages->visible() as $p): ?>
    <li>
      <a <?php e($p->isOpen(), ' class="active"') ?> href="<?php echo $p->url() ?>"><?php echo $p->title()->html() ?></a>
    </li>
<?php endforeach ?>
  
<!-- ACCOUNT NAME / LOGOUT -->
<?php if($user = $site->user()): ?>
    <li>
        <a class="user" href="<?php echo url('account') ?>" onmouseenter="toggleSubmenu()"><?php echo $user?></a>
        <ul class="submenu" >
            <!-- CREATE A NEW COLLECTION -->  
            <li>
                <a id="new_collection" href="">New collection</a>
            </li>
            <!-- CREATE A NEW EXHIBIT -->  
            <li>
                <a id="new_exhibit" href="<?php echo url('exhibit-creator') ?>">New exhibit</a>
            </li>
        </ul>
    </li>
<?php else: ?>
    <li>
      <a class="login" href="<?php echo url('login') ?>">Login</a>
    </li>
<?php endif; ?>
