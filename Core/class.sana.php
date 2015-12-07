<?php


class Sana{
	
	public function Mayusculas($string){
		return strtoupper($string);
	}

	public function Minuscula($string){
		return mb_strtolower($string);
	}
}


?>