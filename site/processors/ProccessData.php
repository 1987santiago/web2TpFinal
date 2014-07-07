<?php 

    class ProccessData {

        // Attributes
        private $data; // Array associativo

        // Methods
        function ProccessData($data) {
            $this->data = $data;
        }

        /**
         * @key_ String 
         * @return String with the value of the key
         */
        public function getValue($key_) {

            foreach ($this->data as $key => $value) {

                if ($key == $key_) {
                    return $value;
                }

            }

        }

        public function printData() {

            foreach ($this->data as $key => $value) {
                # code...
                echo "\t $key ---> \t\t $value\n";
            }

        }

    }

?>