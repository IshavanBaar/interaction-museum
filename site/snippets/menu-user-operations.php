<?php if($user = $site->user()): ?>    
    <!-- TODO Diana: position these items on same height as the rest -->
    <!-- CREATE A NEW TECHNIQUE -->  
    <li>
        <a id="new_technique" class="btn btn-primary menu-operation" href="panel/pages/all-techniques/add">New technique</a>
    </li>

    <!-- CREATE A NEW COLLECTION -->  
    <li class="multiple-buttons">
        <a id="new_collection" class="btn btn-primary menu-operation" href="">New collection</a>
    </li>
    
    <!-- CREATE A NEW EXHIBIT -->  
    <li class="multiple-buttons">
        <a id="new_exhibit" class="btn btn-primary menu-operation" href="<?php echo url('exhibit-editor') ?>">New exhibit</a>
    </li>
    
    <!-- USER -->
    <li>
        <a id="user" class="btn btn-primary menu-operation" href="<?php echo url('account') ?>"><?php echo $user?></a>
    </li>

<!-- NOT LOGGED IN -->
<?php else: ?>
    <li>
        <a id="login" class="btn btn-primary menu-operation" href="<?php echo url('login') ?>">Login</a>
    </li>
<?php endif; ?>