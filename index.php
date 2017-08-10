<?php
include("simple_html_dom.php");
$reguest=array(
	'http'=>array(
		'header'=>"Content-Type: application/x-www-form-urlencoded",
//		'header'=>"User-Agent: Mozilla compatible",
		'method'=>'POST',
		'content'=>http_build_query(array(
	//		'login[email]'=>'cioltealinn@gmail.com',
		//	'login[password]'=>'alinciolten'
			'data[title]'=>'Mercedes Benz ML 320 2010',
			'data[category_id]'=>'1299',
			'data[param_price][0]'=>'price',
			'data[param_price][1]'=>'33 0000',
			'data[param_state]'=>'used',
			'data[private_business]'=>'private',
			'data[description]'=>'Mercedes-Benz ML320 CDI 4matic, 224 CP, 2010, 290500 km
- motor 2987 cc, V6 Diesel, 165 kW, 224 CP
- revizie efectuata recent (ulei Mobil ESP 5W-30, filtre Mann, (10.07.2017)

- Euro 4, model cu filtru particule 
- culoare exterioara: Obsidian Black (negru metalizat)
- pachet Luxury
- interior piele neagră 
- scaune fata cu reglaj electric si incalzire
- geamuri fumurii din fabrica (privacy glass) lateral + luneta
- parktronic (senzori parcare) fata si spate
- senzori lumini/ploaie
- clima automata 2 zone
- sistem pregatire telefon
- lumini ambientale
- tractiune integrala permanent, 4x4 (4matic)
- cutie viteze automata 7 trepte (7G-Tronic)
-pt.)
- servodirectie adaptiva (vario steering)
- pilot automat (tempomat) cu functie limitare viteza
- controlul tractiunii + asistenta urcare/coborare panta
- senzori presiune pneuri
- jante aliaj 18" 
-Suspensie pneumatica ! ',

			'data[riak_key]'=>'',
			'data[city]'=>'Cluj-Napoca, judet Cluj',
			'loc-option'=>'loc-opt-2',
			'data[person]'=>'Ciolte Alin',
			'data[email]'=>'cioltealinn@gmail.com',
			'data[email]'=>'cioltealinn@gmail.com'
		
		
		
		)),
	)
);

$context= stream_context_create($reguest);
$html = file_get_html("https://www.olx.ro/adauga-anunt/?bs=myaccount_adding#login",false,$context);
 //echo $html;
 
//$response = file_get_contents("https://www.olx.ro/cont/?ref%5B0%5D%5Baction%5D=adding&ref%5B0%5D%5Bmethod%5D=index", true, $context);
//$html = str_get_html($response);
echo $html;

?>
































