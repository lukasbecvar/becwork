<?php // string escape functions
    
    namespace becwork\utils;
    
    class EscapeUtils {

        /*
          * FUNCTION: escape dangerous chars in string (XSS proteection)
          * USAGE specialCharshStrip("<p>Ola</p>")
          * INPUT: string
          * RETURN secure string
        */
        public function specialCharshStrip($string): ?string {
            $string = htmlspecialchars($string, ENT_QUOTES);
            return $string;
        }
    }
?>
