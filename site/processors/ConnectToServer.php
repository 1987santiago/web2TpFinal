<?php 
    /**
     * 
     * Connect to Server
     * 
     */

    /**
     * This Class establishes a connection to any server, 
     * that has been pass from parameter
     * @example connectToMyServer = new ConnectToServer();
     */
    class ConnectToServer {

        // Attributes
        private $server; // String
        private $database; // String
        private $user; // String
        private $pass; // String
        private $link; // Boolean 

        // Methods

        // @Constructor
        function ConnectToServer() { 
            // Hardcode values
            $this->server = 'localhost';
            $this->database = 'skynet';
            $this->user = 'root';
            $this->pass = 'root';
            // Establishes connection
            $this->connect();
        }

        /**
         * This method establishes a connection to the server. 
         * On success, returns a link identifier. 
         * On error, returns false.
         */ 
        public function connect() {
            $link = mysql_connect($this->server, $this->user);
            $this->link = $link;
        }

        public function getConnectionLink() {
            return $this->link;
        }

        public function getConnectionStatus() {
            return ($this->link? true : false);
        }

    }

?>