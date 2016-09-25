<?php

class Belajarlib
{
	
	function tampil_hari()
	{
		$w = date('w');

		switch ($w) {
			case 1 :
				$hari = "Senin";
				break;
			case 2 : 
				$hari = "Selasa"; 	
				break;

			case 3 : 
				$hari = "Rabu";
				break;
			
			case 4 :
				$hari = "Kamis";
				break;

			case 5 :
				$hari = "Jumat";
				break;
			
			case 6 :
				$hari = "Sabtu";
				break;				
		
			default:
				$hari = "Minggu";
				break;
		}
		return $hari;
	}


	function acak_kode($teks)
	{
		if($teks == "")
		{
			echo '<b>Silahkan masukkan teks dahulu.</b>';
		}else{

			$CI =& get_instance();
			$CI->load->library('encrypt');

			$acak = $CI->encrypt->encode($teks);

			return $acak;
		}
	}

	function cek_gejil($angka)
	{
		if($angka % 2 === 0)
		{
			$hasil = "Ini adalah angka genap.";
			$warna = "green";
		}else{
			$hasil = "Ini adalah angka ganjil.";
			$warna = "red";
		}

		echo "<p style='color:".$warna."'>".$angka." -> ". $hasil."</p>";
	}
//end of class
}