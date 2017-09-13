<?php

if (isset ($_GET['percent'])) {
	
	shell_exec("amixer sset PCM ".$_GET['percent']."%");
}


?> 
