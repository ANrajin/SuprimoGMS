<?php

namespace App\Model;

class UniqueId
{
    public static function Numeric($length)
    {
        $chars = "1234567890";
        $clen   = strlen($chars) - 1;
        $unique_id  = '';

        for ($i = 0; $i < $length; $i++) {
            $unique_id .= $chars[mt_rand(0, $clen)];
        }

        return ($unique_id);
    }

    public static function Alphabets($length)
    {
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $clen   = strlen($chars) - 1;
        $unique_id  = '';
        for ($i = 0; $i < $length; $i++) {
            $unique_id .= $chars[mt_rand(0, $clen)];
        }
        return ($unique_id);
    }

    public static function AlphaNumeric($length)
    {
        $chars = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $clen   = strlen($chars) - 1;
        $unique_id  = '';
        for ($i = 0; $i < $length; $i++) {
            $unique_id .= $chars[mt_rand(0, $clen)];
        }
        return ($unique_id);
    }
}
