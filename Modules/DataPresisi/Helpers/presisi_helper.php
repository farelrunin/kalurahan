<?php
if(!function_exists('pilihanBagianTanpaNomor')) {
function pilihanBagianTanpaNomor($data)
    {
        $dataBaru = [];        
        
        foreach ($data as $key => $arr) {
            if (is_array($arr)) {
                foreach ($arr as $k => $v) {                    
                    $dataBaru[$key][$k] = hapusNomorDiDepan($v);
                }
            }
        }

        return $dataBaru;
    }
}
// Fungsi untuk menghapus nomor di depan value (misal: "1. " atau "01. ")
if(!function_exists('hapusNomorDiDepan')) {
    function hapusNomorDiDepan($text) {
        return preg_replace('/^\d+\.\s*/', '', $text);
    }
}