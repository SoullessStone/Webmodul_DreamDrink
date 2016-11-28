<?php
    class DbHelper extends mysqli{
        //const HOST="localhost", USER="u989533150_dream", PW="gin-gin", DB_NAME="u989533150_dream";
        const HOST="localhost", USER="root", PW="", DB_NAME="dreamdrinkdb";
        static private $instance;
        
        public function __construct() {
            parent::__construct(self::HOST, self::USER, self::PW, self::DB_NAME);
        }

        static public function getInstance() {
            if ( !self::$instance ) {
                @self::$instance = new DbHelper();
                if(@self::$instance->connect_errno > 0){
                    die("Unable to connect to database: ". @self::$instance->connect_error);
                }
                if (!@self::$instance->set_charset("utf8"))
                {
                    die("Error loading character set utf8: ".@self::$instance->error);
                }
            }
            return self::$instance;
        }

        static public function doQuery($sql) {
            $result = self::getInstance()->query($sql);
            if (!$result) 
                die(self::getInstance()->error);
            return $result;
        }
    }
?>