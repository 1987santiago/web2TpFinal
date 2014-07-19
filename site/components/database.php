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
		
        // Inicia una transaccion
        public function beginTransaction() 
        {
            mysql_query("SET AUTOCOMMIT=0");
            mysql_query("START TRANSACTION");
        }

        // Acepta una transaccion
        public function commit() 
        {
            mysql_query("COMMIT");
            mysql_query("SET AUTOCOMMIT=1");
        }

        // Vuelve al estado anterior en una transaccion
        public function rollBack()
        {
            mysql_query("ROLLBACK");
            mysql_query("SET AUTOCOMMIT=1");
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