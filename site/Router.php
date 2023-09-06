<?php // main site router 

	// get route
	$route = $url_utils->get_route();

    // main root route
    if ($route == "/") {
        include_once(__DIR__."/Main.php");
    } 

    // route example usages
    elseif ($route == "/example") {
        include_once(__DIR__."/Example.php");
    }
?>
