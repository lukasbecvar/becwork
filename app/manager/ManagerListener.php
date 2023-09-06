<?php // list of all managers require & instances

    // require all managers
    require_once(__DIR__."/managers/SiteManager.php");
    
    // init managers instances
    $siteManager = new becwork\managers\SiteManager();
?>