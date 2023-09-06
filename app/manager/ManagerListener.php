<?php // list of all managers require & instances

    // require all managers
    require_once(__DIR__."/managers/SiteManager.php");
    
    // init managers instances
    $site_manager = new becwork\managers\SiteManager();
?>
