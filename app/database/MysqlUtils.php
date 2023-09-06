<?php // mysql utils (PDO functions: connect, read, insert, etc...)
    namespace becwork\utils;

    use \PDO;
    use \PDOException;

    class MysqlUtils {

        private $db_ip;
        private $db_name;
        private $db_username;
        private $db_password;

        // init constructor
        public function __construct($db_host, $database_name, $username, $password) {
            $this->db_ip = $db_host;
            $this->db_name = $database_name;
            $this->db_username = $username;
            $this->db_password = $password;
        }

        /* 
          * FUNCTION: database connection (use PDO)
          * RETURN: database connection
        */
        public function connect(): PDO {
            
            global $config, $site_manager;

            // get mysql connection data form app config
            $address  = $this->db_ip;
            $database = $this->db_name;
            $username = $this->db_username;
            $password = $this->db_password;

            // get default database charset
            $encoding = $config->get_value("encoding");
            
            // try connect to database
            try {

                // build connction string
                $conn = new PDO("mysql:host=$address;dbname=$database;charset=$encoding", $username, $password);
               
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                   
            // catch connection error
            } catch(PDOException $e) {
                
                // handle error
                $site_manager->handle_error('database connection error: '.$e->getMessage(), 400);
            }

            // return connection
            return $conn;
        }

        /*
          * FUNCTION:  database insert sql query function (Use database name from config.php)
          * USAGE: like insert_query("INSERT INTO logs(name, value, date, remote_addr) VALUES('log name', 'log value', 'log date', 'log remote_addr')")
          * INPUT: sql command like string
        */
        public function insert_query($query): void {

            global $config, $site_manager;

            // get PDO connection
            $connection = $this->connect();

            // use prepare statement for query
            $statement = $connection->prepare($query);

            try {
                
                // execute prepered query
                $statement->execute();

            // catch insert error
            } catch(PDOException $e) {

                // handle error
                $site_manager->handle_error('sql insert error: '.$e->getMessage(), 400);
            }
        }

        /*
         * FUNCTION: mysql log function
         * INPUT: log name and value
        */
        public function log($name, $value): void {

            global $escape_utils, $main_utils;

            // check if name is null
            if (empty($name)) {
                $name = null;
            }

            // check if value is null
            if (empty($value)) {
                $value = null;
            }

            // get data & escape
            $name = $escape_utils->special_charsh_strip($name);
            $value = $escape_utils->special_charsh_strip($value);

            // get current log date
            $date = date('d.m.Y H:i:s');
            
            // get remote address
            $remote_addr = $main_utils->get_remote_adress();

            // insert log to mysql
            $this->insert_query("INSERT INTO logs(name, value, date, remote_addr) VALUES('$name', '$value', '$date', '$remote_addr')");
        }

        /*
          * FUNCTION: mysql data query fetch
          * INPUT: query like "SELECT * FROM logs"
          * RETURN: database output
        */
        public function fetch($query): ?array {

            global $config;

            // get database connection
            $connection = $this->connect();

            try {
                
                // use prepare statement for query
                $statement = $connection->prepare($query);

                // execute query
                $statement->execute();
                
                // fetch data
                $data = $statement->fetchAll();

                // return data
                return $data;

            // catch fetch error
            } catch(PDOException $e) {

                // handle error
                $site_manager->handle_error('sql fetch error: '.$e->getMessage(), 400);
            }
        }

        /*
          * FUNCTION: fetch single value form database
          * INPUT: sql query & specific value
          * RETURN: selected value
        */
        public function fetch_value($query, $value): ?string {

            global $config, $site_manager;

            // get database connection
            $connection = $this->connect();

            try {
                
                // use prepare statement for query
                $statement = $connection->prepare($query);

                // execute query
                $statement->execute();

                // fetch data query
                $fetch = $statement->fetchAll();

                // check if select exist
                if (array_key_exists(0, $fetch)) {
                    
                    // check if selected value exist in array
                    if (array_key_exists($value, $fetch[0])) {

                        // get value from retrun
                        $valueOutput = $fetch[0][$value];
                    
                    } else {
                    
                        // handle error
                        $site_manager->handle_error("database select error: '$value' not exist in selected data", 404);
                    }

                } else {

                    // handle error
                    $site_manager->handle_error("database select error: please check if query valid, query:'$query'", 404);
                }

                // return value
                return $valueOutput;

            // catch fetch error
            } catch(\PDOException $e) {

                // handle error
                $site_manager->handle_error('sql fetch error: '.$e->getMessage(), 400);
            }
        }

        /*
          * FUNCTION: get version function
          * USAGE: $ver = get_version();
          * RETURN: mysql version in system
        */
        public function get_version(): ?string {
            $output = shell_exec('mysql -V');
            preg_match('@[0-9]+\.[0-9]+\.[0-9]+@', $output, $version);
            return $version[0];
        }
    }
?>
