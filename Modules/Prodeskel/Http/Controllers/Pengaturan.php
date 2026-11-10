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

use Modules\Prodeskel\Enums\DDKEnum;
use Modules\Prodeskel\Enums\DDKLabelEnum;
use Modules\Prodeskel\Enums\DDKMaxCustomDataPilihanEnum;
use Modules\Prodeskel\Enums\DDKPilihanBahanGalianAnggotaEnum;
use Modules\Prodeskel\Enums\DDKPilihanProduksiTahunIniEnum;
use Modules\Prodeskel\Models\ProdeskelCustomValue;

class Pengaturan extends AdminModulController
{
    public $modul_ini       = 'prodeskel';
    public $sub_modul_ini   = 'prodeskel-pengaturan';
    public $aliasController = 'prodeskel';

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $semua_kode    = array_keys(DDKMaxCustomDataPilihanEnum::semua());
        $custom_values = ProdeskelCustomValue::select('kode_value', 'value_long')
            ->where('kategori', DDKEnum::KATEGORI)
            ->whereIn('kode_value', $semua_kode)
            ->get()
            ->transform(static function ($item) {
                $item->value_long = json_decode($item->value_long, true);

                return $item;
            });

        $label = collect(DDKLabelEnum::semua())
            ->map(static function ($item, $key) use ($custom_values): array {
                $custom_values = $custom_values->firstWhere('kode_value', $key);
                if ($custom_values) {
                    $custom_values = $custom_values->toArray();
                }

                $jumlah = DDKMaxCustomDataPilihanEnum::semua()[$key];
                if (array_key_exists($key, DDKEnum::KODE_KATEGORI_PRODUKSI_TAHUN_INI)) {
                    $kode_kustom = [];

                    for ($i = 1; $i <= $jumlah; $i++) {
                        $pilihan                           = DDKPilihanProduksiTahunIniEnum::DATA[DDKEnum::KODE_KATEGORI_PRODUKSI_TAHUN_INI[$key]];
                        $kode_kustom[count($pilihan) + $i] = ['komoditas' => '', 'satuan' => ''];
                    }
                } elseif ($key == DDKEnum::KODE_PRODUKSI_BAHAN_GALIAN_YANG_DIMILIKI_ANGGOTA) {
                    $kode_kustom = [];

                    for ($i = 1; $i <= $jumlah; $i++) {
                        $pilihan                           = DDKPilihanBahanGalianAnggotaEnum::DATA;
                        $kode_kustom[count($pilihan) + $i] = '';
                    }
                } else {
                    $kode_kustom = [];

                    for ($i = 1; $i <= $jumlah; $i++) {
                        $pilihan                                    = DDKEnum::valuesOf($key);
                        $kode_kustom[array_key_last($pilihan) + $i] = '';
                    }
                }

                return ['label' => $item, 'custom_values' => $custom_values ?? ['value_long' => $kode_kustom]];
            });
        $config       = identitas();
        $sebutan_desa = setting('sebutan_desa');
        $bulan        = bulan();
        $tahun        = range(2020 - 2, date('Y'));
        $tahun        = array_combine($tahun, $tahun);

        return view('prodeskel::pengaturan', ['custom_values' => $custom_values, 'label' => $label, 'config' => $config, 'sebutan_desa' => $sebutan_desa, 'bulan' => $bulan, 'tahun' => $tahun]);
    }
}
