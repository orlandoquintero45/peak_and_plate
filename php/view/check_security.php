<?php
if(!isset($_SESSION)) 
{	
	session_start();
	if (isset($_SESSION['autentificado']) != "VERDADERO") 
	{
		if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) 
		{
			$uri = 'https://';
		}
		else
		{
			$uri = 'http://';
		}
		$uri .= $_SERVER['HTTP_HOST'];
		echo "<script type='text/javascript'>window.location='".$uri."/peak_and_plate/php/view/login.php'</script>";
		exit(); 
	}
	else
	{
		//basic variables
		if (!isset($_SESSION['INGRESO']['url'])) 
		{
			if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) 
			{
				$uri = 'https://';
			}
			else
			{
				$uri = 'http://';
			}
			$uri .= $_SERVER['HTTP_HOST'];
			$_SESSION['INGRESO']['url']=$uri;
		}
	}
		
}
else
{
	if (isset($_SESSION['autentificado']) != "VERDADERO") 
	{ 
		if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS']))
		{
			$uri = 'https://';
		}
		else
		{
			$uri = 'http://';
		}
		$uri .= $_SERVER['HTTP_HOST'];
		echo "<script type='text/javascript'>window.location='".$uri."/peak_and_plate/php/view/login.php'</script>";
		exit(); 
	}
	else
	{
		//basic variables
		if (!isset($_SESSION['INGRESO']['url'])) 
		{
			if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) 
			{
				$uri = 'https://';
			}
			else
			{
				$uri = 'http://';
			}
			$uri .= $_SERVER['HTTP_HOST'];
			$_SESSION['INGRESO']['url']=$uri;
		}
	}		
} 

?>
