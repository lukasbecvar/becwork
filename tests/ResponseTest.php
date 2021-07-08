#!/usr/bin/php
<?php //The basic tesponse codes test

    //Add config file
    require_once"config.php";

    //Init ConfigManager array
    $pageConfig = new PageConfig();



    //Register all testing urls
    $register = [
        $pageConfig->config["url"],
        $pageConfig->config["url"]."/assets/js/",
        $pageConfig->config["url"]."/ergrgrgrgrgreggr"
    ];



    //Test all pages in array
    foreach ($register as $value) {

        $headers = get_headers($value, 1);

        if ($headers[0] == 'HTTP/1.0 200 OK') {
            echo "\033[32mPage: ".$value." working!\033[0m\n";
        } else {
            echo "\033[31mPage: ".$value." error: ".$headers[0]."!\033[0m\n";
        }
    }
?>