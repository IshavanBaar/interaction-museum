<nav class="navbar navbar-default navbar-top">
    <div class="container-fluid">
        <div class="navbar-header col-md-10">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>				
            <a class="navbar-brand" href="<?php echo url() ?>">Interaction Museum</a>
            <!-- SEARCH BAR -->
            <?php snippet('search-bar')?>
        </div>

        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <!-- SHOW VISIBLE PAGES -->
            <?php foreach($pages->visible() as $p): ?>
                <li>
                  <a <?php e($p->isOpen(), ' class="active"') ?> href="<?php echo $p->url() ?>"><?php echo $p->title()->html() ?></a>
                </li>
            <?php endforeach ?>


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

          </ul>
        </div>
    </div>
</nav>
