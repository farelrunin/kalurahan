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

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Modules\Prodeskel\Enums\DDKEnum;
use Modules\Prodeskel\Enums\DDKMaxCustomDataPilihanEnum;
use Modules\Prodeskel\Enums\DDKPilihanBahanGalianAnggotaEnum;
use Modules\Prodeskel\Enums\DDKPilihanProduksiTahunIniEnum;
use Modules\Prodeskel\Models\ProdeskelCustomValue;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasTable('prodeskel_custom_value')) {
            Schema::create('prodeskel_custom_value', static function (Blueprint $table): void {
                $table->integer('id', true);
                $table->integer('config_id');
                $table->string('kategori', 100);
                $table->string('kode_value', 50);
                $table->string('value', 100);
                $table->longText('value_long');
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->timestamps();
                $table->unique(['config_id', 'kategori', 'kode_value']);
                $table->foreign('config_id')->references('id')->on('config')->onUpdate('cascade')->onDelete('cascade');
            });

            $this->insertDefaultCustomDataValue();
            $this->insertHashFileTemplate();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExistsDBGabungan('prodeskel_custom_value', ProdeskelCustomValue::class);
    }

    public function insertDefaultCustomDataValue()
    {
        // insert atau abaikan jika duplikat
        $insert_sql = 'INSERT INTO ' . (new ProdeskelCustomValue())->getTable()
            . ' (config_id, kategori, kode_value, value, value_long) VALUES (?, ?, ?, ?, ?) '
            . ' ON DUPLICATE KEY UPDATE kategori = kategori, kode_value = kode_value, value = value, value_long = value_long ';

        foreach (DDKMaxCustomDataPilihanEnum::semua() as $kode_pilihan => $jumlah) {
            if ($jumlah == 0) {
                $kode_kustom = '';
            } elseif (array_key_exists($kode_pilihan, DDKEnum::KODE_KATEGORI_PRODUKSI_TAHUN_INI)) {
                $kode_kustom = [];

                for ($i = 1; $i <= $jumlah; $i++) {
                    $pilihan                           = DDKPilihanProduksiTahunIniEnum::DATA[DDKEnum::KODE_KATEGORI_PRODUKSI_TAHUN_INI[$kode_pilihan]];
                    $kode_kustom[count($pilihan) + $i] = ['komoditas' => '', 'satuan' => ''];
                }
            } elseif ($kode_pilihan == DDKEnum::KODE_PRODUKSI_BAHAN_GALIAN_YANG_DIMILIKI_ANGGOTA) {
                $kode_kustom = [];

                for ($i = 1; $i <= $jumlah; $i++) {
                    $pilihan                           = DDKPilihanBahanGalianAnggotaEnum::DATA;
                    $kode_kustom[count($pilihan) + $i] = '';
                }
            } else {
                $kode_kustom = [];

                for ($i = 1; $i <= $jumlah; $i++) {
                    $pilihan                                    = DDKEnum::valuesOf($kode_pilihan);
                    $kode_kustom[array_key_last($pilihan) + $i] = '';
                }
            }

            DB::insert($insert_sql, [
                identitas('id'),
                DDKEnum::KATEGORI,
                $kode_pilihan,
                '',
                json_encode($kode_kustom),
            ]);
        }
    }

    protected function insertHashFileTemplate()
    {
        $insert_sql = 'INSERT INTO ' . (new ProdeskelCustomValue())->getTable()
            . ' (config_id, kategori, kode_value, value, value_long) VALUES (?, ?, ?, ?, ?) '
            . ' ON DUPLICATE KEY UPDATE kategori = kategori, kode_value = kode_value, value = value, value_long = value_long ';

        DB::insert($insert_sql, [
            identitas('id'),
            DDKEnum::KATEGORI,
            DDKEnum::HASH_TEMPLATE_DDK,
            hash_file(DDKEnum::HASH_ALGO, DDKEnum::PATH_TEMPLATE . DDKEnum::FILE_TEMPLATE_DDK),
            '',
        ]);

        DB::insert($insert_sql, [
            identitas('id'),
            DDKEnum::KATEGORI,
            DDKEnum::HASH_TEMPLATE_DDK_ANGGOTA,
            hash_file(DDKEnum::HASH_ALGO, DDKEnum::PATH_TEMPLATE . DDKEnum::FILE_TEMPLATE_DDK_ANGGOTA),
            '',
        ]);
    }
};
