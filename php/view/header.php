<?php
/**
 * Autor: Orlando quintero.
 * 
 * 
 */

error_reporting(E_ALL);
ini_set('display_errors', '1');

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>peak and plate</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="../../lib/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="../../lib/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="../../lib/bower_components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="../../lib/dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
	   folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="../../lib/dist/css/skins/_all-skins.min.css">
	<link rel="shortcut icon" href="../../../img/jpg/logo.jpg" />
  


	<link rel="stylesheet" href="../../lib/bower_components/jquery-ui/themes/base/jquery-ui.css">


	<!-- jQuery 3 -->
	<script src="../../lib/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="../../lib/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- Select2 -->
	<script src="../../lib/bower_components/select2/dist/js/select2.full.min.js"></script>
	<!-- InputMask -->
	<script src="../../lib/plugins/input-mask/jquery.inputmask.js"></script>
	<script src="../../lib/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
	<script src="../../lib/plugins/input-mask/jquery.inputmask.extensions.js"></script>
	<!-- date-range-picker -->
	<script src="../../lib/bower_components/moment/min/moment.min.js"></script>
	<script src="../../lib/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script src="../../lib/bower_components/jquery-ui/jquery-ui.js"></script>

	<!-- bootstrap datepicker -->

	<!-- bootstrap color picker -->
	<script src="../../lib/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
	<!-- bootstrap time picker -->
	<script src="../../lib/plugins/timepicker/bootstrap-timepicker.min.js"></script>
	<!-- SlimScroll -->
	<script src="../../lib/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<!-- iCheck 1.0.1 -->
	<script src="../../lib/plugins/iCheck/icheck.min.js"></script>
	<!-- FastClick -->
	<script src="../../lib/bower_components/fastclick/lib/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="../../lib/dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="../../lib/dist/js/demo.js"></script>
  
	<link rel="stylesheet" href="../../lib/dist/css/sweetalert.css">
	<script src="../../lib/dist/js/sweetalert-dev.js"></script>
  
	<script src="../../lib/dist/js/sweetalert2.min.js"></script>
	<script type="text/javascript" src="../../lib/dist/js/typeahead.js"></script>
	<link rel="stylesheet" href="../../lib/dist/css/sweetalert2.min.css">
 

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<script>
		function sleep(ms) {
		  return new Promise(resolve => setTimeout(resolve, ms));
		}
		async function empezar() {
			$('#cargar').css('cursor', 'wait');
			await sleep(2000);
		}
		async function parar() {
			$('#cargar').css('cursor', 'default');
		}
	</script>
	<script>
		$(document).ready(function () {
		$('.sidebar-menu').tree()
		})
	</script>
	<script>
		function readCookie(name) {

		  var nameEQ = name + "="; 
		  var ca = document.cookie.split(';');

		  for(var i=0;i < ca.length;i++) {

			var c = ca[i];
			while (c.charAt(0)==' ') c = c.substring(1,c.length);
			if (c.indexOf(nameEQ) == 0) {
			  return decodeURIComponent( c.substring(nameEQ.length,c.length) );
			}

		  }

		  return null;

		}
	</script>
</head>
