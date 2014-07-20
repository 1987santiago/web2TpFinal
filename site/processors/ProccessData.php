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

                if (gettype($value) == 'array') {
                // Si se trata de una array dentro de otro array lo iteramos también

                    foreach ($value as $key2 => $value2) {

                        if ($key2 == $key_) {
                            return $value2;
                        }

                    }

                }

                if ($key == $key_) {
                    return $value;
                }

            }

        }

        public function printData() {

            foreach ($this->data as $key => $value) {

                if (gettype($value) == 'array') {
                // Si se trata de una array dentro de otro array lo iteramos también

                    foreach ($value as $key2 => $value2) {

                        echo "\t $key2 ---> \t\t $value2\n<br>";

                    }

                } else {

                    echo "\t $key ---> \t\t $value\n<br>";

                }

            }

        }

        public function clearData() {
            $this->data = null;
        }

    }

?>