var areas=new Array("0-Computadoras, información y generales","1-Filosofía y psicología","2-Religión","3-Ciencias sociales","4-Lingüistica","5-Ciencia y matemáticas","6-Tecnología","7-Arte y recreación","8-Literatura","9-Historia y geografía");
var materias_0 = new Array("010 Bibliografía","020 Bibliotecología e informática","030 Enciclopedias generales","040 Este número no tiene ningún uso.","050 Publicaciones en serie","060 Organizaciones y museografía","070 Periodismo, editoriales, diarios","080 Colecciones generales","090 Manuscritos y libros raros");
var materias_1 = new Array("110 Metafísica","120 Conocimiento, causa, fin, hombre","130 Parapsicología, ocultismo","140 Puntos de vista filosóficos","150 Psicología","160 Lógica","170 Ética (Filosofía moral)","180 Filosofía antigua, medieval, oriental","190 Filosofía moderna occidental");
var materias_2 = new Array("210 Religión natural","220 Biblia","230 Teología cristiana","240 Moral y práctica cristianas","250 Iglesia local y órdenes religiosas","260 Teología social y eclesiología","270 Historia y geografía de la iglesia","280 Credos de la iglesia cristiana","290 Otras religiones");
var materias_3 = new Array("310 Estadística","320 Ciencia política","330 Economía","340 Derecho","350 Administración pública","360 Patología y servicio sociales","370 Educación","380 Comercio","390 Costumbres y folklore");
var materias_4 = new Array("410 Lingüística","420 Inglés y anglosajón","430 Lenguas germánicas; alemán","440 Lenguas romances; francés","450 Italiano, rumano, rético","460 Español y portugués","470 Lenguas itálicas; latín","480 Lenguas helénicas; griego clásico","490 Otras lenguas");
var materias_5 = new Array("510 Matemáticas","520 Astronomía y ciencias afines","530 Física","540 Química y ciencias afines","550 Geociencias","560 Paleontología","570 Ciencias biológicas","580 Ciencias botánicas","590 Ciencias zoológicas");
var materias_6 = new Array("610 Ciencias médicas","620 Ingeniería y operaciones afines","630 Agricultura y tecnologías afines","640 Economía doméstica","650 Servicios admin. empresariales","660 Química industrial","670 Manufacturas","680 Manufacturas varias","690 Construcciones");
var materias_7 = new Array("710 Urbanismo y arquitectura del paisaje","720 Arquitectura","730 Artes plásticas; escultura","740 Dibujo, artes decorativas y menores","750 Pintura y pinturas","760 Artes gráficas; grabados","770 Fotografía y fotografías","780 Música","790 Entretenimientos");
var materias_8 = new Array("800 Literatura","810 Literatura americana en inglés","820 Literatura inglesa y anglosajona","830 Literaturas germánicas","840 Literaturas de las lenguas romances","850 Literaturas italiana, rumana","860 Literaturas española y portuguesa","870 Literaturas de las lenguas itálicas","880 Literaturas de las lenguas eslavas","890 Literaturas de otras lenguas");
var materias_9 = new Array("910 Geografía; viajes","920 Biografía y genealogía","930 Historia del mundo antiguo","940 Historia de Europa","950 Historia de Asia","960 Historia de Africa","970 Historia de América del Norte","980 Historia de América del Sur","990 Historia de otras regiones");
var areaConocimiento;
var especialidad_0 = new Array("800 Literatura y retórica","801 Filosofía y teoría","802 Miscelánea","803 Diccionarios y enciclopedias","804 .","805 Publicaciones seriadas","806 Organizaciones y gerencia","807 Educación, investigación, temas relacionados","808 Retórica y colecciones de literatura","809 Historia, descripción, crítica");
var especialidad_1 = new Array("810 Literatura norteamericana en inglés","811 Poesía norteamericana en inglés","812 Teatro norteamericano en inglés","813 Novelística norteamericana en inglés","814 Ensayos norteamericanos en inglés","815 Discursos norteamericanos en inglés","816 Cartas norteamericanas en inglés","817 Humor y sátira norteamericanos en inglés","818 Escritos varios norteamericanos","819 .");
var especialidad_2 = new Array("820 Literatura inglesa e inglesa antigua","821 Poesía inglesa","822 Teatro inglés","823 Novelística inglesa","824 Ensayos ingleses","825 Discursos ingleses","826 Cartas inglesas","827 Humor y sátira ingleses","828 Escritos varios ingleses","829 Literatura inglesa antigüa (anglosajona)");
var especialidad_3 = new Array("830 Literatura de las lenguas germánicas","831 Poesía alemana","832 Teatro alemán","833 Novelística alemana","834 Ensayos alemanes","835 Discursos alemanes","836 Cartas alemanas","837 Humor y sátira alemanes","838 Escritos varios alemanes","839 Otras literaturas germánicas");
var especialidad_4 = new Array("840 Literatura de las lenguas romances","841 Poesía francesa","842 Teatro francés","843 Novelística francesa","844 Ensayos franceses","845 Discursos franceses","846 Cartas francesas","847 Humor y sátira franceses","848 Escritos varios franceses","849 Literaturas provenzal y catalana");
var especialidad_5 = new Array("850 Literaturas italiana, rumana, retorromana","851 Poesía italiana","852 Teatro italiano","853 Novelística italiana","854 Ensayos italianos","855 Discursos italianos","856 Cartas italianas","857 Humor y sátira italianos","858 Escritos varios italianos","859 Literatura portuguesa");
var especialidad_6 = new Array("860 Literatura española y portuguesa","861 Poesía española","862 Teatro español","863 Novelística española","864 Ensayos españoles","865 Discursos españoles","866 Cartas españolas","867 Humor y sátira españoles","868 Escritos varios españoles","869 Literatura portuguesa");
var especialidad_7 = new Array("870 Literaturas itálicas. Literatura latina","871 Poesía latina","872 Poesía y teatro dramáticos latinos","873 Poesía y novelística épicas latinas","874 Poesía lírica latina","875 Discursos latinos","876 Cartas latinas","877 Humor y sátira latinos","878 Escritos varios latinos"," 879 Literaturas de otras lenguas itálicas");
var especialidad_8 = new Array("880 Literaturas helénicas. Literatura griega clásica","881 Poesía griega clásica","882 Poesía y teatro dramáticos griegos clásicos","883 Poesía y novelística épicas griegas clásicas","884 Poesía lírica griega clásica","885 Discursos griegos clásicos","886 Cartas griegas clásicas","887 Humor y sátira griegos clásicos","888 Escritos varios griegos clásicos","889 Literatura griega moderna");
var especialidad_9 = new Array("890 Literaturas de otras lenguas","891 Indoeuropeas, orientales y célticas","892 Afroasiáticas. Semíticas","893 Afroasiáticas no semíticas","894 Altaicas, urálicas, hiperbóleas, dravídicas","895 Del Asia oriental y sudoriental","896 Africanas","897 Nativas norteamericanas","898 Nativas sudamericanas","899 Austronesias y otras");
			
