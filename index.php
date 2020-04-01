<?php 

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
	echo "<script type='text/javascript'>window.location='".$uri."/peak_and_plate/php/view/panel.php'</script>"; 
	exit(); 
}