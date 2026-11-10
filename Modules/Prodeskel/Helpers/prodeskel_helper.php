<?php

/*
 *
 * File ini bagian dari:
 *
 * OpenSID
 *
 * Sistem informasi desa sumber terbuka untuk memajukan desa
 *
 * Aplikasi dan source code ini dirilis berdasarkan lisensi GPL V3
 *
 * Hak Cipta 2009 - 2015 Combine Resource Institution (http://lumbungkomunitas.net/)
 * Hak Cipta 2016 - 2025 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
 *
 * Dengan ini diberikan izin, secara gratis, kepada siapa pun yang mendapatkan salinan
 * dari perangkat lunak ini dan file dokumentasi terkait ("Aplikasi Ini"), untuk diperlakukan
 * tanpa batasan, termasuk hak untuk menggunakan, menyalin, mengubah dan/atau mendistribusikan,
 * asal tunduk pada syarat berikut:
 *
 * Pemberitahuan hak cipta di atas dan pemberitahuan izin ini harus disertakan dalam
 * setiap salinan atau bagian penting Aplikasi Ini. Barang siapa yang menghapus atau menghilangkan
 * pemberitahuan ini melanggar ketentuan lisensi Aplikasi Ini.
 *
 * PERANGKAT LUNAK INI DISEDIAKAN "SEBAGAIMANA ADANYA", TANPA JAMINAN APA PUN, BAIK TERSURAT MAUPUN
 * TERSIRAT. PENULIS ATAU PEMEGANG HAK CIPTA SAMA SEKALI TIDAK BERTANGGUNG JAWAB ATAS KLAIM, KERUSAKAN ATAU
 * KEWAJIBAN APAPUN ATAS PENGGUNAAN ATAU LAINNYA TERKAIT APLIKASI INI.
 *
 * @package   OpenSID
 * @author    Tim Pengembang OpenDesa
 * @copyright Hak Cipta 2009 - 2015 Combine Resource Institution (http://lumbungkomunitas.net/)
 * @copyright Hak Cipta 2016 - 2025 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
 * @license   http://www.gnu.org/licenses/gpl.html GPL V3
 * @link      https://github.com/OpenSID/OpenSID
 *
 */

/**
 * Buat baris pilihan dan coret selain yang ditemukan, jika tidak ditemukan buat tanpa coretan
 *
 * @param array $hub_tersedia              [ string title => ( int | string | array of ) kode to_be_compared, ... ]
 * @param mixed $compare_value             ( int | string | array of ) to_be_compared
 * @param mixed $default_key               ( int | string | false )
 * @param mixed $space_divider_replacement
 */
function baris_pilihan_di_coret(array $hub_tersedia, $compare_value, $default_key = false, string $strikethrough_star_pattern = '<del>*</del>', $space_divider_replacement = '&nbsp;&nbsp;'): string
{
    $tersedia = false;
    $string   = '';

    foreach ($hub_tersedia as $key => $item) {
        $ketemu = false;
        if (is_array($compare_value)) {
            foreach ($compare_value as $item_value) {
                if (
                    (is_array($item) && in_array($item_value, $item))
                    || (! is_array($item) && $item_value == $item)
                    || ($default_key !== false && $key == $default_key && ! $tersedia)
                ) {
                    $tersedia = true;
                    $ketemu   = true;
                    break;
                }
            }
        } elseif ((is_array($item) && in_array($compare_value, $item))
        || (! is_array($item) && $compare_value == $item)
        || ($default_key !== false && $key == $default_key && ! $tersedia)) {
            $tersedia = true;
            $ketemu   = true;
        }

        if ($ketemu) {
            $string .= $key . str_replace(' ', $space_divider_replacement, ' / ');
        } else {
            $string .= str_replace('*', $key, $strikethrough_star_pattern) . str_replace(' ', $space_divider_replacement, ' / ');
        }
    }

    // jika tidak ditemukan buat baris pilihan tanpa coretan
    if ($tersedia == false) {
        $string = '';

        foreach (array_keys($hub_tersedia) as $key) {
            $string .= $key . str_replace(' ', $space_divider_replacement, ' / ');
        }
    }

    return $string;
}

function empty_as_null_or_value($value = null)
{
    if ($value === '') {
        return null;
    }

    return $value;
}

function get_nama_kategori($value)
{
    return ucwords(str_replace('-', ' ', $value));
}