function listasSeleccion(area,pais,materiaC,especialidadC){		
	listarAreaConocimiento();
	listarPaises();
	listarMaterias();
	listarEspecialidades();
	function listarAreaConocimiento(){
		evaluar=eval(areas);
		numAreas=evaluar.length;
		document.formularioActualizarLibro.areaConocimiento.length=numAreas+1;
		document.formularioActualizarLibro.areaConocimiento.options[0].value=area ;
		document.formularioActualizarLibro.areaConocimiento.options[0].text=area;
		for(i=0;i<numAreas;i++){
			document.formularioActualizarLibro.areaConocimiento.options[i+1].value=evaluar[i];
			document.formularioActualizarLibro.areaConocimiento.options[i+1].text=evaluar[i];
		}
	}
	function listarPaises(){
		var paises=new Array("Afganistan","Africa del Sur","Albania","Alemania","Andorra","Angola","Antigua y Barbuda","Antillas Holandesas","Arabia Saudita","Argelia","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarusia","Belgica","Belice","Benin","Bermudas","Bolivia","Bosnia","Botswana","Brasil","Brunei Darussulam","Bulgaria","Burkina Faso","Burundi","Butan","Camboya","Camerun","Canada","Cape Verde","Chad","Chile","China","Chipre","Colombia","Comoros","Congo","Corea del Norte","Corea del Sur","Costa de Marfíl","Costa Rica","Croasia","Cuba","Dinamarca","Djibouti","Dominica","Ecuador","Egipto","El Salvador","Emiratos Arabes Unidos","Eritrea","Eslovenia","España","Estados Unidos","Estonia","Etiopia","Fiji","Filipinas","Finlandia","Francia","Gabon","Gambia","Georgia","Ghana","Granada","Grecia","Groenlandia","Guadalupe","Guam","Guatemala","Guayana Francesa","Guerney","Guinea","Guinea-Bissau","Guinea Equatorial","Guyana","Haiti","Holanda","Honduras","Hong Kong","Hungria","India","Indonesia","Irak","Iran","Irlanda","Islandia","Islas Caiman","Islas Faroe","Islas Malvinas","Islas Marshall","Islas Solomon","Islas Virgenes Britanicas","Islas Virgenes (U.S.)","Israel","Italia","Jamaica","Japon","Jersey","JJordania","Kazakhstan","Kenia","Kiribati","Kuwait","Kyrgyzstan","Laos","Latvia","Lesotho","Libano","Liberia","Libia","Liechtenstein","Lituania","Luxemburgo","Macao","Macedonia","Madagascar","Malasia","Malawi","Maldivas","Mali","Malta","Marruecos","Martinica","Mauricio","Mauritania","Mexico","Micronesia","Moldova","Monaco","Mongolia","Mozambique","Myanmar (Burma)","Namibia","Nepal","Nicaragua","Niger","Nigeria","Noruega","Nueva Caledonia","Nueva Zealandia","Oman","Pakistan","Palestina","Panama","Papua Nueva Guinea","Paraguay","Peru","Polinesia Francesa","Polonia","Portugal","Puerto Rico","Qatar","Reino Unido","Republica Centroafricana","Republica Checa","Republica Democratica del Congo","Republica Dominicana","Republica Eslovaca","Reunion","Ruanda","Rumania","Rusia","Sahara","Samoa","San Cristobal-Nevis (St. Kitts)","San Marino","San Vincente y las Granadinas","Santa Helena","Santa Lucia","Santa Sede (Vaticano)","Sao Tome & Principe","Senegal","Seychelles","Sierra Leona","Singapur","Siria","Somalia","Sri Lanka (Ceilan)","Sudan","Suecia","Suiza","Sur Africa","Surinam","Swaziland","Tailandia","Taiwan","Tajikistan","Tanzania","Timor Oriental","Togo","Tokelau","Tonga","Trinidad & Tobago","Tunisia","Turkmenistan","Turquia","Ucrania","Uganda","Union Europea","Uruguay","Uzbekistan","Vanuatu","Venezuela","Vietnam","Yemen","Yugoslavia","Zambia","Zimbabwe");
		evaluar=eval(paises);
		numPaises=evaluar.length;
		document.formularioActualizarLibro.paisAutor.length=numPaises+1;
		document.formularioActualizarLibro.paisAutor.options[0].value=pais;
		document.formularioActualizarLibro.paisAutor.options[0].text=pais;
		for(i=0;i<numPaises;i++){
			document.formularioActualizarLibro.paisAutor.options[i+1].value=evaluar[i];
			document.formularioActualizarLibro.paisAutor.options[i+1].text=evaluar[i];
		}
	}
	function listarMaterias(){
		evaluar=eval(areas);
		numAreas=evaluar.length;	
		for (var i=0;i<numAreas;i++){
			if(areas[i]==area){
				materias=eval("materias_"+i);
				numMaterias=materias.length;
				document.formularioActualizarLibro.materia.length=numMaterias+1;
				document.formularioActualizarLibro.materia.options[0].value=materiaC ;
				document.formularioActualizarLibro.materia.options[0].text=materiaC;
				for(i=0;i<numMaterias;i++){
					document.formularioActualizarLibro.materia.options[i+1].value=materias[i];
					document.formularioActualizarLibro.materia.options[i+1].text=materias[i];
				}
			}
			
		}
	}
	function listarEspecialidades(){
		numMaterias=materias.length;	
		for(var i=0;i<numMaterias;i++){
			if(areas[8]==area){
				if(materias[i]==materiaC){
					especialidades=eval("especialidad_"+i);
					numEspecialidades=especialidades.length;
					document.formularioActualizarLibro.especialidad.length=numEspecialidades+1;
					document.formularioActualizarLibro.especialidad.options[0].value=especialidadC ;
					document.formularioActualizarLibro.especialidad.options[0].text=especialidadC;
					for(i=0;i<numEspecialidades;i++){
						document.formularioActualizarLibro.especialidad.options[i+1].value=especialidades[i];
						document.formularioActualizarLibro.especialidad.options[i+1].text=especialidades[i];
					}					
				}
			}else{
				document.formularioActualizarLibro.especialidad.length=1;
				document.formularioActualizarLibro.especialidad.options[0].value=" " ;
				document.formularioActualizarLibro.especialidad.options[0].text=" ";
			}
			
		}		
	
	}
}

