<?php 
    /**
     * 
     * Connect to Server
     * 
     */

    /**
     * This Class establishes a connection to any server, 
     * that has been pass from parameter
     * @example connectToMyServer = new ConnectToServer('myServer', 'root', 'root');
     */
    class ConnectToServer {

        // Attributes
        private $server_name; // String
        private $user; // String
        private $pass; // String
        private $link; // Boolean 

        // Methods
        function ConnectToServer($server_name, $user, $pass) {
            $this->server_name = $server_name;
            $this->user = $user;
            $this->pass = $pass;
        }

        /**
         * This method establishes a connection to the server. 
         * On success, returns a link identifier. 
         * On error, returns false.
         */ 
        public function connect() {
            $link = mysql_connect($this->server_name, $this->user);
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