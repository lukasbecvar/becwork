<?php // string escape functions
    
    namespace becwork\utils;
    
    class EscapeUtils {

        /*
          * FUNCTION: escape dangerous chars in string (XSS proteection)
          * USAGE special_charsh_strip("<p>Ola</p>")
          * INPUT: string
          * RETURN secure string
        */
        public function special_charsh_strip($string): ?string {
            $string = htmlspecialchars($string, ENT_QUOTES);
            return $string;
        }
    }
?>
