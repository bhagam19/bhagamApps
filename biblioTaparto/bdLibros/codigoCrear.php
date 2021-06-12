<?php

function crearCodigo(){
		global $codigo, $coleccion, $apellidoAutor, $especialidad, $titulo,
				$materia, $volumen, $ejemplar;
		global $codigo1, $codigo2, $cutter1,$cutter2,$cutter3,$cutter4,$cutter5;
		//Primera cifra, la primera letra del apellido
		$cutter1=substr($apellidoAutor, 0, 1);
		//Segunda Cifra
		//Si primera letra termina en vocal se mira la segunda letra.
		switch($cutter1){
			case "A":
			case "E":
			case "I":
			case "O":
			case "U":
				switch(substr($apellidoAutor, 1, 1)){
					case "a":
					case "b":
					case "c":
						$cutter2=2;
						break;
					case "d":
					case "e":
					case "f":
					case "g":
					case "h":
					case "i":
					case "j":
					case "k":
						$cutter2=3;
						break;
					case "l":
					case "m":
						$cutter2=4;
						break;
					case "n":
					case "ñ":
					case "o":
						$cutter2=5;
						break;
					case "p":
					case "q":
						$cutter2=6;
						break;
					case "r":
						$cutter2=7;
						break;
					case "s":
					case "t":
						$cutter2=8;
						break;
					case "u":
					case "v":
					case "w":
					case "x":
					case "y":
					case "z":
						$cutter2=9;
						break;
				}
				break;
			//Si primera letra del apellido termina en "S"
			case "S":
				switch(substr($apellidoAutor, 1, 1)){
					case "a":
					case "b":
						$cutter2=2;
						break;
					case "c":
					case "d":
						$cutter2=3;
						break;
					case "e":
					case "f":
					case "g":
						$cutter2=4;
						break;
					case "h":
					case "i":
					case "j":
					case "k":
					case "l":
						$cutter2=5;
						break;	
					case "m":
					case "n":
					case "ñ":
					case "o":
					case "p":
					case "q":
					case "r":
					case "s":
						$cutter2=6;
						break;
					case "t":
						$cutter2=7;
						break;
					case "u":
						$cutter2=8;
						break;
					case "v":
					case "w":
					case "x":
					case "y":
					case "z":
						$cutter2=9;
						break;
				}
				break;
			//Si primer cifra termina en "Q"	
			case "Q":	
				$cutter2=substr($apellidoAutor, 1, 1);
				break;
			//Si primera cifra termina en cualquier otra letra.
			default:
				switch(substr($apellidoAutor, 1, 1)){
				case "a":
					$cutter2=3;
					break;
				case "e":
					$cutter2=4;
					break;
				case "i":
					$cutter2=5;
					break;
				case "o":
					$cutter2=6;
					break;
				case "r".
					$cutter2=7;
					break;
				case "u":
					$cutter2=8;
					break;
				case "y":
					$cutter2=9;
					break;
				}
				break;
		}
		// Tercera cifra, tercera letra del apellido		
		switch(substr($apellidoAutor, 2, 1)){
			case "a":
			case "b":
			case "c":
			case "d":
				$cutter3=3;
				break;
			case "e":
			case "f":
			case "g":
			case "h":
				$cutter3=4;
				break;
			case "i":
			case "j":
			case "k":
			case "l":
				$cutter3=5;
				break;
			case "m":
			case "n":
			case "ñ":
			case "o":
				$cutter3=6;
				break;
			case "p":
			case "q":
			case "r":
			case "s":
				$cutter3=7;
				break;
			case "t":
			case "u":
			case "v":
				$cutter3=8;
				break;
			case "w":
			case "x":
			case "y":
			case "z":
				$cutter3=9;
				break;
		}	
		//Cuarta cifra: Se toma del título del libro:
		if(substr($titulo,0,3)=="La "||substr($titulo,0,3)=="El "){
			switch(substr($titulo,3,1)){
				case "a":
				case "b":
				case "c":
					$cutter4=1;
					break;
				case "d":
				case "e":
				case "f":
					$cutter4=2;
					break;
				case "g":
				case "h":
				case "i":
					$cutter4=3;
					break;
				case "j":
				case "k":
				case "l":
					$cutter4=4;
					break;
				case "m":
				case "n":
				case "ñ":
					$cutter4=5;
					break;
				case "o":
				case "p":
				case "q":
					$cutter4=6;
					break;
				case "r":
				case "s":
				case "t":
					$cutter4=7;
					break;
				case "u":
				case "v":
				case "w":
					$cutter4=8;
					break;
				case "x":
				case "y":
				case "z":
					$cutter4=9;
					break;
			}
		
		}else{
			switch(substr($titulo,0,1)){
				case "A":
				case "B":
				case "C":
					$cutter4=1;
					break;
				case "D":
				case "E":
				case "F":
					$cutter4=2;
					break;
				case "G":
				case "H":
				case "I":
					$cutter4=3;
					break;
				case "J":
				case "K":
				case "L":
					$cutter4=4;
					break;
				case "M":
				case "N":
				case "Ñ":
					$cutter4=5;
					break;
				case "O":
				case "P":
				case "Q":
					$cutter4=6;
					break;
				case "R":
				case "S":
				case "T":
					$cutter4=7;
					break;
				case "U":
				case "V":
				case "W":
					$cutter4=8;
					break;
				case "X":
				case "Y":
				case "Z":
					$cutter4=9;
					break;
			}
		}
		//Quinta cifra: Se toma del título del libro:
		if(substr($titulo,0,3)=="La "||substr($titulo,0,3)=="El "){
			switch(substr($titulo,4,1)){
				case "a":
				case "b":
				case "c":
					$cutter5=1;
					break;
				case "d":
				case "e":
				case "f":
					$cutter5=2;
					break;
				case "g":
				case "h":
				case "i":
					$cutter5=3;
					break;
				case "j":
				case "k":
				case "l":
					$cutter5=4;
					break;
				case "m":
				case "n":
				case "ñ":
					$cutter5=5;
					break;
				case "o":
				case "p":
				case "q":
					$cutter5=6;
					break;
				case "r":
				case "s":
				case "t":
					$cutter5=7;
					break;
				case "u":
				case "v":
				case "w":
					$cutter5=8;
					break;
				case "x":
				case "y":
				case "z":
					$cutter5=9;
					break;
			}
		
		}else{
			switch(substr($titulo,1,1)){
				case "a":
				case "b":
				case "c":
					$cutter5=1;
					break;
				case "d":
				case "e":
				case "f":
					$cutter5=2;
					break;
				case "g":
				case "h":
				case "i":
					$cutter5=3;
					break;
				case "j":
				case "k":
				case "l":
					$cutter5=4;
					break;
				case "m":
				case "n":
				case "ñ":
					$cutter5=5;
					break;
				case "o":
				case "p":
				case "q":
					$cutter5=6;
					break;
				case "r":
				case "s":
				case "t":
					$cutter5=7;
					break;
				case "u":
				case "v":
				case "w":
					$cutter5=8;
					break;
				case "x":
				case "y":
				case "z":
					$cutter5=9;
					break;
			}
		}	
		
		$cutterCode=$cutter1.$cutter2.$cutter3.".".$cutter4.$cutter5;
		$codigo1="- ".substr($coleccion,0,1)." -<br>".substr($especialidad,0,3)."<br>".
				$cutterCode."<br>Vol.".$volumen." - Ej.".$ejemplar;
		$codigo2="- ".substr($coleccion,0,1)." - <br>".substr($materia,0,3)."<br>".
				$cutterCode."<br>Vol.".$volumen." - Ej.".$ejemplar;
		
		if($especialidad=""){
			$codigo=$codigo1;			
		}else{
			$codigo=$codigo2;
		}		
	}
	
	crearCodigo();

?>