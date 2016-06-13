<nav class="navbar navbar-default navbar-top">
    <div class="container-fluid">
        <div class="navbar-header col-lg-10 col-md-9 col-sm-10">
        <!-- hamburger menu -->
           <!--  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button> -->
        <!-- Interaction museum brand 		 -->
            <a class="navbar-brand" href="<?php echo url() ?>">Interaction Museum</a>
        <!-- menu if on mobile  -->
            <div class="navbar-toggle collapsed"  data-toggle="collapse" id="mobile-menu" >
              <ul class="nav navbar-nav" >
                <?php snippet('menu-items')?>
              </ul>
            </div>
        <!-- SEARCH BAR -->
            <?php snippet('search-bar')?>
        </div>

        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <?php snippet('menu-items')?>
          </ul>
        </div>
    </div>
</nav>
