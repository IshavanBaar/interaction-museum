<nav class="navbar">
    <div class="container-fluid navbar-top">
        <div class="navbar-header">
            <!-- LOGO -->
            <a class="navbar-brand" href="<?php echo url() ?>" title="Home">Interaction Museum</a>
        </div>

        <ul class="nav navbar-nav navbar-left menu cf" id="menuList">
            <!-- SHOW VISIBLE PAGES AS SECTIONS -->
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
        </ul>

        <ul class="nav navbar-nav navbar-right menu cf">
            <!-- SHOW USER OPERATIONS -->
            <?php if($user = $site->user()): ?>    
                <li>
                    <a id="new_technique" class="btn btn-primary menu-operation" href="panel/pages/all-techniques/add">New technique</a>
                </li>

                <li class="multiple-buttons">
                    <a id="new_collection" class="btn btn-primary menu-operation" href="">New collection</a>
                </li>
                <li class="multiple-buttons">
                    <a id="new_exhibit" class="btn btn-primary menu-operation" href="<?php echo url('exhibit-editor') ?>">New exhibit</a>
                </li>
                <li>
                    <a id="user" class="btn btn-primary menu-operation" href="<?php echo url('account') ?>"><?php echo $user?></a>
                </li>
            <?php else: ?>
                <li>
                    <a id="login" class="btn btn-primary menu-operation" href="<?php echo url('login') ?>">Login</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
