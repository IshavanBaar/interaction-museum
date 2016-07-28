<?php if($user = $site->user()): ?>    
    <!-- TODO Diana: position these items on same height as the rest -->
    <!-- CREATE A NEW COLLECTION -->  
    <li>
        <a id="new_collection" class="btn btn-primary menu-operation" href="">New collection</a>
    </li>
    
    <!-- CREATE A NEW EXHIBIT -->  
    <li>
        <a id="new_exhibit" class="btn btn-primary menu-operation" href="<?php echo url('exhibit-editor') ?>">New exhibit</a>
    </li>

    <li>
        <a id="user" class="btn btn-primary menu-operation" href="<?php echo url('account') ?>" onmouseenter="toggleSubmenu()"><?php echo $user?></a>
    </li>

<!-- NOT LOGGED IN -->
<?php else: ?>
    <li>
        <a id="login" class="btn btn-primary menu-operation" href="<?php echo url('login') ?>">Login</a>
    </li>
<?php endif; ?>