<?php // file get utils
    
    namespace becwork\utils;
    
    class FileUtils {
 
        /*
          * FUNCTION: get json by target url
          * USAGE $json = getJsonFromUrl("https://www.becvar.xyz/api/becwork.json")
          * RETURN json object
        */
        public function getJsonFromUrl($target) {
            $json = file_get_contents($target);
            $data = json_decode(utf8_encode($json), true);
            return $data;
        }
    }
?>