function cambiarMateria(){
areaConocimiento = document.formularioActualizarLibro.areaConocimiento.selectedIndex-1;
if(areaConocimiento!=-1){
	materias=eval("materias_"+areaConocimiento);
	numMaterias=materias.length;
	document.formularioActualizarLibro.materia.length=numMaterias;
	for(i=0;i<numMaterias;i++){
		document.formularioActualizarLibro.materia.options[i].value=materias[i];
		document.formularioActualizarLibro.materia.options[i].text=materias[i];
	}
}else{
	document.formularioActualizarLibro.materia.length=1
	document.formularioActualizarLibro.materia.options[0].value=" ";
	document.formularioActualizarLibro.materia.options[0].text=" ";
}
document.formularioActualizarLibro.materia.options[0].selected=true;
document.formularioActualizarLibro.especialidad.length=0
}
function cambiarEspecialidad(){
var materia;
materia = document.formularioActualizarLibro.materia.selectedIndex-1;	
	switch(areaConocimiento){
		case 8:
			if(materia!=-1){
				especialidades=eval("especialidad_"+materia);
				numEspecialidades=especialidades.length;
				document.formularioActualizarLibro.especialidad.length=numEspecialidades;
				for(i=0;i<numEspecialidades;i++){
					document.formularioActualizarLibro.especialidad.options[i].value=especialidades[i];
					document.formularioActualizarLibro.especialidad.options[i].text=especialidades[i];
				}
			}else{
				document.formularioActualizarLibro.especialidad.length=0
				document.formularioActualizarLibro.especialidad.options[0].value=" ";
				document.formularioActualizarLibro.especialidad.options[0].text=" ";
			}
			document.formularioActualizarLibro.especialidad.options[0].selected=true;
		break;		
	}	
	
}


