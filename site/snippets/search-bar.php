 <!-- SEARCH BAR -->
<div class="row">

  <div id="search-bar" class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">

      <form class="navbar-form search row" role="search" action="<?php echo url('home')?>" method="get" >
       <!-- <label for="#search-bar">Search for interaction techniques</label> -->
        <div class="input-group col-xs-12">
          <input type="search" class="form-control" placeholder="For example: menu, gestures, Fitts' Law..." name="q" id="searchBar" value="" action="">
          <div class="input-group-btn">
            <button class="btn btn-default btn-primary" type="submit"><span class="glyphicon glyphicon-search"></span> </button>
          </div>
        </div>
      </form>
  </div>
</div>