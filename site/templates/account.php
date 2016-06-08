<?php snippet('header') ?>

<!-- Menu -->
<!-- TODO no option for creating collections here -->
<?php snippet('menu')?>

<body>
    <div class="main container" role="main">
        <div class="text">
            <!-- USER NAME -->
            <h1><?php echo $site->user()?></h1>
            
            <!-- BLUEPRINT TEXT -->
            <?php echo $page->text()->kirbytext() ?>
            
            <!-- LOGOUT -->
            <form action="<?php echo url('logout') ?>">
                <input type="submit" value="Logout">
            </form>
        </div>
    </div>
</body>

<?php snippet('footer') ?> 