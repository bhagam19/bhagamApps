<?php
$allowedExts = array("gif", "jpeg", "jpg", "png");
$extension = end(explode(".", $_FILES["imagen"]["name"]));


if ((($_FILES["imagen"]["type"] == "image/gif")
	|| ($_FILES["imagen"]["type"] == "image/jpeg")
	|| ($_FILES["imagen"]["type"] == "image/jpg")
	|| ($_FILES["imagen"]["type"] == "image/png"))
	&& ($_FILES["imagen"]["size"] < 2000000)
	&& in_array($extension, $allowedExts)){
		if ($_FILES["imagen"]["error"] > 0){
			echo "Return Code: " . $_FILES["imagen"]["error"] . "<br>";
		}else{
			echo "Upload: " . $_FILES["imagen"]["name"] . "<br>";
			echo "Type: " . $_FILES["imagen"]["type"] . "<br>";
			echo "Size: " . ($_FILES["imagen"]["size"] / 1024) . " kB<br>";
			echo "Temp file: " . $_FILES["imagen"]["tmp_name"] . "<br>";

			if (file_exists("../portadas/" . $_FILES["imagen"]["name"])){
				echo $_FILES["imagen"]["name"] . " already exists. ";
			}else{
				move_uploaded_file($_FILES["imagen"]["tmp_name"],
				"../portadas/" . $_FILES["imagen"]["name"]);
				echo "Stored in: " . "../portadas/" . $_FILES["imagen"]["name"];
		  }
		}
}else{
	echo "Invalid file";
}	
?>