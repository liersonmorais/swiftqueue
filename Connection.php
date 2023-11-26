<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Connection{
	private $host;
	private $db;
	private $user;
	private $pass;
	private $conn;
	
	public function __construct(){
        $this->host = 'localhost';
		$this->db   = 'MyDb';
		$this->user = 'root';
		$this->pass = '';
		$this->connection();
	}

	public function connection(){
		// connects with database
		$conn_string = "host=" 			. $this->host;
		$conn_string .= " port=5432";
		$conn_string .= " dbname="    . $this->db;
		$conn_string .= " user=" 		. $this->user;
		$conn_string .= " password=" 	. $this->pass;
		$conn_string .= ' connect_timeout=5';

		// connection reply to attribute $conn;
		$this->conn = pg_connect($conn_string) or die('Error to establish connection:' . pg_last_error());

	}
	
	public function select($sql){
		// managfes a select clause
		$ret = pg_query($this->conn, $sql);

      if(!$ret){
         $result = pg_last_error($this->conn);
      } else {
         $result = pg_fetch_all($ret);
      }

		return $result;
	}

	public function sql($sql){
		// any request and returns success or error
		$ret 	   = pg_query($this->conn, $sql);
		$result  = pg_affected_rows($ret);

		if($result > 0){
			return true;
		}else{
			return false;
		}
	}
	
}