<?php 

abstract class Perhitungan {
	abstract public function hitung();
}

/*
	Menghitung waktu tempuh membutuhkan parameter jarak dan kecepatan
	Pada awalnya kecepatan berupa KM/jam, namun saya membuat untuk bisa dikonversi dalam satuan menit dan juga second
*/
class WaktuTempuh extends Perhitungan {
	public $kecepatan;
	public $jarak;

	/*Enkapsulasi private*/
	private function dalamMenit($jam){
		/*Satu jam adalam 60 menit*/
		$x = 60;

		return $jam * $x;
	}

	/*Enkapsulasi private*/
	private function dalamDetik($menit){
		/*Satu menit membutuhkan 60 detik*/
		$x = 60;
		return $menit * $x;
	}

	/*Perubahan dari abstract class Perhitungan*/
	public function hitung(){
		$output = "\n\r========Output========\n\r";
		$hitung = (float)($this->jarak / $this->kecepatan); // Kita membutuhkan float untuk bisa mengkonversi kedalam menit
		$menit = $this->dalamMenit($hitung);
		$detik = $this->dalamDetik($menit);
		$output .= "Untuk mencapai jarak ".$this->jarak." KM dengan kecepatan ".$this->kecepatan."KM/jam kita membutuhkan waktu ".$hitung." jam.\n\r";
		$output .= "Dalam satuan menit untuk mencapai jarak ".$this->jarak." KM dengan kecepatan ".$this->kecepatan."KM/jam kita membutuhkan waktu ".$menit." menit \n\r";
		$output .= "Dalam satuan detik untuk mencapai jarak ".$this->jarak." KM dengan kecepatan ".$this->kecepatan."KM/jam kita membutuhkan waktu ".$detik." detik \n\r";

		return $output;
	}

}

/* Overriding class WaktuTempuh */
class InputWaktuTempuh extends WaktuTempuh{

	public function berikanInput($kecepatan, $jarak){
		$this->kecepatan = $kecepatan;
		$this->jarak = $jarak;
	}

	public function hasil(){
		return $this->hitung();
	}
}

class JarakDitempuh extends Perhitungan {
	public $kecepatan;
	public $waktu;

	public function hitung(){
		$output = "\n\r========Output========\n\r";
		$hasil = $this->kecepatan * $this->waktu;
		$output .= "Jarak yang kita tempuh dengan kecepatan ".$this->kecepatan."KM/jam dan waktu ".$this->waktu." jam adalah ".$hasil."KM \n\r";
		return $output;
	}
}

/* Overriding class JarakDitempuh */
class InputJarakDitempuh extends JarakDitempuh{

	public function berikanInput($kecepatan, $waktu){
		$this->kecepatan = $kecepatan;
		$this->waktu = $waktu;
	}

	public function hasil(){
		return $this->hitung();
	}
}

class Kecepatan extends Perhitungan {
	public $jarak;
	public $waktu;

	public function hitung(){
		$output = "\n\r========Output========\n\r";
		$hasil = $this->jarak / $this->waktu;
		$output .= "Jika kita mencapai jarak ".$this->jarak."KM dengan waktu ".$this->waktu."Jam maka kita memiliki kecepatan ".$hasil."KM/Jam.\n\r";
		return $output;
	}
}

/* Overriding class Kecepatan */ 
class InputKecepatan extends Kecepatan {
	public function berikanInput($jarak, $waktu){
		$this->jarak = $jarak;
		$this->waktu = $waktu;
	}
	public function hasil(){
		return $this->hitung();
	}
}


echo "
\n\rSelamat datang diprogram mencari jarak tempuh, mencari waktu tempuh, dan mencari kecepatan \n\r
Pertama! silahkan pilih program yang akan dipakai!
1. Menghitung Jarak Tempuh.
2. Menghitung Waktu Tempuh.
3. Menghitung Kecepatan.
";
$program = (int)readline("Masukan nomer dari program yang akan dipakai : ");

switch ($program) {
	case '1':
		echo "\n\r PROGRAM MENGHITUNG JARAK TEMPUH \n\r";

		$kecepatan = (float)readline("Silahkan masukan kecepatan : ");
		$waktu = (float)readline("Silahkan Masukan waktu : ");

		$input = new InputJarakDitempuh();
		$input->berikanInput($kecepatan, $waktu);
		print_r($input->hasil());
		break;
	case '2':
		echo "\n\r PROGRAM MENGHITUNG WAKTU TEMPUH \n\r";

		$kecepatan = (float)readline("Silahkan masukan kecepatan : ");
		$jarak = (float)readline("Silahkan masukan jarak : ");

		$input = new InputWaktuTempuh();
		$input->berikanInput($kecepatan, $jarak);
		print_r($input->hasil());
		break;
	case '3':
		echo "\n\r PROGRAM MENGHITUNG KECEPATAN \n\r";

		$jarak = (float)readline("Silahkan masukan jarak : ");
		$waktu = (float)readline("Silahkan masukan waktu : ");

		$input = new InputKecepatan();
		$input->berikanInput($jarak, $waktu);
		print_r($input->hasil());
		break;
	
	default:
		echo "Input Salah!";
		break;
}

?>
