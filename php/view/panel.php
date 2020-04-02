<?php
/**
 * Autor: Orlando quintero.
 * 
 * 
 */

error_reporting(E_ALL);
ini_set('display_errors', '1');
$_SESSION['autentificado'] = "VERDADERO";
$_SESSION['INGRESO']['Name']="Prueba";
include("check_security.php"); 
require_once("header.php");

require_once("../controller/controller_panel.php");

?>
<!-- class="hold-transition skin-blue sidebar-mini" -->
<body class="skin-blue sidebar-mini sidebar-collapse" id='cargar'>
	<!-- Site wrapper -->
	<div class="wrapper">
		<?php
			//menu
			require_once("menu.php");
		?>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Main content -->
			<section class="content">
				<div id='pdfcom1'>
					<div class="box box-info">
						<div class="box-header with-border">
							<h3 class="box-title">Peak and plate</h3>
						</div>
						<!-- /.box-header -->
						<!-- form start -->
						<form class="form-horizontal" type='post'>
							<div class="box-body">
								<div class="form-group">
									<label for="plate" class="col-sm-2 control-label">Vehicle plate (*)</label>
									<div class="col-sm-10">
										<input type="hidden" id='vehicle_type' name='vehicle_type' value=''>
										<input type="text" class="form-control" onkeypress="return verification(event)" 
										onkeyup="capital_letter(this);" id='plate' name='plate' maxlength="8">
										<div id='e_plate' class="form-group has-error" style='display:none'>
											<span class="help-block">you must add vehicle plate</span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="dat" class="col-sm-2 control-label">Date (*)</label>
									<div class="col-sm-10">
										<input type="date" class="form-control"  id='dat' name='dat' >
										<div id='e_dat' class="form-group has-error" style='display:none'>
											<span class="help-block">you must add date</span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="hour" class="col-sm-2 control-label">Hour (HH:mm:ss)</label>
									<div class="col-sm-5">
										<input type="time" name="hour" id='hour' value="07:00:00" max="23:59:59" min="00:00:00" step="1">
										<div id='e_dat' class="form-group has-error" style='display:none'>
											<span class="help-block">you must add date</span>
										</div>
									</div>
										
								</div>
								<div class="form-group" id='response'>
									
								</div>
							</div>
							<!-- /.box-body -->
							<div class="box-footer">
								<button type="reset" class="btn btn-default">Cancel</button>
								<button type="button" class="btn btn-info pull-right" onclick='verification_plate();'>verification plate</button>
							</div>
							<!-- /.box-footer -->
						</form>
					</div>
					
				</div>
			</section>
		<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="pull-right hidden-xs">
			</div>
			<strong>Copyright &copy;  <a href="#">Orlando Quintero</a>.</strong> All rights reserved.
		</footer>
		<!-- /.control-sidebar -->
		<!-- Add the sidebar's background. This div must be placed
			immediately after the control sidebar -->
		<div class="control-sidebar-bg"></div>
	</div>
	<!-- ./wrapper -->

</body>
</html>
<script>
//Convert capital letter
function capital_letter(e) 
{
	var plate=document.getElementById('plate').value;
	if(plate.length<4)
	{
		e.value = e.value.toUpperCase();
	}
}
//verification from plate
function verification_plate()
{
	var plate=document.getElementById('plate').value;
	var dat=document.getElementById('dat').value;
	var vehicle_type=document.getElementById('vehicle_type').value;
	var hour = document.getElementById('hour').value;
	document.getElementById("e_plate").style.display = "none";
	document.getElementById("e_dat").style.display = "none";
	if (plate=='')
	{
		document.getElementById("e_plate").style.display = "block";	
	}
	if (dat=='')
	{
		document.getElementById("e_dat").style.display = "block";	
	}
	if (plate != '' && dat != '')
	{
		var parametros = 
		{
			"plate" : plate,
			"dat" : dat,
			"vehicle_type" : vehicle_type,
			"hour" : hour
		};
		$.ajax({
			data:  {parametros:parametros},
			url:   '../controller/controller_panel.php?validate=true',
			type:  'post',
			beforeSend: function () {
				$("#response").html("");	
			},
			success:  function (response) {
				$("#response").html(response);
			}
		});
	}
}
//verification format from plate
function verification(e)
{
    var plate=document.getElementById('plate').value;
	if(plate.length==3)
	{
		document.getElementById('plate').value=plate+'-';
	}
	key = e.keyCode || e.which;
	//Province
	if(plate.length==0)
	{
		key1 = String.fromCharCode(key).toUpperCase();
		//alert(tecla);
		letters = "AWQBGSUIPCLYHRJXMKOVTENZ";
		
		if(letters.indexOf(key1)==-1 )
		{
			return false;
		}
	}
	//Vehicle types
	if(plate.length==1)
	{
		key1 = String.fromCharCode(key).toUpperCase();
		letters = "AUZEXM";
		
		if(letters.indexOf(key1)!=-1 )
		{
			if(key1=='A' || key1=='U' || key1=='Z')
			{
				document.getElementById('vehicle_type').value='Taxis';
			}
			if(key1=='E')
			{
				document.getElementById('vehicle_type').value='governments';
			}
			if(key1=='X' )
			{
				document.getElementById('vehicle_type').value='official_use';
			}
			if(key1=='M' )
			{
				document.getElementById('vehicle_type').value='decentralized';
			}
		}
		else
		{
			if(plate=='CC')
			{
				document.getElementById('vehicle_type').value='consulate';
			}
			else
			{
				letters = "BCDFGHIJKLNOPQRSTVWXY";
				if(letters.indexOf(key1)!=-1 )
				{
					document.getElementById('vehicle_type').value='normal';
				}
				else
				{
					return false;
				}
			}
		}
	}
	if(plate.length==2)
	{
		letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		if(letters.indexOf(key1)==-1 )
		{
			return false;
		}
	}
	if(plate.length>=3 )
	{
		return (key >= 48 && key <= 57);
	}
	
}
</script>
