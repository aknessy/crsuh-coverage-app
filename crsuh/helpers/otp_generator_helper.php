<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('generate_otp')) {
    function generate_otp($length = 6, $chars = 'abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ') {
        $chars_length = (strlen($chars) -1);
        $string = $chars[rand(0, $chars_length)];
        for ($i=1; $i < $length; $i = strlen($string)) {
            $r = $chars[rand(0, $chars_length)];
            if ($r != $string[$i - 1]) $string .= $r;
        }
        return $string;
    }
}