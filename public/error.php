<?php // error site handlerer

    // check if error code get setted
    if (isset($_GET["code"])) {

        // get error code form url
        $code = $_GET["code"];

        // 404 (not found)
        if ($code == 404) {
            include_once("../site/errors/404.php");

        // 403 (permission denied)
        } else if ($code == 403) {
            include_once("../site/errors/403.php");

        // 400 (request not completed)
        } else if ($code == 400) {
            include_once("../site/errors/400.php");
        
        // 500 (unknown error)
        } else if ($code == 520) {
            include_once("../site/errors/UnknownError.php");
        
        // not found error code
        } else {
            include_once("../site/errors/UnknownError.php");
        }

    // not used code query
    } else {
        include_once("../site/errors/404.php");
    }
?>