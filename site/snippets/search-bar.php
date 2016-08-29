 <!-- SEARCH BAR -->
<div class="row">

  <div id="search-bar" class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">

      <form class="navbar-form search row" role="search" action="<?php echo url('search-results')?>" method="get" >
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

<div class="row">
  <div id="semantic-search" class="col-lg-6 col-lg-offset-3">
    <span class="sentence-element">Show me </span>
    <div class="sentence-select">
      <div class="input-group-btn">
        <button class="btn dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">techniques <span class="caret"></span></button>
         <ul class="options dropdown-menu">
          <li class="option"><a href="#">techniques</a></li>
          <li class="option"><a href="#">ecollections</a></li>
          <li class="option"><a href="#">exhibits</a></li>
          <li class="option"><a href="#">all</a></li>
        </ul>
      </div><!-- /btn-group -->
    </div><!-- /input-group -->



   
    <span  class="sentence-element"> that </span>
     <div class="sentence-select">
      <div class="input-group-btn">
        <button class="btn dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">use the technology of <span class="caret"></span></button>
         <ul class="options dropdown-menu">
          <li class="option"><a href="#">use the technology of</a></li>
          <li class="option"><a href="#">help users to</a></li>
          <li class="option"><a href="#">solve the design problem of</a></li>
        </ul>
      </div><!-- /btn-group -->
  </div>
</div>  <!-- end row -->
</div>