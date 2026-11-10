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
use Illuminate\Support\Facades\Schema;
use Modules\Prodeskel\Models\ProdeskelDDK;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasTable('prodeskel_ddk')) {
            Schema::create('prodeskel_ddk', static function (Blueprint $table): void {
                $table->integer('id', true);
                $table->integer('config_id');
                $table->integer('keluarga_id');
                $table->unsignedTinyInteger('bulan')->nullable();
                $table->year('tahun')->nullable();
                $table->string('nama_pengisi', 100)->nullable();
                $table->string('pekerjaan', 100)->nullable();
                $table->string('jabatan', 100)->nullable();
                $table->string('sumber_data_1', 100)->nullable();
                $table->string('sumber_data_2', 100)->nullable();
                $table->string('sumber_data_3', 100)->nullable();
                $table->string('sumber_data_4', 100)->nullable();
                $table->unsignedDecimal('jumlah_penghasilan_perbulan', 65)->nullable()->default(0);
                $table->unsignedDecimal('jumlah_pengeluaran_perbulan', 65)->nullable()->default(0);
                $table->timestamps();
                $table->foreign('config_id')->references('id')->on('config')->onUpdate('cascade')->onDelete('cascade');
                $table->foreign('keluarga_id')->references('id')->on('tweb_keluarga')->onUpdate('cascade')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExistsDBGabungan('prodeskel_ddk', ProdeskelDDK::class);
    }
};
