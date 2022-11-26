<?php 
	if(isset($_SERVER['HTTP_REFERER'])){
		header("Location: ".$_SERVER['HTTP_REFERER']);
		exit;
	}else{
		header("Location: http://www.wabbo.es/client");
		exit;
	}


?>

