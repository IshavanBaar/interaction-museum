<?php 
	if(isset($_REQUEST["publication-query"])) {
		$query = $_REQUEST["publication-query"];
		echo $query;
		echo " is the query";
	} else {
		$query = null;
		echo "no query supplied";
	}
?>