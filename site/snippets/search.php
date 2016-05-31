<div class="container-fluid">

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
