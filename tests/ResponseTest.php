#!/usr/bin/php
<?php // the basic tesponse codes test

    // add config file
    require_once("config.php");

    // add response test class
    require_once("framework/utils/ResponseUtils.php");

    // init ConfigManager array
    $config = new becwork\config\PageConfig();

    // init response utils class
    $responseUtils = new becwork\utils\ResponseUtils();

    // register all testing urls
    $register = [
        $config->config["url"]
    ];
    
    // test all pages in array
    foreach ($register as $value) {

        // check if site running
        if ($responseUtils->checkOnline($value) == "Online") {

            // get headers array
            $headers = get_headers($value, 1);

            // check if code = 200 OK
            if ($headers[0] == 'HTTP/1.1 200 OK') {
                echo "\033[32mPage: ".$value." working!\033[0m\n";
            } else {
                echo "\033[31mPage: ".$value." error: ".$headers[0]."!\033[0m\n";
            }
        } else {
            echo "\033[31mPage: ".$value." error: page not running!\033[0m\n";
        }
    }

    echo"\033[33m================================================================================\n";
?>