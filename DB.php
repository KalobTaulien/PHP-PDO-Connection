<?php 

class DB 
{
 
	/**
	 *  @var object $connection 		Holds the MySQLi object
	 */
	protected static $connection;
	
	/**
	 *  @brief               Connect to the database 
	 */
	private function __construct() {
		 
		try {

			// Below is a localhost connection
			self::$connection	= new PDO( 'mysql:charset=utf8mb4;mysql:host=localhost;dbname=DATABASE.NAME', 'DATABASE.USER', 'DATABASE.PASSWORD' );
			
			// Below is a sample connection to an AWS RDS database. 
			// self::$connection = new PDO( 'mysql:charset=utf8mb4;host=AWS.RDS.URI.HERE;port=3306;dbname=DATABASE.NAME', 'DATABASE.USER', 'DATABASE.PASSWORD' );

			// Set PDO attributes.
			self::$connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			self::$connection->setAttribute( PDO::ATTR_PERSISTENT, false );
			
		} catch (PDOException $e) {
			echo "Could not connect to database. Message below<hr />";
			echo $e->getMessage();
			exit;
		}
	 
	}
	 
	/**
	 *  @return             Return the database Object 
	 */
	public static function getConnection() {

		// If this instance was not been started, start it. 
		if (!self::$connection) {
			new DB();
		}
		 
		// Return the writeable db connection 
		return self::$connection;
	}
	
}

?>
