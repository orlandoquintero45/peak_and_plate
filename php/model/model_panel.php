<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once(dirname(__DIR__)."/db/db.php");
//echo dirname(__DIR__,3);
@session_start(); 
/**
 * 
 */
class Model_panel
{
	private $conn;
	function __construct() 
	{
		$this->conn = new Connect();
	}
	
}
?>

