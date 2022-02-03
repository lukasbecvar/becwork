<?php //This is the main class to include all active controllers in the application
    
    //Require all controlers
    require_once(__DIR__."/controllers/ExampleController.php");


    
    //Init controllers instances
    $exampleController =  new ExampleController();
?>