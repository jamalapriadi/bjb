<?php

	switch ($kota) {
		case 1:
			$namakota = "Jakarta";
			break;
		case 2:
			$namakota = "Semarang";
		break;	
		
		case 3:
			$namakota = "Cirebon";
		break;
			
		default:
			$namakota = "Tegal";
			break;
	}

	echo "Saat ini saya sedang berada di Kota <b>".$namakota."</b>";

?>