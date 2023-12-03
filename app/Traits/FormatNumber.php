<?php

namespace App\Traits;

trait FormatNumber{

    protected function getFormatedNumber($number){
        $suffix = '';
    
        if ($number >= 1000 && $number < 1000000) {
            $number = round($number / 1000, 1);
            $suffix = 'K';
        } elseif ($number >= 1000000 && $number < 1000000000) {
            $number = round($number / 1000000, 1);
            $suffix = 'M';
        } elseif ($number >= 1000000000) {
            $number = round($number / 1000000000, 1);
            $suffix = 'B';
        }
    
        return $number . $suffix;
    }
}