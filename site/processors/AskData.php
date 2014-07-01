<?php 

    class AskData {

        // Attributes
        private $query;
        private $connect_link;
        private $response;
        private $associative_response;

        // Methods
        function AskData($query, $connect_link) {
            $this->query = $query;
            $this->connect_link = $connect_link;
        }

        /**
         * This method execute any query to table
         */
        public function executeQuery() {
            $this->response = mysql_query($this->query, $this->connect_link);
        }

        /**
         * @return 
         */
        public function getResponse() {
            return $this->response;
        }

        /**
         * @return an Associative [Array] (key : value)
         */
        public function getAssociativeArrayResponse() {
 
            $this->associative_response = mysql_fetch_assoc($this->response);
            return $this->associative_response;

        }

        /**
         * @key_ String 
         * @return String with the value of the key
         */
        public function getValue($key_) {

            foreach ($this->associative_response as $key => $value) {

                if ($key == $key_) {
                    return $value;
                }

            }

        }

        public function printData($array) {

            foreach ($array as $key => $value) {
                # code...
                echo "\t $key ---> \t\t $value\n";
            }

        }

        /**
         * @return Number of records founds
         */
        public function getRows() {

            return mysql_num_rows($this->response);

        }

        /**
         * @return Number of fields founds into a record
         */
        public function getFields() {

            return mysql_num_fields($this->response);

        }

    }

?>