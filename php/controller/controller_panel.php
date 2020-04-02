<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
//Model call
require_once(dirname(__DIR__)."/model/model_panel.php");

//ajax
if(isset($_REQUEST['validate']))
{
	$add_prod= new Controller_panel();
	$add_prod->validate_plate();
}

class Controller_panel
{
	private $model;

	function __construct() 
	{
		$this->model = new Model_panel();
	}
	//validate plate
	function validate_plate()
	{
		$data = $_POST['parametros'];
		$ind=substr($data['plate'], -1);
		$days = array('Sunday','Monday','Mars','Wednesday','Thursday','Friday','Saturday');
		if(date('N', strtotime($data['dat']))==7)
		{
			$dat = $days[0];
		}
		else
		{
			$dat = $days[date('N', strtotime($data['dat']))];
		}
		echo '<div class="row"><label  class="col-sm-5 control-label"> Type vehicule: '.$data['vehicle_type'].' </label></div>';
		echo '<div class="row"><label  class="col-sm-5 control-label"> Terminal: '.$ind.' </label></div>';
		echo '<div class="row"><label  class="col-sm-5 control-label"> Day: '.$dat.' </label></div>';
		//check range by day and time
		echo $this->is_rank($ind, $dat, $data['hour']);
		
	}
	function is_rank($ind, $dat, $hour_)
	{
		$from = '7:00:00'; 
		$to = '9:30:00';
		$from1 = '14:00:00'; 
		$to1 = '19:30:00';
		$n_c='<div class="row"><label  class="col-sm-5 control-label" style="color: red"> you cannot circulate </label></div>';
		$c='<div class="row"><label  class="col-sm-5 control-label" style="color: green"> you cannot circulate </label></div>';
		//Sunday,Saturday
		if($dat=='Sunday' OR $dat=='Saturday')
		{
			echo $c;
		}
		//Monday
		if($dat=='Monday' )
		{
			if($ind==1 or $ind==2)
			{
				$hour=$this->within_time($from, $to, $hour_);
				if($hour==1)
				{
					echo $n_c;
				}
				else
				{
					$hour=$this->within_time($from1, $to1, $hour_);
					if($hour==1)
					{
						echo $n_c;
					}
					else
					{
						echo $c;
					}
				}
			}
			else
			{
				echo $c;
			}
		}
		//Mars
		if($dat=='Mars' )
		{
			if($ind==3 or $ind==4)
			{
				$hour=$this->within_time($from, $to, $hour_);
				if($hour==1)
				{
					echo $n_c;
				}
				else
				{
					$hour=$this->within_time($from1, $to1, $hour_);
					if($hour==1)
					{
						echo $n_c;
					}
					else
					{
						echo $c;
					}
				}
			}
			else
			{
				echo $c;
			}
		}
		//Wednesday
		if($dat=='Wednesday' )
		{
			if($ind==5 or $ind==6)
			{
				$hour=$this->within_time($from, $to, $hour_);
				if($hour==1)
				{
					echo $n_c;
				}
				else
				{
					$hour=$this->within_time($from1, $to1, $hour_);
					if($hour==1)
					{
						echo $n_c;
					}
					else
					{
						echo $c;
					}
				}
			}
			else
			{
				echo $c;
			}
		}
		//Thursday
		if($dat=='Thursday' )
		{
			if($ind==7 or $ind==8)
			{
				$hour=$this->within_time($from, $to, $hour_);
				if($hour==1)
				{
					echo $n_c;
				}
				else
				{
					$hour=$this->within_time($from1, $to1, $hour_);
					if($hour==1)
					{
						echo $n_c;
					}
					else
					{
						echo $c;
					}
				}
			}
			else
			{
				echo $c;
			}
		}
		//Friday
		if($dat=='Friday' )
		{
			if($ind==9 or $ind==0)
			{
				$hour=$this->within_time($from, $to, $hour_);
				if($hour==1)
				{
					echo $n_c;
				}
				else
				{
					$hour=$this->within_time($from1, $to1, $hour_);
					if($hour==1)
					{
						echo $n_c;
					}
					else
					{
						echo $c;
					}
				}
			}
			else
			{
				echo $c;
			}
		}
	}
	function within_time($hms_ini, $hms_end, $hms_ref=NULL)
	{ 
		if( is_null($hms_ref) ){
			$hms_ref = date('G:i:s');
		}

		list($h, $m, $s) = array_pad(preg_split('/[^\d]+/', $hms_ini), 3, 0);
		$s_ini = 3600*$h + 60*$m + $s;

		list($h, $m, $s) = array_pad(preg_split('/[^\d]+/', $hms_end), 3, 0);
		$s_end = 3600*$h + 60*$m + $s;

		list($h, $m, $s) = array_pad(preg_split('/[^\d]+/', $hms_ref), 3, 0);
		$s_ref = 3600*$h + 60*$m + $s;

		if($s_ini<=$s_end){
			return $s_ref>=$s_ini && $s_ref<=$s_end;
		}else{
			return $s_ref>=$s_ini || $s_ref<=$s_end;
		}
	}
}

?>
