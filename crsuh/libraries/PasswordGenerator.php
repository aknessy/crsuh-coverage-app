<?php
class PasswordGenerator {

  public static function generate(){
		$rand = rand(100, 999);
		$alpha = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
		$consonant = array("B", "C", "D", "F", "G", "H", "J", "K", "L", "M", "N", "P", "Q", "R", "S", "T", "V", "W", "X", "Y", "Z");
		$vowel = array("a", "e", "i", "o", "u");
		$rand2 = rand(0, 9);

		return $alpha[mt_rand(0, count($alpha)-1)] . $vowel[mt_rand(0, count($vowel)-1)] . strtolower($consonant[mt_rand(0, count($consonant)-1)]) . $vowel[mt_rand(0, count($vowel)-1)] . $rand;
	}

}

//$password = PasswordGenerator::generatePassword();

//echo $password;
