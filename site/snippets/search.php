<div class="container-fluid">

	<!-- SEARCH BAR -->
	<div id="search-bar" class="col-lg-6 col-lg-offset-3 search-results">
		<form class="search" action="">
			<div class="input-group">
				<input action="" type="search" class="form-control" id="searchBar" placeholder="Search..." name="q" value="" required>
				<span class="input-group-btn">
				  <button class="btn btn-default btn-primary" type="submit">
				   <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
				  </button>
				</span>
			</div>
		</form>   
	</div>

	<!-- TITLE OF COLLECTION PAGE -->
	<?php if(count($results->toArray()) > 0) 
	{
		echo "<h2 class='col-xs-12'>" . count($results->toArray()) . " Results for " . esc($query) . "</h2>";
		// <!-- SEARCH RESULTS -->
		echo "<div class='search-results teaser'>". snippet('thumbnails', array('entries' => $results))."</div>";
		echo "<h2 class='col-xs-12'>Other Interaction Techniques</h2>";
		
	}elseif (count($results->toArray()) === 0 && strlen($query) > 0) {
		echo "<h2 class='col-xs-12'>We did not find anything</h2>";
		echo "<h2 class='col-xs-12'>Other Interaction Techniques</h2>";
	}?>
	
	
</div>
