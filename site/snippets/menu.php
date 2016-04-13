<div id="navbar" class="collapse navbar-collapse">
<!--  FOR ITEMS ON THE LEFT SIDE OF THE MENU
  <ul class="nav navbar-nav">
    <?php foreach($pages->visible() as $p): ?>
      <?php if($p->hasVisibleChildren()): ?>
        <li class="dropdown<?php e($p->isOpen(), ' active') ?>">
          <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" href="<?php echo $p->url() ?>"><?php echo $p->title()->html() ?> <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <?php foreach($p->children()->visible() as $p): ?>
            <li<?php e($p->isOpen(), ' class="active"') ?>>
              <a href="<?php echo $p->url() ?>"><?php echo $p->title()->html() ?></a>
            </li>
            <?php endforeach ?>
          </ul>
        </li>
      <?php else : ?>
        <li<?php e($p->isOpen(), ' class="active"') ?>>
          <a href="<?php echo $p->url() ?>"><?php echo $p->title()->html() ?></a>
        </li>
      <?php endif; ?>

      <?php if($p->hasVisibleChildren()): ?>
      <?php endif ?>

    </li>
    <?php endforeach ?>
  </ul>
  -->
  <ul class="nav navbar-nav navbar-right">
    <?php foreach($pages->visible() as $p): ?>
     
        <li<?php e($p->isOpen(), ' class="active"') ?>>
          <a href="<?php echo $p->url() ?>"><?php echo $p->title()->html() ?></a>
        </li>
 
    </li>
    <?php endforeach ?>
  </ul>
</div><!--/.nav-collapse -->
