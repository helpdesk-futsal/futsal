<?php
    function getAddress($text) {
        return explode('__', $text)[0];
    }

    function toCharacter($number) {
        $alphabet = range('A', 'Z');
        return $alphabet[$number];
    }

    function rupiah($angka){
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
    }
