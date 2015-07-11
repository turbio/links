<?php

class DB
{
	public $db_handle;
	
	public function __construct()
	{
		$config = $this->get_config();
		try {
			
			$this->db_handle = new PDO(
				'mysql:host='
				. $config[ 'host' ]
				. ';dbname='
				. $config[ 'name' ],
				$config[ 'user' ],
				$config[ 'pass' ],
				array( PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING )
			);
			
		} catch ( PDOException $exception ) {
			
			echo 'Connection failed: ', $exception->getMessage();
			
		}
	}
	
	private function get_config()
	{
		return require( 'config/database.php' );
	}
	
	public function query( $query )
	{
		$results = array();
		
		try {
			
			return $this->db_handle->query( $query );
			
		} catch ( PDOException $exception ) {
			
			echo 'Database Error: ' . $exception->getMessage();
			
		}
		
		return $results;
	}
}
