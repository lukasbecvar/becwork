<?php // file get utils
    
    namespace becwork\utils;
    
    class FileUtils {
 
        /*
          * FUNCTION: get json by target url
          * USAGE $json = getJsonFromUrl("https://www.becvar.xyz/api/becwork.json")
          * RETURN json object
        */
        public function getJsonFromUrl($target): ?array {

            // requst options
            $opts = [
                'http' => [
                        'method' => 'GET',
                        'header' => [
                            'User-Agent: PHP'
                        ]
                ]
            ];

            // create request context
            $context = stream_context_create($opts);

            // try get contents data
            try {

                // get data
                $data = file_get_contents($target, false, $context);
            } catch (Exception $e) {
                $data = null;
            }

            // decode data
            $data = json_decode(utf8_encode($json), true);
            return $data;
        }
    }
?>