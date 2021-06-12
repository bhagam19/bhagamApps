<?php
$allowedExts = array("gif", "jpeg", "jpg", "png","JPG","JPEG");
@$extension = end(explode(".", $_FILES["imagen"]["name"]));
$directorio="../images/";
echo "Nombre: ".$nombre."<br>";
if ((($_FILES["imagen"]["type"] == "image/gif")
	|| ($_FILES["imagen"]["type"] == "image/JPG")
	|| ($_FILES["imagen"]["type"] == "image/PJPEG")
	|| ($_FILES["imagen"]["type"] == "image/jpeg")
	|| ($_FILES["imagen"]["type"] == "image/jpg")
	|| ($_FILES["imagen"]["type"] == "image/png"))
	&& ($_FILES["imagen"]["size"] < 2097152) //10 megas
	&& in_array($extension, $allowedExts)){	
		if ($_FILES["imagen"]["error"] > 0){
			echo "Return Code: " . $_FILES["imagen"]["error"] . "<br>";
		}else{
			echo "Upload: " . $_FILES["imagen"]["name"] . "<br>";
			echo "Type: " . $_FILES["imagen"]["type"] . "<br>";
			echo "Size: " . ($_FILES["imagen"]["size"] / 1024) . " kB<br>";
			echo "Temp file: " . $_FILES["imagen"]["tmp_name"] . "<br>";

			if (file_exists($directorio . $_FILES["imagen"]["name"])){
				echo $_FILES["imagen"]["name"] . " already exists. ";
			}else{ 
				if($nombre=="" || $nombre=="Nombre"){
					move_uploaded_file($_FILES["imagen"]["tmp_name"],
					$directorio . $_FILES["imagen"]["name"]);
					echo "Stored in: " . $directorio . $_FILES["imagen"]["name"];
				}else{
					move_uploaded_file($_FILES["imagen"]["tmp_name"],
					$directorio . $nombre.".".$extension);
					echo "Stored in: " . $directorio . $nombre .".". $extension;				
				}
		  }
		}
}else{
	echo "Invalid file";
}	
?>