<?php
	session_name("SINSIMAT");
	session_start();
	if(isset($_SESSION['usuario'])){
		session_destroy();
		echo 
			"<html>
				<head>
					<meta HTTP-equiv='REFRESH' content='0;url=../../../index.php'>
				</head>
			</html>";
	}
?>