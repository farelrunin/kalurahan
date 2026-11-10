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

namespace Modules\PPID\Database\Seeders;

use App\Traits\Migrator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    use Migrator;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->createSettings([
            [
                'judul'      => 'Banner PPID',
                'key'        => 'ppid_banner',
                'value'      => null,
                'keterangan' => 'Banner yang akan tampil pada halaman PPID khusus',
                'kategori'   => 'ppid',
                'jenis'      => 'unggah',
            ],
            [
                'judul'      => 'Judul Portal PPID',
                'key'        => 'ppid_judul_portal',
                'value'      => 'Sistem Informasi',
                'keterangan' => 'Judul yang akan tampil pada halaman PPID khusus',
                'kategori'   => 'ppid',
                'jenis'      => 'text',
            ],
            [
                'judul'      => 'Banner PPID',
                'key'        => 'ppid_banner',
                'value'      => 'banner_default.jpg',
                'keterangan' => 'Banner yang akan tampil pada halaman PPID khusus',
                'kategori'   => 'ppid',
                'jenis'      => 'upload',
            ],
            [
                'judul'      => 'Informasi Singkat',
                'key'        => 'ppid_informasi_singkat',
                'value'      => '',
                'keterangan' => 'Informasi singkat yang akan ditampilkan di bawah judul besar',
                'kategori'   => 'ppid',
                'jenis'      => 'text',
            ],
            [
                'judul'      => 'Batas Permohonan Informasi Diajukan',
                'key'        => 'ppid_batas_permohonan_informasi_diajukan',
                'value'      => '3',
                'keterangan' => 'Batas maksimal permohonan informasi diajukan untuk masing-masing NIK atau no telp/email',
                'kategori'   => 'ppid',
                'jenis'      => 'number',
            ],
            [
                'judul'      => 'Aktifkan Permohonan',
                'key'        => 'ppid_aktifkan_permohonan',
                'value'      => '0',
                'keterangan' => 'Aktif atau nonaktifkan form permohonan',
                'kategori'   => 'ppid',
                'jenis'      => 'boolean',
                'option'     => null,
            ],
            [
                'judul'      => 'Aktifkan Permohonan Keberatan',
                'key'        => 'ppid_aktifkan_permohonan_keberatan',
                'value'      => '0',
                'keterangan' => 'Aktif atau nonaktifkan form permohonan keberatan',
                'kategori'   => 'ppid',
                'jenis'      => 'boolean',
                'option'     => null,
            ],
            [
                'judul'      => 'Cara Memperoleh Informasi',
                'key'        => 'ppid_cara_memperoleh_informasi',
                'value'      => json_encode(['mengambil_informasi_dikantor_desa', 'dikirim_melalui_email', 'melalui_whatsapp_pengguna']),
                'keterangan' => 'Daftar ini akan tampil pada form permohonan',
                'kategori'   => 'ppid',
                'jenis'      => 'select-multiple-array',
                'option'     => json_encode([
                    ['id' => 'mengambil_informasi_dikantor_desa', 'nama' => 'Mengambil informasi dikantor desa (hardcopy)'],
                    ['id' => 'dikirim_melalui_email', 'nama' => 'Dikirim melalui email'],
                    ['id' => 'melalui_whatsapp_pengguna', 'nama' => 'Melalui Whatsapp pengguna (Softcopy)'],
                ]),
            ],
            [
                'judul'      => 'Cara Mendapat Salinan Informasi',
                'key'        => 'ppid_mendapat_salinan_informasi',
                'value'      => json_encode(['mengambil_langsung','email','faksimili', 'kurir', 'pos']),
                'keterangan' => 'Daftar ini akan tampil pada form permohonan',
                'kategori'   => 'ppid',
                'jenis'      => 'select-multiple-array',
                'option'     => json_encode([
                    ['id' => 'mengambil_langsung', 'nama' => 'Mengambil Langsung'],
                    ['id' => 'email', 'nama' => 'Email'],
                    ['id' => 'faksimili', 'nama' => 'Faksimili'],
                    ['id' => 'kurir', 'nama' => 'Kurir'],
                    ['id' => 'pos', 'nama' => 'Pos'],
                ]),
            ],
            [
                'judul' => 'Permohonan Keberatan',
                'key'   => 'ppid_permohonan_keberatan',
                'value' => json_encode([
                    'permohonan_informasi_ditolak',
                    'informasi_berkala_tidak_tersedia',
                    'permintaan_informasi_tidak_ditanggapi',
                    'permintaan_informasi_ditanggapi_tidak_sebagaimana_yang_diminta',
                    'permintaan_informasi_tidak_dipenuhi',
                    'biaya_yang_dikenakan_tidak_wajar',
                    'informasi_disampaikan_melebihi_jangka_waktu_yang_ditetapkan',
                ]),
                'keterangan' => 'Daftar ini akan tampil pada form permohonan keberatan',
                'kategori'   => 'ppid',
                'jenis'      => 'select-multiple-array',
                'option'     => json_encode([
                    ['id' => 'permohonan_informasi_ditolak', 'nama' => 'Permohonan informasi ditolak'],
                    ['id' => 'informasi_berkala_tidak_tersedia', 'nama' => 'Informasi berkala tidak tersediakan'],
                    ['id' => 'permintaan_informasi_tidak_ditanggapi', 'nama' => 'Permintaan informasi tidak ditanggapi'],
                    ['id' => 'permintaan_informasi_ditanggapi_tidak_sebagaimana_yang_diminta', 'nama' => 'Permintaan informasi ditanggapi tidak sebagaimana yang diminta'],
                    ['id' => 'permintaan_informasi_tidak_dipenuhi', 'nama' => 'Permintaan informasi tidak dipenuhi'],
                    ['id' => 'biaya_yang_dikenakan_tidak_wajar', 'nama' => 'Biaya yang dikenakan tidak wajar'],
                    ['id' => 'informasi_disampaikan_melebihi_jangka_waktu_yang_ditetapkan', 'nama' => 'Informasi disampaikan melebihi jangka waktu yang ditentukan'],
                ]),
            ],
            [
                'judul'      => 'Pengaturan Menu',
                'key'        => 'ppid_website_menu',
                'value'      => 'PPID',
                'keterangan' => 'Pengaturan untuk menentukan menu menggunakan OpenSID atau menggunakan pengaturan PPID',
                'kategori'   => 'ppid',
                'jenis'      => 'option',
                'option'     => json_encode(['OpenSID' => 'OpenSID', 'PPID' => 'PPID']),
            ],
        ]);
    }
}
