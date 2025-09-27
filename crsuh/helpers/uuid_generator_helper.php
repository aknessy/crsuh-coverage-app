<?php
if(!function_exists('generate_uuid'))
{
    function generate_uuid() {
        // Generate a version 4 UUID
        if (function_exists('com_create_guid')) {
            return trim(com_create_guid(), '{}');
        }

        $data = random_bytes(16);
        $data[6] = chr((ord($data[6]) & 0x0f) | 0x40);
        $data[8] = chr((ord($data[8]) & 0x3f) | 0x80);
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
}