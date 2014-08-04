<?php
	/**
	 * @Database
	 * Esta clase establece la conexión con el server y 
	 * selecciona la DB para realizar las consultas
	 * @example $conection = new Database();
	 */
	class Database {

		private $hostname;
		private $database;
		private $user;
		private $pass;
		private $connection;

		private $response; // guarda la respuesta de la ultima query ejecutada

		public function Database() {

			$this->hostname = "localhost";
			$this->database = "skynet";
			$this->user = "root";
			$this->pass = "";
			$this->connect();
		
		}
		
		/**
		 * Se establece la conexión con el server
		 * @return Boolean
		 * 		@true si se conecto satisfactoriamente
		 * 		@false si no se logró establecer una conexión
		 */
		public function connect() {

			$this->connection = mysql_connect($this->hostname, $this->user, $this->pass);
			$conexionExitosa = mysql_select_db($this->database, $this->connection);
			
			if ($conexionExitosa)
				return true;
			else
				return false;
		
		}

		/**
		 * Metodo para desconectarse
		 */
		public function disconnect() {

			mysql_close($this->connection);

		}

		/**
		 * Devuelve el estado de la conexión
		 * @return connection
		 */
		public function getConnectionInfo() {
			
			return $this->connection;

		}

		/**
		 * Devuelve la respuesta de la base
		 * @return response 
		 */
		public function getResponse() {
			
			return $this->response;

		}
		
		/**
		 * Ejecuta una query Insert, Delete, Update
		 * @sql String con la query a ejecutar en la base
		 * @return Boolean 
		 *		@true si el comando se ejecuto con exito
		 * 		@false si el comando no se pudo ejecutar correctamente
		 */
		public function executeIDU($sql) {

			$response = mysql_query($sql);
			$this->response = $response;

			if ($response) {
				return true;
			} else {
				return false;
			}

		}
		
		/**
		 * Ejecuta una query select
		 * @sql String con la query a ejecutar en la base
		 * @return Assciative Array() con los registros encontrados
		 */
		public function executeSelect($sql) {

			$response = mysql_query($sql);
			$this->response = $response;
			
			return $this->resultToArray();

		}
		
		/**
		 * Procesa el valor devuelto por la DB luego de la consulta
		 * y obtiene un Array associativo
		 * @return Associative Array()
		 */
		private function resultToArray() {

            $lista = array();
            $i = 0;

			if($this->response) {

	            while ($fila = mysql_fetch_assoc($this->response)) {
	                $lista[$i] = $fila;
	                $i = $i + 1;
	            }

			}

            return $lista;
		
		}

		// Inicia una transaccion
        public function beginTransaction() {

            mysql_query("SET AUTOCOMMIT=0");
            mysql_query("START TRANSACTION");

        }

        // Acepta una transaccion
        public function commit() {
        
            mysql_query("COMMIT");
            mysql_query("SET AUTOCOMMIT=1");
        
        }

        // Vuelve al estado anterior en una transaccion
        public function rollBack() {

            mysql_query("ROLLBACK");
            mysql_query("SET AUTOCOMMIT=1");
        
        }
	
	}

?>