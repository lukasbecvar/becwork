<?php 
    namespace becwork\utils;

    class MysqlUtils {

        // function for return databse connection (input database-name)
        public function connect() {
            
            global $configOBJ;
            global $siteController;

            // get mysql connection data form app config
            $address = $configOBJ->config["mysql-address"];
            $database = $configOBJ->config["mysql-database"];
            $username = $configOBJ->config["mysql-username"];
            $password = $configOBJ->config["mysql-password"];

            // get default database charset
            $encoding = $configOBJ->config["encoding"];
            
            // try connect to database
            try {

                // build connction string
                $conn = new \PDO("mysql:host=$address;dbname=$database;charset=$encoding", $username, $password);
               
                // set the PDO error mode to exception
                $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                   
            // catch connection error
            } catch(\PDOException $e) {
                
                // check if dev-mode is enabled
                if ($configOBJ->config["dev-mode"] == true) {
                    
                    // print error to page
                    die('Database connection error: '.$e->getMessage());
                } else {
                    
                    // redirect to error page
                    $siteController->redirectError("400");
                }
            }

            // return connection
            return $conn;
        }


        /*
          * database insert sql query function (Use database name from config.php)
          * Usage like insertQuery("INSERT INTO logs(name, value, date, remote_addr) VALUES('log name', 'log value', 'log date', 'log remote_addr')")
          * Input: sql command like string
        */
        public function insertQuery($query) {

            global $configOBJ;
            global $siteController;

            // get PDO connection
            $connection = $this->connect();

            // use prepare statement for query
            $statement = $connection->prepare($query);

            try {
                
                // execute prepered query
                $statement->execute();

            // catch insert error
            } catch(\PDOException $e) {

                // check if dev-mode is enabled
                if ($configOBJ->config["dev-mode"] == true) {
                    
                    // print error to page
                    die('SQL query insert error: '.$e->getMessage());
                } else {
                    
                    // redirect to error page
                    $siteController->redirectError("400");
                }
            }
        }


        /*
         * The mysql log function (Muste instaled logs table form sql)
         * Input log name and value
        */
        public function logToMysql($name, $value) {

            global $escapeUtils;
            global $mainUtils;

            // get data & escape
            $name = $escapeUtils->specialCharshStrip($name);
            $value = $escapeUtils->specialCharshStrip($value);

            // get current log date
            $date = date('d.m.Y H:i:s');
            
            // get remote address
            $remote_addr = $mainUtils->getRemoteAdress();

            // insert log to mysql
            $this->insertQuery("INSERT INTO logs(name, value, date, remote_addr) VALUES('$name', '$value', '$date', '$remote_addr')");
        }


        /*
          * The mysql get version function
          * Usage like $ver = getMySQLVersion();
          * Returned mysql version in system
        */
        public function getMySQLVersion() {
            $output = shell_exec('mysql -V');
            preg_match('@[0-9]+\.[0-9]+\.[0-9]+@', $output, $version);
            return $version[0];
        }
    }
?>
