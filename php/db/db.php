<?php
require_once("config.php");
if(!isset($_SESSION)) 
	{ 		
			session_start();
	}
class Connect{
    public  function connection()
	{
		$server=server;
		$db=database;
		$user=user_;
		$pass=pass;
		$port=port;
		$connection=new mysqli($server.":".$port, $user, $pass, $db);
		$connection->query("SET NAMES 'utf8'");
		return $connection;
       
    }
	public  function encryption($string){
		$output=FALSE;
		$key=hash('sha256', SECRET_KEY);
		$iv=substr(hash('sha256', SECRET_IV), 0, 16);
		$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
		$output=base64_encode($output);
		return $output;
	}
	public  function decryption($string){
		$key=hash('sha256', SECRET_KEY);
		$iv=substr(hash('sha256', SECRET_IV), 0, 16);
		$output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
		return $output;
	}
}
?>
