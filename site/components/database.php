<?php
    class Database
    {
        private $hostname;
        private $database;
        private $user;
        private $pass;
        private $connection;

        public function __construct() 
        {
            $this->hostname="localhost";
            $this->database="skynet";
            $this->user="root";
            $this->pass="";	
        }

        public function connect()
        {
            $this->connection=mysql_connect($this->hostname,$this->user,$this->pass);
            return mysql_select_db($this->database, $this->connection);
        }

        public function disconnect() 
        {
            mysql_close($this->connection);
        }

        // Ejecuta una query insert, delete, update
        public function executeIDU($sql) 
        {
            return mysql_query($sql);
        }

        // Ejecuta una query select
        public function executeSelect($sql) 
        {
            $result = mysql_query($sql);
            return $this->resultToArray($result);
        }

        private function resultToArray($result) 
        {
            $lista = array();
            while ($fila = mysql_fetch_assoc($result))
            {
                    $lista[] = $fila;
            }
            return $lista;
        }
    }	
?>