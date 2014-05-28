<?php 

    /**
     * Select Data Base
     */

    /**
     * This Class establishes a connection to any Data Base, 
     * that has been pass from parameter
     * @example selectMyDataBase = new SelectDataBase('myDataBase', 'root', 'root');
     */
    class SelectDataBase {

        // Attributes
        private $data_base_name; // String
        private $linked; // Boolean 

        // Methods
        function SelectDataBase($data_base_name) {
            $this->data_base_name = $data_base_name;
        }

        /**
         * This method select and establishes a connection to DB. 
         * On success, returns true. 
         * On error, returns false.
         */ 
        public function select() {
            $this->linked = mysql_select_db($this->data_base_name);
        }

        /**
         * This method returns the link status with data base
         * @return Boolean 
         *         true if is linked or 
         *         false if isn't linked
         */
        public function getSelectionStatus() {
            return $this->linked;
        }

    }

?>