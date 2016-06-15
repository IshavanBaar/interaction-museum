<!-- SHOW VISIBLE PAGES -->
<?php foreach($pages->visible() as $p): ?>
    <li>
      <a <?php e($p->isOpen(), ' class="active"') ?> href="<?php echo $p->url() ?>"><?php echo $p->title()->html() ?></a>
    </li>
<?php endforeach ?>

<!-- CREATE A NEW COLLECTION -->  
<?php if($user = $site->user()): ?>  
    <li>
      <a class="new_collection" href="">New collection</a>
    </li>
<?php endif; ?>  
  
<!-- ACCOUNT NAME / LOGOUT -->
<?php if($user = $site->user()): ?>
    <li>
      <a href="<?php echo url('account') ?>"><?php echo $user?></a>
    </li>
<?php else: ?>
    <li>
      <a href="<?php echo url('login') ?>">Login</a>
    </li>
<?php endif; ?>
