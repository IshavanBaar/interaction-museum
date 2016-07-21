<nav class="navbar navbar-default navbar-top">
    <div class="container-fluid">
        <div class="navbar-header">
        <!-- hamburger menu -->
           <!--  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
                data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button> -->
        
        <!-- LOGO -->
            <a class="navbar-brand" href="<?php echo url() ?>" title="Home">Interaction Museum</a>
         </div>

        <!-- SEARCH BAR -->
        <!--<div id="search-bar" class="col-lg-6 col-md-5 col-sm-5 col-xs-12 search-results">
            <form class="navbar-form search row" role="search" action="<?php echo page('home')->url() ?>" method="get" >
              <div class="input-group col-xs-12">
                <input type="search" class="form-control" placeholder="Search..." name="q" id="searchBar" value="" action="">
                <div class="input-group-btn">
                  <button class="btn btn-default btn-primary" type="submit"><span class="glyphicon glyphicon-search"></span> </button>
                </div>
              </div>
            </form>
        </div>-->
        
        <div>
          <ul class="nav navbar-nav navbar-left menu cf" id="menuList">
            <?php snippet('menu-sections')?>
          </ul>
        </div>
        
        <!-- <div class="collapse navbar-collapse"> -->
        <div>
          <ul class="nav navbar-nav navbar-right menu cf">
            <?php snippet('menu-user-operations')?>
          </ul>
        </div>
    </div>
</nav>
