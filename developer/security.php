<?php
	
	session_start();
	if(isset($_SESSION["SISSALUD_session"])){
		
	}else{
		header("Location: ../login/");
	}

?>
