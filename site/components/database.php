<?php
	class Database
	{
		private $hostname;
		private $database;
		private $user;
		private $pass;
		private $connection;
		
		public function Database() 
		{
			$this->hostname="localhost";
			$this->database="skynet";
			$this->user="root";
			$this->pass="";
		}
		
		public function connect()
		{
			$this->connection=mysql_connect($this->hostname,$this->user,$this->pass);
			$conexionExitosa=mysql_select_db($this->database, $this->connection);
			if ($conexionExitosa)
				return true;
			else
				return false;
		}

		public function disconnect() 
		{
			mysql_close($this->connection);
		}
		
		// Ejecuta una query insert, delete, update
		public function executeIDU($sql) 
		{
			$result = mysql_query($sql);
			if ($result)
				return true;
			else
				return false;
		}
		
		// Ejecuta una query select
		public function executeSelect($sql) 
		{
			$result = mysql_query($sql);
			return resultToArray($result);
		}
		
		private function resultToArray($result) 
		{
			$lista = Array();
			while ($fila = mysql_fetch_assoc($result) )
			{
				$lista[] = $fila;
			}
			return $lista;
		}
	}	
?>