<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('generate_md_code')) {
    function generate_md_code($md_name) {
        // Get first 2 letters, uppercase
        $prefix = strtoupper(substr(trim($md_name), 0, 2));

        // Generate 5–6 random digits
        $random_digits = mt_rand(10000, 999999);

        // Get last 3 digits of current year
        $year_suffix = substr(date('Y'), -3);

        // Combine
        return $prefix . $random_digits . '-' . $year_suffix;
    }
}

