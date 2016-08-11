<nav class="navbar">
    <div class="container-fluid navbar-top">
        <div class="navbar-header">
            <!-- HAMBURGER MENU -->
            <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
                data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button> -->
        
            <!-- LOGO -->
            <a class="navbar-brand" href="<?php echo url() ?>" title="Home">Interaction Museum</a>
        </div>

        <ul class="nav navbar-nav navbar-left menu cf" id="menuList">
            <?php snippet('menu-sections')?>
        </ul>

        <ul class="nav navbar-nav navbar-right menu cf">
            <?php snippet('menu-user-operations')?>
        </ul>
    </div>
</nav>
