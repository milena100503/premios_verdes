<?php  
	require_once "global.php";
	/**
	Conexion con la db.  
	 */
	class Connection{
		protected $conn;

		public function __construct(){
			$this->conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
			$this->conn->set_charset("utf8");
			
			//verfica error en la conexion
			if(mysqli_connect_errno()){
				printf("Fallo la conexion con la BD: %s\n", mysql_connect_error());
				exit();
			}
		}

		public function getConnection(){
			return $this->conn;
		}

		

	}
?>