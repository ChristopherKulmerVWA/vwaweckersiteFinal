<?php

$CurrentVolume= shell_exec("amixer sget PCM");
$VolumeArray= explode("[",$CurrentVolume);
$substringVolume= substr($VolumeArray[1],0,3);

$CurrentVolume= "";
if($substringVolume[2]=='%')

{
	$CurrentVolume= substr($substringVolume,0,2);
	}
else if( $SubstringVolume[1]=='%')
{
		$CurrentVolume= substr($substringVolume,0,1);

	}
else
 {
		$CurrentVolume= "100";

	}



?>
<!doctype html>
<html>
	
	<head>
		<! <meta http-equiv="refresh" content="5">
		 <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
    
  
		
		<title>rPi</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<!-- Slidebars CSS -->
		<link rel="stylesheet" href="slidebars/slidebars.css">
		
		<!-- Example Styles -->
		<link rel="stylesheet" href="style.css">
			<script src="js/jquery.js"></script>
<script src="js/fader.js"></script>

	</head>
	
	<body>	
		
		<style>
		h9{
			
			font-family: 'Anton', sans-serif;
			  //  text-shadow: -1px 0 #696969, 0 1px #696969, 1px 0 #696969, 0 -1px #696969;

	}
	body {
	
	 
   
	font-family: 'Anton', sans-serif;
	
}
		
		
		
		</style>
		<div id="sb-site">
		

		<div id="header">
	<div class="headerleft">
	<div class="headerleftInner">	<img class="sb-toggle-left" style="width:25px;"src="slidebars/menu.png">
	</div>	</div>	
	<div class="headercontainer">
	<div class="headerlogoInner"></div>
	</div>
	<div style="float:right;margin-top:-4px;"><span style="font-size:25px;font-weight:600;padding-right:15px;"id="hours"></span></font></div>
	</div>
	
				<div id="content">
	<div id="contentStart" style="display:none;">
		
		
		
			
		
		
	<h9>	<h1>Raspberry Pi Radiowecker</h1>
<span style="font-size:20px;color:00ff00;" id="addedalert"></span></a>
<br>

<br>
<div onClick="Weckerstellen()" class="backbox">
   Set Alarm</a> </div>


<div onClick="Ausschalten()" class="backbox">
   Pause Radio</a> </div>


	
	

Lautstärke:

</h9>


<h9>

<input type="range" min="0" max="100" value="<?php echo $CurrentVolume; ?>"  step="1" onchange="Volume(this.value)" />
<span id=     "range"><?php echo $CurrentVolume; ?>%</span>
<br>
<br>
Currently playing:
<br>

<?php
$mpccurrent= "mpc current";


	
$song= shell_exec($mpccurrent);



echo "$song"





?>
</div>

	<div id="contentInner" style="display:none;">
   <div>
		<div id="alarmset"> </div>
    </div>
	<h9> Wecker stellen </h9>  <br>
			
		<h9> Stunde</h9>
		
	
<input id="hour_id" type="text" style="height:20px;margin-bottom:5px;" name="hour"><br>

 <h9> Minuten </h9>

<input id="mins_id" type="text" style="height:20px;" name="mins"><br><br>

<!   SCHRIFTART ANPASSEN>

  
  
  <div onClick="Wecker()" class="backbox">
   Set Alarm</a> </div>
  
  
  
 <div onClick="Start()" class="backbox">
	 
	 
	 <h9>
Home     </h9></a>
</div>
</h9>






		</div>
		<div class="sb-slidebar sb-left sb-style-push">
			<!-- Your left Slidebar content. -->
			
			<h9><p>Debugging and Tools</p>
			
<div onClick="VtClock()" class="backbox2"> 
	Uhr Starten </a>
	</div>
	<div onClick="TurnRadioOn()" class="backbox2"> 
	Radio Starten </a>
	</div>
	<div onClick="SetRadioA()" class="backbox2"> 
	DanceRadioUK </a>
	</div>
	<div onClick="SetRadioB()" class="backbox2"> 
	BoxUK </a>
	</div>
		
	
	<div onClick="window.location.href='http://192.168.1.251:6680/iris'" class="backbox2">
	Spotify Frontend </a></div>
	
	<br>
	<br>
	<br>
	<br>	
	<br>
	<br>
	<br>
	
	
	<div onClick="RestartPi()" class="backbox3">
		Neustarten
	</div>
	
	<div onClick="ShutDownPi()" class="backbox3">
		Herunterfahren
	</div>
	

		</div>
	
				</div>	

		</h9>
		<!-- Slidebars -->
		<script src="slidebars/slidebars.min.js"></script>
		<script>
			(function($) {
				$(document).ready(function() {
					$.slidebars();
				});
			}) (jQuery);
		</script>
		<script type="text/javascript">
$('#contentStart').delay(1000).fadeIn(1000);

function Weckerstellen() {
$('#contentStart').fadeOut(290);
$('#contentInner').delay(300).fadeIn();
}

function Start() {
$('#contentInner').fadeOut(290);
$('#contentStart').delay(300).fadeIn();
}



function Ausschalten() {
    $.get("Ausschalten.php");
    return false;
}
function Wecker() {
   var mins=  document.getElementById("mins_id").value;
  var hour=  document.getElementById("hour_id").value;
   	if(mins == "" || hour== "")
   	{
		alert("check input");
	}
	
	else{
   	
  var command="wecker.php?mins="+mins+"&hour="+hour;
  
 
  var adresse =window.location.href;
 
var shortadress= adresse.substring(0,adresse.length);

window.location.href=shortadress+command;
 
      
    
}

}


function SetRadioA() {
    $.get("SetRadioA.php");
    return false;
}

function SetRadioB() {
    $.get("SetRadioB.php");
    return false;
}




function Volume(percent) {
	
	$.get("Volume.php?percent="+percent);
	document.getElementById("range").innerHTML=percent+'%';
}

function TurnRadioOn() {
	$.get("TurnRadioOn.php");
	return false;
}
function ShutDownPi() {
	$.get("ShutDownPi.php");
	
	
}

function RestartPi() {
	$.get("RestartPi.php");
				
}


 



obj_hours=document.getElementById("hours");


function wr_hours()
{
    time=new Date();

    time_min=time.getMinutes();
    time_hours=time.getHours();

    time_wr=((time_hours<10)?"0":"")+time_hours;
    time_wr+=":";
    time_wr+=((time_min<10)?"0":"")+time_min;

    obj_hours.innerHTML=time_wr;

}

setInterval("wr_hours();",1000);
</script>
	</body>
</html>
