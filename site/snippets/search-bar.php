
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
  <div id="semantic-search" class="col-lg-12 col-lg-offset-3 text-center">
    <span class="sentence-element">Show me </span>
    <div class="sentence-select">
      <div class="input-group-btn dropdown-input">
        <button class="btn dropdown-toggle filterObject" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">techniques </button><span class="caret"></span>
         <ul class="options dropdown-menu" id="filterObject">
          <li class="option"><a href="#">techniques</a></li>
          <li class="option"><a href="#">collections</a></li>
          <li class="option"><a href="#">exhibits</a></li>
          <li class="option"><a href="#">all</a></li>
        </ul>
      </div><!-- /btn-group -->
    </div><!-- /input-group -->
   
    <span class="sentence-element">that</span>
     <div class="sentence-select longer">
      <div class="input-group-btn dropdown-input">
        <button class="btn dropdown-toggle filterType" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" value="technology">use the technology of </button><span class="caret"></span>
         <ul class="options dropdown-menu" id="filterType">
          <li class="option" value="technology"><a href="#">use the technology of</a></li>
          <li class="option" value="task"><a href="#">help users to</a></li>
          <li class="option" value="problem"><a href="#">solve the design problem of</a></li>
        </ul>
      </div><!-- /btn-group -->
  </div>
    <?php snippet('filters', array('filter_on' => 'technology', 'limit' => 10)) ?>
    <?php snippet('filters', array('filter_on' => 'task', 'limit' => 10)) ?>
    <?php snippet('filters', array('filter_on' => 'problem', 'limit' => 10)) ?>

</div>  <!-- end row -->
</div>
<script type="text/javascript">
   $('body').on('click', '.option', function (e) {
        e.preventDefault();
        var optionText = $(this).text();
        var optionValue = $(this).attr('value');
        var buttonClass = $(this).parent().attr('id');
        $('.'+buttonClass).text(optionText);
        $('.'+buttonClass).val(optionValue);
        showFilter();
    });

  function showFilter() {
    $('.secondaryFilter').each(function(){
      if($('.filterType').val() !== $(this).attr('value')){
            $(this).hide();
      }else{
            $(this).show();
         }
    });
  }
 showFilter();

 

</script>

