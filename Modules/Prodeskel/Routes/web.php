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

Route::group('prodeskel', ['namespace' => 'Prodeskel'], static function (): void {
    Route::get('/pengaturan', 'Pengaturan@index');
    Route::get('/ddk', 'DDK@index');
    Route::post('/ddk/save/{tipe}/{keluarga_id?}', 'DDK@ddkSave');
    Route::get('/ddk/cetak/{keluarga_id}', 'DDK@ddkCetak');
    Route::match(['GET', 'POST'], '/ddk/impor/{tipe?}', 'DDK@ddkImpor');
    Route::get('/datatablesDDK', 'DDK@datatablesDDK');
    Route::get('/templateHtml', 'DDK@templateHtml');
    Route::get('/ddk/{keluarga_id}', 'DDK@ddkForm');

    Route::get('/potensi', 'BatasWilayah@index');
    Route::group('batasWilayah', static function (): void {
        Route::get('', 'BatasWilayah@index');
        Route::get('form/{id?}', 'BatasWilayah@form');
        Route::get('show/{id}', 'BatasWilayah@show');
        Route::post('insert', 'BatasWilayah@insert');
        Route::post('update/{id}', 'BatasWilayah@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'BatasWilayah@delete');
        Route::get('dialog/{aksi?}/{o?}', 'BatasWilayah@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'BatasWilayah@daftar');
    });

    Route::group('jenisLahan', static function (): void {
        Route::get('', 'JenisLahan@index');
        Route::get('form/{id?}', 'JenisLahan@form');
        Route::get('show/{id}', 'JenisLahan@show');
        Route::post('insert', 'JenisLahan@insert');
        Route::post('update/{id}', 'JenisLahan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'JenisLahan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'JenisLahan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'JenisLahan@daftar');
    });

    Route::group('dampakPengolahanHutan', static function (): void {
        Route::get('', 'DampakPengolahanHutan@index');
        Route::get('form/{id?}', 'DampakPengolahanHutan@form');
        Route::get('show/{id}', 'DampakPengolahanHutan@show');
        Route::post('insert', 'DampakPengolahanHutan@insert');
        Route::post('update/{id}', 'DampakPengolahanHutan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'DampakPengolahanHutan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'DampakPengolahanHutan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'DampakPengolahanHutan@daftar');
    });

    Route::group('kondisiHutan', static function (): void {
        Route::get('', 'KondisiHutan@index');
        Route::get('form/{id?}', 'KondisiHutan@form');
        Route::get('show/{id}', 'KondisiHutan@show');
        Route::post('insert', 'KondisiHutan@insert');
        Route::post('update/{id}', 'KondisiHutan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'KondisiHutan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'KondisiHutan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'KondisiHutan@daftar');
    });

    Route::group('hasilHutan', static function (): void {
        Route::get('', 'HasilHutan@index');
        Route::get('form/{id?}', 'HasilHutan@form');
        Route::get('show/{id}', 'HasilHutan@show');
        Route::post('insert', 'HasilHutan@insert');
        Route::post('update/{id}', 'HasilHutan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'HasilHutan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'HasilHutan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'HasilHutan@daftar');
    });

    Route::group('iklim', static function (): void {
        Route::get('', 'Iklim@index');
        Route::get('form/{id?}', 'Iklim@form');
        Route::get('show/{id}', 'Iklim@show');
        Route::post('insert', 'Iklim@insert');
        Route::post('update/{id}', 'Iklim@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'Iklim@delete');
        Route::get('dialog/{aksi?}/{o?}', 'Iklim@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'Iklim@daftar');
    });

    Route::group('topografi', static function (): void {
        Route::get('', 'Topografi@index');
        Route::get('form/{id?}', 'Topografi@form');
        Route::get('show/{id}', 'Topografi@show');
        Route::post('insert', 'Topografi@insert');
        Route::post('update/{id}', 'Topografi@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'Topografi@delete');
        Route::get('dialog/{aksi?}/{o?}', 'Topografi@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'Topografi@daftar');
    });

    Route::group('kepemilikanLahan', static function (): void {
        Route::get('', 'KepemilikanLahan@index');
        Route::get('form/{id?}', 'KepemilikanLahan@form');
        Route::get('show/{id}', 'KepemilikanLahan@show');
        Route::post('insert', 'KepemilikanLahan@insert');
        Route::post('update/{id}', 'KepemilikanLahan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'KepemilikanLahan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'KepemilikanLahan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'KepemilikanLahan@daftar');
    });

    Route::group('kepemilikanLahanHutan', static function (): void {
        Route::get('', 'KepemilikanLahanHutan@index');
        Route::get('form/{id?}', 'KepemilikanLahanHutan@form');
        Route::get('show/{id}', 'KepemilikanLahanHutan@show');
        Route::post('insert', 'KepemilikanLahanHutan@insert');
        Route::post('update/{id}', 'KepemilikanLahanHutan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'KepemilikanLahanHutan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'KepemilikanLahanHutan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'KepemilikanLahanHutan@daftar');
    });

    Route::group('kepemilikanLahanBuah', static function (): void {
        Route::get('', 'KepemilikanLahanBuah@index');
        Route::get('form/{id?}', 'KepemilikanLahanBuah@form');
        Route::get('show/{id}', 'KepemilikanLahanBuah@show');
        Route::post('insert', 'KepemilikanLahanBuah@insert');
        Route::post('update/{id}', 'KepemilikanLahanBuah@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'KepemilikanLahanBuah@delete');
        Route::get('dialog/{aksi?}/{o?}', 'KepemilikanLahanBuah@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'KepemilikanLahanBuah@daftar');
    });

    Route::group('kepemilikanLahanKebun', static function (): void {
        Route::get('', 'KepemilikanLahanKebun@index');
        Route::get('form/{id?}', 'KepemilikanLahanKebun@form');
        Route::get('show/{id}', 'KepemilikanLahanKebun@show');
        Route::post('insert', 'KepemilikanLahanKebun@insert');
        Route::post('update/{id}', 'KepemilikanLahanKebun@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'KepemilikanLahanKebun@delete');
        Route::get('dialog/{aksi?}/{o?}', 'KepemilikanLahanKebun@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'KepemilikanLahanKebun@daftar');
    });

    Route::group('jenisPopulasiTernak', static function (): void {
        Route::get('', 'JenisPopulasiTernak@index');
        Route::get('form/{id?}', 'JenisPopulasiTernak@form');
        Route::get('show/{id}', 'JenisPopulasiTernak@show');
        Route::post('insert', 'JenisPopulasiTernak@insert');
        Route::post('update/{id}', 'JenisPopulasiTernak@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'JenisPopulasiTernak@delete');
        Route::get('dialog/{aksi?}/{o?}', 'JenisPopulasiTernak@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'JenisPopulasiTernak@daftar');
    });

    Route::group('produksiPeternakan', static function (): void {
        Route::get('', 'ProduksiPeternakan@index');
        Route::get('form/{id?}', 'ProduksiPeternakan@form');
        Route::get('show/{id}', 'ProduksiPeternakan@show');
        Route::post('insert', 'ProduksiPeternakan@insert');
        Route::post('update/{id}', 'ProduksiPeternakan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'ProduksiPeternakan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'ProduksiPeternakan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'ProduksiPeternakan@daftar');
    });

    Route::group('lahanPakanTernak', static function (): void {
        Route::get('', 'LahanPakanTernak@index');
        Route::get('form/{id?}', 'LahanPakanTernak@form');
        Route::get('show/{id}', 'LahanPakanTernak@show');
        Route::post('insert', 'LahanPakanTernak@insert');
        Route::post('update/{id}', 'LahanPakanTernak@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'LahanPakanTernak@delete');
        Route::get('dialog/{aksi?}/{o?}', 'LahanPakanTernak@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'LahanPakanTernak@daftar');
    });

    Route::group('pengolahanHasilTernak', static function (): void {
        Route::get('', 'PengolahanHasilTernak@index');
        Route::get('form/{id?}', 'PengolahanHasilTernak@form');
        Route::get('show/{id}', 'PengolahanHasilTernak@show');
        Route::post('insert', 'PengolahanHasilTernak@insert');
        Route::post('update/{id}', 'PengolahanHasilTernak@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'PengolahanHasilTernak@delete');
        Route::get('dialog/{aksi?}/{o?}', 'PengolahanHasilTernak@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'PengolahanHasilTernak@daftar');
    });

    Route::group('produksiPerikanan', static function (): void {
        Route::get('', 'ProduksiPerikanan@index');
        Route::get('form/{id?}', 'ProduksiPerikanan@form');
        Route::get('show/{id}', 'ProduksiPerikanan@show');
        Route::post('insert', 'ProduksiPerikanan@insert');
        Route::post('update/{id}', 'ProduksiPerikanan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'ProduksiPerikanan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'ProduksiPerikanan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'ProduksiPerikanan@daftar');
    });

    Route::group('alatProduksiIkanTawar', static function (): void {
        Route::get('', 'AlatProduksiIkanTawar@index');
        Route::get('form/{id?}', 'AlatProduksiIkanTawar@form');
        Route::get('show/{id}', 'AlatProduksiIkanTawar@show');
        Route::post('insert', 'AlatProduksiIkanTawar@insert');
        Route::post('update/{id}', 'AlatProduksiIkanTawar@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'AlatProduksiIkanTawar@delete');
        Route::get('dialog/{aksi?}/{o?}', 'AlatProduksiIkanTawar@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'AlatProduksiIkanTawar@daftar');
    });

    Route::group('alatProduksiIkanTawar', static function (): void {
        Route::get('', 'AlatProduksiIkanTawar@index');
        Route::get('form/{id?}', 'AlatProduksiIkanTawar@form');
        Route::get('show/{id}', 'AlatProduksiIkanTawar@show');
        Route::post('insert', 'AlatProduksiIkanTawar@insert');
        Route::post('update/{id}', 'AlatProduksiIkanTawar@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'AlatProduksiIkanTawar@delete');
        Route::get('dialog/{aksi?}/{o?}', 'AlatProduksiIkanTawar@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'AlatProduksiIkanTawar@daftar');
    });

    Route::group('alatProduksiIkanLaut', static function (): void {
        Route::get('', 'AlatProduksiIkanLaut@index');
        Route::get('form/{id?}', 'AlatProduksiIkanLaut@form');
        Route::get('show/{id}', 'AlatProduksiIkanLaut@show');
        Route::post('insert', 'AlatProduksiIkanLaut@insert');
        Route::post('update/{id}', 'AlatProduksiIkanLaut@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'AlatProduksiIkanLaut@delete');
        Route::get('dialog/{aksi?}/{o?}', 'AlatProduksiIkanLaut@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'AlatProduksiIkanLaut@daftar');
    });

    Route::group('apotikHidup', static function (): void {
        Route::get('', 'ApotikHidup@index');
        Route::get('form/{id?}', 'ApotikHidup@form');
        Route::get('show/{id}', 'ApotikHidup@show');
        Route::post('insert', 'ApotikHidup@insert');
        Route::post('update/{id}', 'ApotikHidup@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'ApotikHidup@delete');
        Route::get('dialog/{aksi?}/{o?}', 'ApotikHidup@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'ApotikHidup@daftar');
    });

    Route::group('hasilProduksiPangan', static function (): void {
        Route::get('', 'HasilProduksiPangan@index');
        Route::get('form/{id?}', 'HasilProduksiPangan@form');
        Route::get('show/{id}', 'HasilProduksiPangan@show');
        Route::post('insert', 'HasilProduksiPangan@insert');
        Route::post('update/{id}', 'HasilProduksiPangan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'HasilProduksiPangan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'HasilProduksiPangan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'HasilProduksiPangan@daftar');
    });

    Route::group('hasilProduksiBuah', static function (): void {
        Route::get('', 'HasilProduksiBuah@index');
        Route::get('form/{id?}', 'HasilProduksiBuah@form');
        Route::get('show/{id}', 'HasilProduksiBuah@show');
        Route::post('insert', 'HasilProduksiBuah@insert');
        Route::post('update/{id}', 'HasilProduksiBuah@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'HasilProduksiBuah@delete');
        Route::get('dialog/{aksi?}/{o?}', 'HasilProduksiBuah@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'HasilProduksiBuah@daftar');
    });

    Route::group('hasilProduksiKebun', static function (): void {
        Route::get('', 'HasilProduksiKebun@index');
        Route::get('form/{id?}', 'HasilProduksiKebun@form');
        Route::get('show/{id}', 'HasilProduksiKebun@show');
        Route::post('insert', 'HasilProduksiKebun@insert');
        Route::post('update/{id}', 'HasilProduksiKebun@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'HasilProduksiKebun@delete');
        Route::get('dialog/{aksi?}/{o?}', 'HasilProduksiKebun@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'HasilProduksiKebun@daftar');
    });

    Route::group('depositProduksiGalian', static function (): void {
        Route::get('', 'DepositProduksiGalian@index');
        Route::get('form/{id?}', 'DepositProduksiGalian@form');
        Route::get('show/{id}', 'DepositProduksiGalian@show');
        Route::post('insert', 'DepositProduksiGalian@insert');
        Route::post('update/{id}', 'DepositProduksiGalian@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'DepositProduksiGalian@delete');
        Route::get('dialog/{aksi?}/{o?}', 'DepositProduksiGalian@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'DepositProduksiGalian@daftar');
    });

    Route::group('pemanfaatanAir', static function (): void {
        Route::get('', 'PemanfaatanAir@index');
        Route::get('form/{id?}', 'PemanfaatanAir@form');
        Route::get('show/{id}', 'PemanfaatanAir@show');
        Route::post('insert', 'PemanfaatanAir@insert');
        Route::post('update/{id}', 'PemanfaatanAir@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'PemanfaatanAir@delete');
        Route::get('dialog/{aksi?}/{o?}', 'PemanfaatanAir@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'PemanfaatanAir@daftar');
    });

    Route::group('kualitasAir', static function (): void {
        Route::get('', 'KualitasAir@index');
        Route::get('form/{id?}', 'KualitasAir@form');
        Route::get('show/{id}', 'KualitasAir@show');
        Route::post('insert', 'KualitasAir@insert');
        Route::post('update/{id}', 'KualitasAir@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'KualitasAir@delete');
        Route::get('dialog/{aksi?}/{o?}', 'KualitasAir@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'KualitasAir@daftar');
    });

    Route::group('sumberAir', static function (): void {
        Route::get('', 'SumberAir@index');
        Route::get('form/{id?}', 'SumberAir@form');
        Route::get('show/{id}', 'SumberAir@show');
        Route::post('insert', 'SumberAir@insert');
        Route::post('update/{id}', 'SumberAir@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SumberAir@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SumberAir@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SumberAir@daftar');
    });

    Route::group('sdmPekerjaan', static function (): void {
        Route::get('', 'SdmPekerjaan@index');
        Route::get('form/{id?}', 'SdmPekerjaan@form');
        Route::get('show/{id}', 'SdmPekerjaan@show');
        Route::post('insert', 'SdmPekerjaan@insert');
        Route::post('update/{id}', 'SdmPekerjaan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SdmPekerjaan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SdmPekerjaan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SdmPekerjaan@daftar');
    });

    Route::group('sdmCacat', static function (): void {
        Route::get('', 'SdmCacat@index');
        Route::get('form/{id?}', 'SdmCacat@form');
        Route::get('show/{id}', 'SdmCacat@show');
        Route::post('insert', 'SdmCacat@insert');
        Route::post('update/{id}', 'SdmCacat@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SdmCacat@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SdmCacat@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SdmCacat@daftar');
    });

    Route::group('sdmSuku', static function (): void {
        Route::get('', 'SdmSuku@index');
        Route::get('form/{id?}', 'SdmSuku@form');
        Route::get('show/{id}', 'SdmSuku@show');
        Route::post('insert', 'SdmSuku@insert');
        Route::post('update/{id}', 'SdmSuku@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SdmSuku@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SdmSuku@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SdmSuku@daftar');
    });

    Route::group('sdmTenagakerja', static function (): void {
        Route::get('', 'SdmTenagaKerja@index');
        Route::get('form/{id?}', 'SdmTenagaKerja@form');
        Route::get('show/{id}', 'SdmTenagaKerja@show');
        Route::post('insert', 'SdmTenagaKerja@insert');
        Route::post('update/{id}', 'SdmTenagaKerja@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SdmTenagaKerja@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SdmTenagaKerja@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SdmTenagaKerja@daftar');
    });

    Route::group('sdmKualitas', static function (): void {
        Route::get('', 'SdmKualitas@index');
        Route::get('form/{id?}', 'SdmKualitas@form');
        Route::get('show/{id}', 'SdmKualitas@show');
        Route::post('insert', 'SdmKualitas@insert');
        Route::post('update/{id}', 'SdmKualitas@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SdmKualitas@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SdmKualitas@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SdmKualitas@daftar');
    });

    Route::group('sdmAgama', static function (): void {
        Route::get('', 'Agama@index');
        Route::get('form/{id?}', 'Agama@form');
        Route::get('show/{id}', 'Agama@show');
        Route::post('insert', 'Agama@insert');
        Route::post('update/{id}', 'Agama@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'Agama@delete');
        Route::get('dialog/{aksi?}/{o?}', 'Agama@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'Agama@daftar');
    });

    Route::group('sdmWarganegara', static function (): void {
        Route::get('', 'Kewarganegaraan@index');
        Route::get('form/{id?}', 'Kewarganegaraan@form');
        Route::get('show/{id}', 'Kewarganegaraan@show');
        Route::post('insert', 'Kewarganegaraan@insert');
        Route::post('update/{id}', 'Kewarganegaraan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'Kewarganegaraan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'Kewarganegaraan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'Kewarganegaraan@daftar');
    });

    Route::group('airPanas', static function (): void {
        Route::get('', 'AirPanas@index');
        Route::get('form/{id?}', 'AirPanas@form');
        Route::get('show/{id}', 'AirPanas@show');
        Route::post('insert', 'AirPanas@insert');
        Route::post('update/{id}', 'AirPanas@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'AirPanas@delete');
        Route::get('dialog/{aksi?}/{o?}', 'AirPanas@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'AirPanas@daftar');
    });

    Route::group('kualitasUdara', static function (): void {
        Route::get('', 'KualitasUdara@index');
        Route::get('form/{id?}', 'KualitasUdara@form');
        Route::get('show/{id}', 'KualitasUdara@show');
        Route::post('insert', 'KualitasUdara@insert');
        Route::post('update/{id}', 'KualitasUdara@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'KualitasUdara@delete');
        Route::get('dialog/{aksi?}/{o?}', 'KualitasUdara@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'KualitasUdara@daftar');
    });

    Route::group('partisipasiPolitik', static function (): void {
        Route::get('', 'PartisipasiPolitik@index');
        Route::get('form/{id?}', 'PartisipasiPolitik@form');
        Route::get('show/{id}', 'PartisipasiPolitik@show');
        Route::post('insert', 'PartisipasiPolitik@insert');
        Route::post('update/{id}', 'PartisipasiPolitik@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'PartisipasiPolitik@delete');
        Route::get('dialog/{aksi?}/{o?}', 'PartisipasiPolitik@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'PartisipasiPolitik@daftar');
    });

    Route::group('lembagaKeamanan', static function (): void {
        Route::get('', 'LembagaKeamanan@index');
        Route::get('form/{id?}', 'LembagaKeamanan@form');
        Route::get('show/{id}', 'LembagaKeamanan@show');
        Route::post('insert', 'LembagaKeamanan@insert');
        Route::post('update/{id}', 'LembagaKeamanan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'LembagaKeamanan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'LembagaKeamanan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'LembagaKeamanan@daftar');
    });

    Route::group('jasaPengangkutan', static function (): void {
        Route::get('', 'JasaPengangkutan@index');
        Route::get('form/{id?}', 'JasaPengangkutan@form');
        Route::get('show/{id}', 'JasaPengangkutan@show');
        Route::post('insert', 'JasaPengangkutan@insert');
        Route::post('update/{id}', 'JasaPengangkutan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'JasaPengangkutan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'JasaPengangkutan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'JasaPengangkutan@daftar');
    });

    Route::group('sdmUsia', static function (): void {
        Route::get('', 'SdmUsia@index');
        Route::get('form/{id?}', 'SdmUsia@form');
        Route::get('show/{id}', 'SdmUsia@show');
        Route::post('insert', 'SdmUsia@insert');
        Route::post('update/{id}', 'SdmUsia@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SdmUsia@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SdmUsia@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SdmUsia@daftar');
    });

    Route::group('kebisingan', static function (): void {
        Route::get('', 'Kebisingan@index');
        Route::get('form/{id?}', 'Kebisingan@form');
        Route::get('show/{id}', 'Kebisingan@show');
        Route::post('insert', 'Kebisingan@insert');
        Route::post('update/{id}', 'Kebisingan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'Kebisingan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'Kebisingan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'Kebisingan@daftar');
    });

    Route::group('ruangPublik', static function (): void {
        Route::get('', 'RuangPublik@index');
        Route::get('form/{id?}', 'RuangPublik@form');
        Route::get('show/{id}', 'RuangPublik@show');
        Route::post('insert', 'RuangPublik@insert');
        Route::post('update/{id}', 'RuangPublik@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'RuangPublik@delete');
        Route::get('dialog/{aksi?}/{o?}', 'RuangPublik@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'RuangPublik@daftar');
    });

    Route::group('potensiWisata', static function (): void {
        Route::get('', 'PotensiWisata@index');
        Route::get('form/{id?}', 'PotensiWisata@form');
        Route::get('show/{id}', 'PotensiWisata@show');
        Route::post('insert', 'PotensiWisata@insert');
        Route::post('update/{id}', 'PotensiWisata@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'PotensiWisata@delete');
        Route::get('dialog/{aksi?}/{o?}', 'PotensiWisata@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'PotensiWisata@daftar');
    });

    Route::group('lembagaPendidikan', static function (): void {
        Route::get('', 'LembagaPendidikan@index');
        Route::get('form/{id?}', 'LembagaPendidikan@form');
        Route::get('show/{id}', 'LembagaPendidikan@show');
        Route::post('insert', 'LembagaPendidikan@insert');
        Route::post('update/{id}', 'LembagaPendidikan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'LembagaPendidikan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'LembagaPendidikan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'LembagaPendidikan@daftar');
    });

    Route::group('lembagaKemasyarakatan', static function (): void {
        Route::get('', 'LembagaKemasyarakatan@index');
        Route::get('form/{id?}', 'LembagaKemasyarakatan@form');
        Route::get('show/{id}', 'LembagaKemasyarakatan@show');
        Route::post('insert', 'LembagaKemasyarakatan@insert');
        Route::post('update/{id}', 'LembagaKemasyarakatan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'LembagaKemasyarakatan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'LembagaKemasyarakatan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'LembagaKemasyarakatan@daftar');
    });

    Route::group('sdmJumlah', static function (): void {
        Route::get('', 'SdmJumlah@index');
        Route::get('form/{id?}', 'SdmJumlah@form');
        Route::get('show/{id}', 'SdmJumlah@show');
        Route::post('insert', 'SdmJumlah@insert');
        Route::post('update/{id}', 'SdmJumlah@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SdmJumlah@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SdmJumlah@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SdmJumlah@daftar');
    });

    Route::group('sdmPendidikan', static function (): void {
        Route::get('', 'SdmPendidikan@index');
        Route::get('form/{id?}', 'SdmPendidikan@form');
        Route::get('show/{id}', 'SdmPendidikan@show');
        Route::post('insert', 'SdmPendidikan@insert');
        Route::post('update/{id}', 'SdmPendidikan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SdmPendidikan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SdmPendidikan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SdmPendidikan@daftar');
    });

    Route::group('prasaranaKesehatan', static function (): void {
        Route::get('', 'PrasaranaKesehatan@index');
        Route::get('form/{id?}', 'PrasaranaKesehatan@form');
        Route::get('show/{id}', 'PrasaranaKesehatan@show');
        Route::post('insert', 'PrasaranaKesehatan@insert');
        Route::post('update/{id}', 'PrasaranaKesehatan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'PrasaranaKesehatan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'PrasaranaKesehatan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'PrasaranaKesehatan@daftar');
    });

   Route::group('saranaOlahraga', static function (): void {
        Route::get('', 'SaranaOlahraga@index');
        Route::get('form/{id?}', 'SaranaOlahraga@form');
        Route::get('show/{id}', 'SaranaOlahraga@show');
        Route::post('insert', 'SaranaOlahraga@insert');
        Route::post('update/{id}', 'SaranaOlahraga@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SaranaOlahraga@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SaranaOlahraga@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SaranaOlahraga@daftar');
   });

   Route::group('lembagaPemerintah', static function (): void {
        Route::get('', 'LembagaPemerintah@index');
        Route::get('form/{id?}', 'LembagaPemerintah@form');
        Route::get('show/{id}', 'LembagaPemerintah@show');
        Route::post('insert', 'LembagaPemerintah@insert');
        Route::post('update/{id}', 'LembagaPemerintah@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'LembagaPemerintah@delete');
        Route::get('dialog/{aksi?}/{o?}', 'LembagaPemerintah@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'LembagaPemerintah@daftar');
    });

    Route::group('saranaPendidikan', static function (): void {
        Route::get('', 'SaranaPendidikan@index');
        Route::get('form/{id?}', 'SaranaPendidikan@form');
        Route::get('show/{id}', 'SaranaPendidikan@show');
        Route::post('insert', 'SaranaPendidikan@insert');
        Route::post('update/{id}', 'SaranaPendidikan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SaranaPendidikan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SaranaPendidikan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SaranaPendidikan@daftar');
    });

    Route::group('saranaWisata', static function (): void {
        Route::get('', 'SaranaWisata@index');
        Route::get('form/{id?}', 'SaranaWisata@form');
        Route::get('show/{id}', 'SaranaWisata@show');
        Route::post('insert', 'SaranaWisata@insert');
        Route::post('update/{id}', 'SaranaWisata@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SaranaWisata@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SaranaWisata@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SaranaWisata@daftar');
    });

    Route::group('prasaranaIrigasi', static function (): void {
        Route::get('', 'PrasaranaIrigasi@index');
        Route::get('form/{id?}', 'PrasaranaIrigasi@form');
        Route::get('show/{id}', 'PrasaranaIrigasi@show');
        Route::post('insert', 'PrasaranaIrigasi@insert');
        Route::post('update/{id}', 'PrasaranaIrigasi@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'PrasaranaIrigasi@delete');
        Route::get('dialog/{aksi?}/{o?}', 'PrasaranaIrigasi@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'PrasaranaIrigasi@daftar');
    });

    Route::group('lembagaEkonomi', static function (): void {
        Route::get('', 'LembagaEkonomi@index');
        Route::get('form/{id?}', 'LembagaEkonomi@form');
        Route::get('show/{id}', 'LembagaEkonomi@show');
        Route::post('insert', 'LembagaEkonomi@insert');
        Route::post('update/{id}', 'LembagaEkonomi@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'LembagaEkonomi@delete');
        Route::get('dialog/{aksi?}/{o?}', 'LembagaEkonomi@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'LembagaEkonomi@daftar');
    });

    Route::group('jasaHiburan', static function (): void {
        Route::get('', 'JasaHiburan@index');
        Route::get('form/{id?}', 'JasaHiburan@form');
        Route::get('show/{id}', 'JasaHiburan@show');
        Route::post('insert', 'JasaHiburan@insert');
        Route::post('update/{id}', 'JasaHiburan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'JasaHiburan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'JasaHiburan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'JasaHiburan@daftar');
    });

    Route::group('angkutanLainnya', static function (): void {
        Route::get('', 'AngkutanLainnya@index');
        Route::get('form/{id?}', 'AngkutanLainnya@form');
        Route::get('show/{id}', 'AngkutanLainnya@show');
        Route::post('insert', 'AngkutanLainnya@insert');
        Route::post('update/{id}', 'AngkutanLainnya@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'AngkutanLainnya@delete');
        Route::get('dialog/{aksi?}/{o?}', 'AngkutanLainnya@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'AngkutanLainnya@daftar');
    });

    Route::group('prasaranaLembagaKemasyarakatan', static function (): void {
        Route::get('', 'PrasaranaLembagaKemasyarakatan@index');
        Route::get('form/{id?}', 'PrasaranaLembagaKemasyarakatan@form');
        Route::get('show/{id}', 'PrasaranaLembagaKemasyarakatan@show');
        Route::post('insert', 'PrasaranaLembagaKemasyarakatan@insert');
        Route::post('update/{id}', 'PrasaranaLembagaKemasyarakatan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'PrasaranaLembagaKemasyarakatan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'PrasaranaLembagaKemasyarakatan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'PrasaranaLembagaKemasyarakatan@daftar');
    });

    Route::group('transportasiDarat', static function (): void {
        Route::get('', 'TransportasiDarat@index');
        Route::get('form/{id?}', 'TransportasiDarat@form');
        Route::get('show/{id}', 'TransportasiDarat@show');
        Route::post('insert', 'TransportasiDarat@insert');
        Route::post('update/{id}', 'TransportasiDarat@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'TransportasiDarat@delete');
        Route::get('dialog/{aksi?}/{o?}', 'TransportasiDarat@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'TransportasiDarat@daftar');
    });

    Route::group('prasaranaPeribadatan', static function (): void {
        Route::get('', 'PrasaranaPeribadatan@index');
        Route::get('form/{id?}', 'PrasaranaPeribadatan@form');
        Route::get('show/{id}', 'PrasaranaPeribadatan@show');
        Route::post('insert', 'PrasaranaPeribadatan@insert');
        Route::post('update/{id}', 'PrasaranaPeribadatan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'PrasaranaPeribadatan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'PrasaranaPeribadatan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'PrasaranaPeribadatan@daftar');
    });

    Route::group('sanitasi', static function (): void {
        Route::get('', 'Sanitasi@index');
        Route::get('form/{id?}', 'Sanitasi@form');
        Route::get('show/{id}', 'Sanitasi@show');
        Route::post('insert', 'Sanitasi@insert');
        Route::post('update/{id}', 'Sanitasi@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'Sanitasi@delete');
        Route::get('dialog/{aksi?}/{o?}', 'Sanitasi@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'Sanitasi@daftar');
    });

    Route::group('saranaEnergi', static function (): void {
        Route::get('', 'SaranaEnergi@index');
        Route::get('form/{id?}', 'SaranaEnergi@form');
        Route::get('show/{id}', 'SaranaEnergi@show');
        Route::post('insert', 'SaranaEnergi@insert');
        Route::post('update/{id}', 'SaranaEnergi@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SaranaEnergi@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SaranaEnergi@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SaranaEnergi@daftar');
    });

    Route::group('airBersih', static function (): void {
        Route::get('', 'AirBersih@index');
        Route::get('form/{id?}', 'AirBersih@form');
        Route::get('show/{id}', 'AirBersih@show');
        Route::post('insert', 'AirBersih@insert');
        Route::post('update/{id}', 'AirBersih@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'AirBersih@delete');
        Route::get('dialog/{aksi?}/{o?}', 'AirBersih@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'AirBersih@daftar');
    });

    Route::group('lembagaAdat', static function (): void {
        Route::get('', 'LembagaAdat@index');
        Route::get('form/{id?}', 'LembagaAdat@form');
        Route::get('show/{id}', 'LembagaAdat@show');
        Route::post('insert', 'LembagaAdat@insert');
        Route::post('update/{id}', 'LembagaAdat@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'LembagaAdat@delete');
        Route::get('dialog/{aksi?}/{o?}', 'LembagaAdat@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'LembagaAdat@daftar');
    });

    Route::group('saranaKebersihan', static function (): void {
        Route::get('', 'SaranaKebersihan@index');
        Route::get('form/{id?}', 'SaranaKebersihan@form');
        Route::get('show/{id}', 'SaranaKebersihan@show');
        Route::post('insert', 'SaranaKebersihan@insert');
        Route::post('update/{id}', 'SaranaKebersihan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SaranaKebersihan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SaranaKebersihan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SaranaKebersihan@daftar');
    });

    Route::group('saranaDusun', static function (): void {
        Route::get('', 'SaranaDusun@index');
        Route::get('form/{id?}', 'SaranaDusun@form');
        Route::get('show/{id}', 'SaranaDusun@show');
        Route::post('insert', 'SaranaDusun@insert');
        Route::post('update/{id}', 'SaranaDusun@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SaranaDusun@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SaranaDusun@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SaranaDusun@daftar');
    });

    Route::group('saranaKesehatan', static function (): void {
        Route::get('', 'SaranaKesehatan@index');
        Route::get('form/{id?}', 'SaranaKesehatan@form');
        Route::get('show/{id}', 'SaranaKesehatan@show');
        Route::post('insert', 'SaranaKesehatan@insert');
        Route::post('update/{id}', 'SaranaKesehatan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SaranaKesehatan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SaranaKesehatan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SaranaKesehatan@daftar');
    });

    Route::group('saranaDesa', static function (): void {
        Route::get('', 'SaranaDesa@index');
        Route::get('form/{id?}', 'SaranaDesa@form');
        Route::get('show/{id}', 'SaranaDesa@show');
        Route::post('insert', 'SaranaDesa@insert');
        Route::post('update/{id}', 'SaranaDesa@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SaranaDesa@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SaranaDesa@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SaranaDesa@daftar');
    });

    Route::group('badanPerwakilanDesa', static function (): void {
        Route::get('', 'BadanPerwakilanDesa@index');
        Route::get('form/{id?}', 'BadanPerwakilanDesa@form');
        Route::get('show/{id}', 'BadanPerwakilanDesa@show');
        Route::post('insert', 'BadanPerwakilanDesa@insert');
        Route::post('update/{id}', 'BadanPerwakilanDesa@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'BadanPerwakilanDesa@delete');
        Route::get('dialog/{aksi?}/{o?}', 'BadanPerwakilanDesa@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'BadanPerwakilanDesa@daftar');
    });

    Route::group('komunikasiInformasi', static function (): void {
        Route::get('', 'KomunikasiInformasi@index');
        Route::get('form/{id?}', 'KomunikasiInformasi@form');
        Route::get('show/{id}', 'KomunikasiInformasi@show');
        Route::post('insert', 'KomunikasiInformasi@insert');
        Route::post('update/{id}', 'KomunikasiInformasi@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'KomunikasiInformasi@delete');
        Route::get('dialog/{aksi?}/{o?}', 'KomunikasiInformasi@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'KomunikasiInformasi@daftar');
    });

    Route::get('perkembangan', 'PendudukDanKepalaKeluarga@index');
    Route::group('pendudukDanKepalaKeluarga', static function (): void {
        Route::get('', 'PendudukDanKepalaKeluarga@index');
        Route::get('form/{id?}', 'PendudukDanKepalaKeluarga@form');
        Route::get('show/{id}', 'PendudukDanKepalaKeluarga@show');
        Route::post('insert', 'PendudukDanKepalaKeluarga@insert');
        Route::post('update/{id}', 'PendudukDanKepalaKeluarga@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'PendudukDanKepalaKeluarga@delete');
        Route::get('dialog/{aksi?}/{o?}', 'PendudukDanKepalaKeluarga@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'PendudukDanKepalaKeluarga@daftar');
    });

    Route::group('sektorPertanian', static function (): void {
        Route::get('', 'SektorPertanian@index');
        Route::get('form/{id?}', 'SektorPertanian@form');
        Route::get('show/{id}', 'SektorPertanian@show');
        Route::post('insert', 'SektorPertanian@insert');
        Route::post('update/{id}', 'SektorPertanian@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SektorPertanian@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SektorPertanian@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SektorPertanian@daftar');
    });

    Route::group('sektorKehutanan', static function (): void {
        Route::get('', 'sektorKehutanan@index');
        Route::get('form/{id?}', 'sektorKehutanan@form');
        Route::get('show/{id}', 'sektorKehutanan@show');
        Route::post('insert', 'sektorKehutanan@insert');
        Route::post('update/{id}', 'sektorKehutanan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'sektorKehutanan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'sektorKehutanan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'sektorKehutanan@daftar');
    });

    Route::group('sektorPerkebunan', static function (): void {
        Route::get('', 'SektorPerkebunan@index');
        Route::get('form/{id?}', 'SektorPerkebunan@form');
        Route::get('show/{id}', 'SektorPerkebunan@show');
        Route::post('insert', 'SektorPerkebunan@insert');
        Route::post('update/{id}', 'SektorPerkebunan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SektorPerkebunan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SektorPerkebunan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SektorPerkebunan@daftar');
    });

    Route::group('sektorPertambangan', static function (): void {
        Route::get('', 'SektorPertambangan@index');
        Route::get('form/{id?}', 'SektorPertambangan@form');
        Route::get('show/{id}', 'SektorPertambangan@show');
        Route::post('insert', 'SektorPertambangan@insert');
        Route::post('update/{id}', 'SektorPertambangan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SektorPertambangan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SektorPertambangan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SektorPertambangan@daftar');
    });

    Route::group('sektorListrikGasDanAirMinum', static function (): void {
        Route::get('', 'SektorListrikGasDanAirMinum@index');
        Route::get('form/{id?}', 'SektorListrikGasDanAirMinum@form');
        Route::get('show/{id}', 'SektorListrikGasDanAirMinum@show');
        Route::post('insert', 'SektorListrikGasDanAirMinum@insert');
        Route::post('update/{id}', 'SektorListrikGasDanAirMinum@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SektorListrikGasDanAirMinum@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SektorListrikGasDanAirMinum@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SektorListrikGasDanAirMinum@daftar');
    });

    Route::group('sektorPeternakan', static function (): void {
        Route::get('', 'SektorPeternakan@index');
        Route::get('form/{id?}', 'SektorPeternakan@form');
        Route::get('show/{id}', 'SektorPeternakan@show');
        Route::post('insert', 'SektorPeternakan@insert');
        Route::post('update/{id}', 'SektorPeternakan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SektorPeternakan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SektorPeternakan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SektorPeternakan@daftar');
    });

    Route::group('sektorPerikanan', static function (): void {
        Route::get('', 'SektorPerikanan@index');
        Route::get('form/{id?}', 'SektorPerikanan@form');
        Route::get('show/{id}', 'SektorPerikanan@show');
        Route::post('insert', 'SektorPerikanan@insert');
        Route::post('update/{id}', 'SektorPerikanan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SektorPerikanan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SektorPerikanan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SektorPerikanan@daftar');
    });

    Route::group('sektorPerdagangan', static function (): void {
        Route::get('', 'SektorPerdagangan@index');
        Route::get('form/{id?}', 'SektorPerdagangan@form');
        Route::get('show/{id}', 'SektorPerdagangan@show');
        Route::post('insert', 'SektorPerdagangan@insert');
        Route::post('update/{id}', 'SektorPerdagangan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SektorPerdagangan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SektorPerdagangan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SektorPerdagangan@daftar');
    });

    Route::group('sektorIndustriKecilDanKerajinanRt', static function (): void {
        Route::get('', 'SektorIndustriKecilDanKerajinanRt@index');
        Route::get('form/{id?}', 'SektorIndustriKecilDanKerajinanRt@form');
        Route::get('show/{id}', 'SektorIndustriKecilDanKerajinanRt@show');
        Route::post('insert', 'SektorIndustriKecilDanKerajinanRt@insert');
        Route::post('update/{id}', 'SektorIndustriKecilDanKerajinanRt@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SektorIndustriKecilDanKerajinanRt@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SektorIndustriKecilDanKerajinanRt@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SektorIndustriKecilDanKerajinanRt@daftar');
    });

    Route::group('sektorJasa', static function (): void {
        Route::get('', 'SektorJasa@index');
        Route::get('form/{id?}', 'SektorJasa@form');
        Route::get('show/{id}', 'SektorJasa@show');
        Route::post('insert', 'SektorJasa@insert');
        Route::post('update/{id}', 'SektorJasa@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SektorJasa@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SektorJasa@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SektorJasa@daftar');
   });

   Route::group('pengangguran', static function (): void {
        Route::get('', 'Pengangguran@index');
        Route::get('form/{id?}', 'Pengangguran@form');
        Route::get('show/{id}', 'Pengangguran@show');
        Route::post('insert', 'Pengangguran@insert');
        Route::post('update/{id}', 'Pengangguran@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'Pengangguran@delete');
        Route::get('dialog/{aksi?}/{o?}', 'Pengangguran@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'Pengangguran@daftar');
    });

    Route::group('subsektorKehutanan', static function (): void {
        Route::get('', 'SubsektorKehutanan@index');
        Route::get('form/{id?}', 'SubsektorKehutanan@form');
        Route::get('show/{id}', 'SubsektorKehutanan@show');
        Route::post('insert', 'SubsektorKehutanan@insert');
        Route::post('update/{id}', 'SubsektorKehutanan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SubsektorKehutanan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SubsektorKehutanan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SubsektorKehutanan@daftar');
    });

    Route::group('sektorPerdaganganHotelDanRestoran', static function (): void {
        Route::get('', 'SektorPerdaganganHotelDanRestoran@index');
        Route::get('form/{id?}', 'SektorPerdaganganHotelDanRestoran@form');
        Route::get('show/{id}', 'SektorPerdaganganHotelDanRestoran@show');
        Route::post('insert', 'SektorPerdaganganHotelDanRestoran@insert');
        Route::post('update/{id}', 'SektorPerdaganganHotelDanRestoran@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SektorPerdaganganHotelDanRestoran@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SektorPerdaganganHotelDanRestoran@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SektorPerdaganganHotelDanRestoran@daftar');
    });

    Route::group('kesejahteraanKeluarga', static function (): void {
        Route::get('', 'KesejahteraanKeluarga@index');
        Route::get('form/{id?}', 'KesejahteraanKeluarga@form');
        Route::get('show/{id}', 'KesejahteraanKeluarga@show');
        Route::post('insert', 'KesejahteraanKeluarga@insert');
        Route::post('update/{id}', 'KesejahteraanKeluarga@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'KesejahteraanKeluarga@delete');
        Route::get('dialog/{aksi?}/{o?}', 'KesejahteraanKeluarga@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'KesejahteraanKeluarga@daftar');
    });

    Route::group('sektorKeuanganJasaPerusahaan', static function (): void {
        Route::get('', 'SektorKeuanganJasaPerusahaan@index');
        Route::get('form/{id?}', 'SektorKeuanganJasaPerusahaan@form');
        Route::get('show/{id}', 'SektorKeuanganJasaPerusahaan@show');
        Route::post('insert', 'SektorKeuanganJasaPerusahaan@insert');
        Route::post('update/{id}', 'SektorKeuanganJasaPerusahaan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SektorKeuanganJasaPerusahaan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SektorKeuanganJasaPerusahaan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SektorKeuanganJasaPerusahaan@daftar');
    });

    Route::group('sektorPertambanganDanGalian', static function (): void {
        Route::get('', 'SektorPertambanganDanGalian@index');
        Route::get('form/{id?}', 'SektorPertambanganDanGalian@form');
        Route::get('show/{id}', 'SektorPertambanganDanGalian@show');
        Route::post('insert', 'SektorPertambanganDanGalian@insert');
        Route::post('update/{id}', 'SektorPertambanganDanGalian@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SektorPertambanganDanGalian@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SektorPertambanganDanGalian@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SektorPertambanganDanGalian@daftar');
    });

    Route::group('penderitaSakit', static function (): void {
        Route::get('', 'PenderitaSakit@index');
        Route::get('form/{id?}', 'PenderitaSakit@form');
        Route::get('show/{id}', 'PenderitaSakit@show');
        Route::post('insert', 'PenderitaSakit@insert');
        Route::post('update/{id}', 'PenderitaSakit@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'PenderitaSakit@delete');
        Route::get('dialog/{aksi?}/{o?}', 'PenderitaSakit@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'PenderitaSakit@daftar');
    });

    Route::group('sektorAngkutanDanKomunikasi', static function (): void {
        Route::get('', 'SektorAngkutanDanKomunikasi@index');
        Route::get('form/{id?}', 'SektorAngkutanDanKomunikasi@form');
        Route::get('show/{id}', 'SektorAngkutanDanKomunikasi@show');
        Route::post('insert', 'SektorAngkutanDanKomunikasi@insert');
        Route::post('update/{id}', 'SektorAngkutanDanKomunikasi@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SektorAngkutanDanKomunikasi@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SektorAngkutanDanKomunikasi@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SektorAngkutanDanKomunikasi@daftar');
    });

    Route::group('subsektorKerajinan', static function (): void {
        Route::get('', 'SubsektorKerajinan@index');
        Route::get('form/{id?}', 'SubsektorKerajinan@form');
        Route::get('show/{id}', 'SubsektorKerajinan@show');
        Route::post('insert', 'SubsektorKerajinan@insert');
        Route::post('update/{id}', 'SubsektorKerajinan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SubsektorKerajinan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SubsektorKerajinan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SubsektorKerajinan@daftar');
    });

    Route::group('sektorIndustriMenengahDanBesar', static function (): void {
        Route::get('', 'SektorIndustriMenengahDanBesar@index');
        Route::get('form/{id?}', 'SektorIndustriMenengahDanBesar@form');
        Route::get('show/{id}', 'SektorIndustriMenengahDanBesar@show');
        Route::post('insert', 'SektorIndustriMenengahDanBesar@insert');
        Route::post('update/{id}', 'SektorIndustriMenengahDanBesar@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SektorIndustriMenengahDanBesar@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SektorIndustriMenengahDanBesar@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SektorIndustriMenengahDanBesar@daftar');
    });

    Route::group('rumahMenurutDinding', static function (): void {
        Route::get('', 'RumahMenurutDinding@index');
        Route::get('form/{id?}', 'RumahMenurutDinding@form');
        Route::get('show/{id}', 'RumahMenurutDinding@show');
        Route::post('insert', 'RumahMenurutDinding@insert');
        Route::post('update/{id}', 'RumahMenurutDinding@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'RumahMenurutDinding@delete');
        Route::get('dialog/{aksi?}/{o?}', 'RumahMenurutDinding@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'RumahMenurutDinding@daftar');
    });

    Route::group('rumahMenurutLantai', static function (): void {
        Route::get('', 'RumahMenurutLantai@index');
        Route::get('form/{id?}', 'RumahMenurutLantai@form');
        Route::get('show/{id}', 'RumahMenurutLantai@show');
        Route::post('insert', 'RumahMenurutLantai@insert');
        Route::post('update/{id}', 'RumahMenurutLantai@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'RumahMenurutLantai@delete');
        Route::get('dialog/{aksi?}/{o?}', 'RumahMenurutLantai@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'RumahMenurutLantai@daftar');
    });

    Route::group('rumahMenurutAtap', static function (): void {
        Route::get('', 'RumahMenurutAtap@index');
        Route::get('form/{id?}', 'RumahMenurutAtap@form');
        Route::get('show/{id}', 'RumahMenurutAtap@show');
        Route::post('insert', 'RumahMenurutAtap@insert');
        Route::post('update/{id}', 'RumahMenurutAtap@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'RumahMenurutAtap@delete');
        Route::get('dialog/{aksi?}/{o?}', 'RumahMenurutAtap@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'RumahMenurutAtap@daftar');
    });

    Route::group('pendapatanRiilKeluarga', static function (): void {
        Route::get('', 'PendapatanRiilKeluarga@index');
        Route::get('form/{id?}', 'PendapatanRiilKeluarga@form');
        Route::get('show/{id}', 'PendapatanRiilKeluarga@show');
        Route::post('insert', 'PendapatanRiilKeluarga@insert');
        Route::post('update/{id}', 'PendapatanRiilKeluarga@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'PendapatanRiilKeluarga@delete');
        Route::get('dialog/{aksi?}/{o?}', 'PendapatanRiilKeluarga@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'PendapatanRiilKeluarga@daftar');
    });

    Route::group('sektorIndustriPengolahan', static function (): void {
        Route::get('', 'SektorIndustriPengolahan@index');
        Route::get('form/{id?}', 'SektorIndustriPengolahan@form');
        Route::get('show/{id}', 'SektorIndustriPengolahan@show');
        Route::post('insert', 'SektorIndustriPengolahan@insert');
        Route::post('update/{id}', 'SektorIndustriPengolahan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SektorIndustriPengolahan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SektorIndustriPengolahan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SektorIndustriPengolahan@daftar');
    });

    Route::group('konflikSara', static function (): void {
        Route::get('', 'KonflikSara@index');
        Route::get('form/{id?}', 'KonflikSara@form');
        Route::get('show/{id}', 'KonflikSara@show');
        Route::post('insert', 'KonflikSara@insert');
        Route::post('update/{id}', 'KonflikSara@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'KonflikSara@delete');
        Route::get('dialog/{aksi?}/{o?}', 'KonflikSara@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'KonflikSara@daftar');
    });

    Route::group('perkelahian', static function (): void {
        Route::get('', 'Perkelahian@index');
        Route::get('form/{id?}', 'Perkelahian@form');
        Route::get('show/{id}', 'Perkelahian@show');
        Route::post('insert', 'Perkelahian@insert');
        Route::post('update/{id}', 'Perkelahian@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'Perkelahian@delete');
        Route::get('dialog/{aksi?}/{o?}', 'Perkelahian@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'Perkelahian@daftar');
    });

    Route::group('sektorJasaJasa', static function (): void {
        Route::get('', 'SektorJasaJasa@index');
        Route::get('form/{id?}', 'SektorJasaJasa@form');
        Route::get('show/{id}', 'SektorJasaJasa@show');
        Route::post('insert', 'SektorJasaJasa@insert');
        Route::post('update/{id}', 'SektorJasaJasa@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SektorJasaJasa@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SektorJasaJasa@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SektorJasaJasa@daftar');
    });

    Route::group('tingkatPendidikanMasyarakat', static function (): void {
        Route::get('', 'TingkatPendidikanMasyarakat@index');
        Route::get('form/{id?}', 'TingkatPendidikanMasyarakat@form');
        Route::get('show/{id}', 'TingkatPendidikanMasyarakat@show');
        Route::post('insert', 'TingkatPendidikanMasyarakat@insert');
        Route::post('update/{id}', 'TingkatPendidikanMasyarakat@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'TingkatPendidikanMasyarakat@delete');
        Route::get('dialog/{aksi?}/{o?}', 'TingkatPendidikanMasyarakat@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'TingkatPendidikanMasyarakat@daftar');
    });

    Route::group('musrenbangDesaKelurahan', static function (): void {
        Route::get('', 'MusrenbangDesaKelurahan@index');
        Route::get('form/{id?}', 'MusrenbangDesaKelurahan@form');
        Route::get('show/{id}', 'MusrenbangDesaKelurahan@show');
        Route::post('insert', 'MusrenbangDesaKelurahan@insert');
        Route::post('update/{id}', 'MusrenbangDesaKelurahan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'MusrenbangDesaKelurahan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'MusrenbangDesaKelurahan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'MusrenbangDesaKelurahan@daftar');
    });

    Route::group('wajibBelajar9Tahun', static function (): void {
      Route::get('', 'WajibBelajar9Tahun@index');
      Route::get('form/{id?}', 'WajibBelajar9Tahun@form');
      Route::get('show/{id}', 'WajibBelajar9Tahun@show');
      Route::post('insert', 'WajibBelajar9Tahun@insert');
      Route::post('update/{id}', 'WajibBelajar9Tahun@update');
      Route::match(['GET', 'POST'], 'delete/{id?}', 'WajibBelajar9Tahun@delete');
      Route::get('dialog/{aksi?}/{o?}', 'WajibBelajar9Tahun@dialog');
      Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'WajibBelajar9Tahun@daftar');
  });

  Route::group('rasioGuruDanMurid', static function (): void {
      Route::get('', 'RasioGuruDanMurid@index');
      Route::get('form/{id?}', 'RasioGuruDanMurid@form');
      Route::get('show/{id}', 'RasioGuruDanMurid@show');
      Route::post('insert', 'RasioGuruDanMurid@insert');
      Route::post('update/{id}', 'RasioGuruDanMurid@update');
      Route::match(['GET', 'POST'], 'delete/{id?}', 'RasioGuruDanMurid@delete');
      Route::get('dialog/{aksi?}/{o?}', 'RasioGuruDanMurid@dialog');
      Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'RasioGuruDanMurid@daftar');
  });

  Route::group('pencurian', static function (): void {
        Route::get('', 'Pencurian@index');
        Route::get('form/{id?}', 'Pencurian@form');
        Route::get('show/{id}', 'Pencurian@show');
        Route::post('insert', 'Pencurian@insert');
        Route::post('update/{id}', 'Pencurian@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'Pencurian@delete');
        Route::get('dialog/{aksi?}/{o?}', 'Pencurian@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'Pencurian@daftar');
    });

    Route::group('penjarahanDanPenyerobotanTanah', static function (): void {
        Route::get('', 'PenjarahanDanPenyerobotanTanah@index');
        Route::get('form/{id?}', 'PenjarahanDanPenyerobotanTanah@form');
        Route::get('show/{id}', 'PenjarahanDanPenyerobotanTanah@show');
        Route::post('insert', 'PenjarahanDanPenyerobotanTanah@insert');
        Route::post('update/{id}', 'PenjarahanDanPenyerobotanTanah@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'PenjarahanDanPenyerobotanTanah@delete');
        Route::get('dialog/{aksi?}/{o?}', 'PenjarahanDanPenyerobotanTanah@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'PenjarahanDanPenyerobotanTanah@daftar');
    });

    Route::group('perjudianPenipuanDanPenggelapan', static function (): void {
        Route::get('', 'PerjudianPenipuanDanPenggelapan@index');
        Route::get('form/{id?}', 'PerjudianPenipuanDanPenggelapan@form');
        Route::get('show/{id}', 'PerjudianPenipuanDanPenggelapan@show');
        Route::post('insert', 'PerjudianPenipuanDanPenggelapan@insert');
        Route::post('update/{id}', 'PerjudianPenipuanDanPenggelapan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'PerjudianPenipuanDanPenggelapan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'PerjudianPenipuanDanPenggelapan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'PerjudianPenipuanDanPenggelapan@daftar');
    });

    Route::group('pemakaianMirasDanNarkoba', static function (): void {
        Route::get('', 'PemakaianMirasDanNarkoba@index');
        Route::get('form/{id?}', 'PemakaianMirasDanNarkoba@form');
        Route::get('show/{id}', 'PemakaianMirasDanNarkoba@show');
        Route::post('insert', 'PemakaianMirasDanNarkoba@insert');
        Route::post('update/{id}', 'PemakaianMirasDanNarkoba@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'PemakaianMirasDanNarkoba@delete');
        Route::get('dialog/{aksi?}/{o?}', 'PemakaianMirasDanNarkoba@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'PemakaianMirasDanNarkoba@daftar');
    });

    Route::group('prostitusi', static function (): void {
        Route::get('', 'Prostitusi@index');
        Route::get('form/{id?}', 'Prostitusi@form');
        Route::get('show/{id}', 'Prostitusi@show');
        Route::post('insert', 'Prostitusi@insert');
        Route::post('update/{id}', 'Prostitusi@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'Prostitusi@delete');
        Route::get('dialog/{aksi?}/{o?}', 'Prostitusi@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'Prostitusi@daftar');
    });

    Route::group('kualitasBayi', static function (): void {
        Route::get('', 'KualitasBayi@index');
        Route::get('form/{id?}', 'KualitasBayi@form');
        Route::get('show/{id}', 'KualitasBayi@show');
        Route::post('insert', 'KualitasBayi@insert');
        Route::post('update/{id}', 'KualitasBayi@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'KualitasBayi@delete');
        Route::get('dialog/{aksi?}/{o?}', 'KualitasBayi@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'KualitasBayi@daftar');
    });

    Route::group('kelembagaanPendidikanMasyarakat', static function (): void {
      Route::get('', 'KelembagaanPendidikanMasyarakat@index');
      Route::get('form/{id?}', 'KelembagaanPendidikanMasyarakat@form');
      Route::get('show/{id}', 'KelembagaanPendidikanMasyarakat@show');
      Route::post('insert', 'KelembagaanPendidikanMasyarakat@insert');
      Route::post('update/{id}', 'KelembagaanPendidikanMasyarakat@update');
      Route::match(['GET', 'POST'], 'delete/{id?}', 'KelembagaanPendidikanMasyarakat@delete');
      Route::get('dialog/{aksi?}/{o?}', 'KelembagaanPendidikanMasyarakat@dialog');
      Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'KelembagaanPendidikanMasyarakat@daftar');
    });

    Route::group('menurutSektorUsaha', static function (): void {
        Route::get('', 'MenurutSektorUsaha@index');
        Route::get('form/{id?}', 'MenurutSektorUsaha@form');
        Route::get('show/{id}', 'MenurutSektorUsaha@show');
        Route::post('insert', 'MenurutSektorUsaha@insert');
        Route::post('update/{id}', 'MenurutSektorUsaha@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'MenurutSektorUsaha@delete');
        Route::get('dialog/{aksi?}/{o?}', 'MenurutSektorUsaha@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'MenurutSektorUsaha@daftar');
    });

    Route::group('asetTanah', static function (): void {
        Route::get('', 'AsetTanah@index');
        Route::get('form/{id?}', 'AsetTanah@form');
        Route::get('show/{id}', 'AsetTanah@show');
        Route::post('insert', 'AsetTanah@insert');
        Route::post('update/{id}', 'AsetTanah@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'AsetTanah@delete');
        Route::get('dialog/{aksi?}/{o?}', 'AsetTanah@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'AsetTanah@daftar');
    });

    Route::group('saranaTransportasiUmum', static function (): void {
        Route::get('', 'SaranaTransportasi@index');
        Route::get('form/{id?}', 'SaranaTransportasi@form');
        Route::get('show/{id}', 'SaranaTransportasi@show');
        Route::post('insert', 'SaranaTransportasi@insert');
        Route::post('update/{id}', 'SaranaTransportasi@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SaranaTransportasi@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SaranaTransportasi@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SaranaTransportasi@daftar');
    });

    Route::group('saranaProduksi', static function (): void {
        Route::get('', 'SaranaProduksi@index');
        Route::get('form/{id?}', 'SaranaProduksi@form');
        Route::get('show/{id}', 'SaranaProduksi@show');
        Route::post('insert', 'SaranaProduksi@insert');
        Route::post('update/{id}', 'SaranaProduksi@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SaranaProduksi@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SaranaProduksi@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SaranaProduksi@daftar');
    });

    Route::group('pemilikanAsetEkonomiLainnya', static function (): void {
        Route::get('', 'PemilikanAsetEkonomiLainnya@index');
        Route::get('form/{id?}', 'PemilikanAsetEkonomiLainnya@form');
        Route::get('show/{id}', 'PemilikanAsetEkonomiLainnya@show');
        Route::post('insert', 'PemilikanAsetEkonomiLainnya@insert');
        Route::post('update/{id}', 'PemilikanAsetEkonomiLainnya@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'PemilikanAsetEkonomiLainnya@delete');
        Route::get('dialog/{aksi?}/{o?}', 'PemilikanAsetEkonomiLainnya@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'PemilikanAsetEkonomiLainnya@daftar');
    });

    Route::group('kesadaranMembayarPajakDanRetribusi', static function (): void {
        Route::get('', 'KesadaranMembayarPajakDanRetribusi@index');
        Route::get('form/{id?}', 'KesadaranMembayarPajakDanRetribusi@form');
        Route::get('show/{id}', 'KesadaranMembayarPajakDanRetribusi@show');
        Route::post('insert', 'KesadaranMembayarPajakDanRetribusi@insert');
        Route::post('update/{id}', 'KesadaranMembayarPajakDanRetribusi@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'KesadaranMembayarPajakDanRetribusi@delete');
        Route::get('dialog/{aksi?}/{o?}', 'KesadaranMembayarPajakDanRetribusi@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'KesadaranMembayarPajakDanRetribusi@daftar');
    });

    Route::group('pembinaanPemerintahPusat', static function (): void {
        Route::get('', 'PembinaanPemerintahPusat@index');
        Route::get('form/{id?}', 'PembinaanPemerintahPusat@form');
        Route::get('show/{id}', 'PembinaanPemerintahPusat@show');
        Route::post('insert', 'PembinaanPemerintahPusat@insert');
        Route::post('update/{id}', 'PembinaanPemerintahPusat@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'PembinaanPemerintahPusat@delete');
        Route::get('dialog/{aksi?}/{o?}', 'PembinaanPemerintahPusat@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'PembinaanPemerintahPusat@daftar');
    });

    Route::group('pembinaanPemerintahProvinsi', static function (): void {
        Route::get('', 'PembinaanPemerintahProvinsi@index');
        Route::get('form/{id?}', 'PembinaanPemerintahProvinsi@form');
        Route::get('show/{id}', 'PembinaanPemerintahProvinsi@show');
        Route::post('insert', 'PembinaanPemerintahProvinsi@insert');
        Route::post('update/{id}', 'PembinaanPemerintahProvinsi@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'PembinaanPemerintahProvinsi@delete');
        Route::get('dialog/{aksi?}/{o?}', 'PembinaanPemerintahProvinsi@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'PembinaanPemerintahProvinsi@daftar');
    });

    Route::group('pembunuhan', static function (): void {
        Route::get('', 'Pembunuhan@index');
        Route::get('form/{id?}', 'Pembunuhan@form');
        Route::get('show/{id}', 'Pembunuhan@show');
        Route::post('insert', 'Pembunuhan@insert');
        Route::post('update/{id}', 'Pembunuhan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'Pembunuhan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'Pembunuhan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'Pembunuhan@daftar');
    });

    Route::group('penculikan', static function (): void {
        Route::get('', 'Penculikan@index');
        Route::get('form/{id?}', 'Penculikan@form');
        Route::get('show/{id}', 'Penculikan@show');
        Route::post('insert', 'Penculikan@insert');
        Route::post('update/{id}', 'Penculikan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'Penculikan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'Penculikan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'Penculikan@daftar');
    });

    Route::group('kualitasIbuHamil', static function (): void {
        Route::get('', 'KualitasIbuHamil@index');
        Route::get('form/{id?}', 'KualitasIbuHamil@form');
        Route::get('show/{id}', 'KualitasIbuHamil@show');
        Route::post('insert', 'KualitasIbuHamil@insert');
        Route::post('update/{id}', 'KualitasIbuHamil@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'KualitasIbuHamil@delete');
        Route::get('dialog/{aksi?}/{o?}', 'KualitasIbuHamil@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'KualitasIbuHamil@daftar');
    });

    Route::group('pembinaanDanPengawasanCamat', static function (): void {
        Route::get('', 'PembinaanDanPengawasanCamat@index');
        Route::get('form/{id?}', 'PembinaanDanPengawasanCamat@form');
        Route::get('show/{id}', 'PembinaanDanPengawasanCamat@show');
        Route::post('insert', 'PembinaanDanPengawasanCamat@insert');
        Route::post('update/{id}', 'PembinaanDanPengawasanCamat@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'PembinaanDanPengawasanCamat@delete');
        Route::get('dialog/{aksi?}/{o?}', 'PembinaanDanPengawasanCamat@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'PembinaanDanPengawasanCamat@daftar');
    });

    Route::group('wabahPenyakit', static function (): void {
        Route::get('', 'WabahPenyakit@index');
        Route::get('form/{id?}', 'WabahPenyakit@form');
        Route::get('show/{id}', 'WabahPenyakit@show');
        Route::post('insert', 'WabahPenyakit@insert');
        Route::post('update/{id}', 'WabahPenyakit@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'WabahPenyakit@delete');
        Route::get('dialog/{aksi?}/{o?}', 'WabahPenyakit@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'WabahPenyakit@daftar');
    });

    Route::group('angkaHarapanHidup', static function (): void {
        Route::get('', 'AngkaHarapanHidup@index');
        Route::get('form/{id?}', 'AngkaHarapanHidup@form');
        Route::get('show/{id}', 'AngkaHarapanHidup@show');
        Route::post('insert', 'AngkaHarapanHidup@insert');
        Route::post('update/{id}', 'AngkaHarapanHidup@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'AngkaHarapanHidup@delete');
        Route::get('dialog/{aksi?}/{o?}', 'AngkaHarapanHidup@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'AngkaHarapanHidup@daftar');
    });

    Route::group('pertanggungjawabanKepalaDesaLurah', static function (): void {
        Route::get('', 'PertanggungjawabanKepalaDesaLurah@index');
        Route::get('form/{id?}', 'PertanggungjawabanKepalaDesaLurah@form');
        Route::get('show/{id}', 'PertanggungjawabanKepalaDesaLurah@show');
        Route::post('insert', 'PertanggungjawabanKepalaDesaLurah@insert');
        Route::post('update/{id}', 'PertanggungjawabanKepalaDesaLurah@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'PertanggungjawabanKepalaDesaLurah@delete');
        Route::get('dialog/{aksi?}/{o?}', 'PertanggungjawabanKepalaDesaLurah@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'PertanggungjawabanKepalaDesaLurah@daftar');
    });

    Route::group('kesadaranBerbangsaDanBernegara', static function (): void {
        Route::get('', 'KesadaranBerbangsaDanBernegara@index');
        Route::get('form/{id?}', 'KesadaranBerbangsaDanBernegara@form');
        Route::get('show/{id}', 'KesadaranBerbangsaDanBernegara@show');
        Route::post('insert', 'KesadaranBerbangsaDanBernegara@insert');
        Route::post('update/{id}', 'KesadaranBerbangsaDanBernegara@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'KesadaranBerbangsaDanBernegara@delete');
        Route::get('dialog/{aksi?}/{o?}', 'KesadaranBerbangsaDanBernegara@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'KesadaranBerbangsaDanBernegara@daftar');
    });

    Route::group('semangatKegotongroyonganPenduduk', static function (): void {
        Route::get('', 'SemangatKegotongroyonganPenduduk@index');
        Route::get('form/{id?}', 'SemangatKegotongroyonganPenduduk@form');
        Route::get('show/{id}', 'SemangatKegotongroyonganPenduduk@show');
        Route::post('insert', 'SemangatKegotongroyonganPenduduk@insert');
        Route::post('update/{id}', 'SemangatKegotongroyonganPenduduk@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SemangatKegotongroyonganPenduduk@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SemangatKegotongroyonganPenduduk@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SemangatKegotongroyonganPenduduk@daftar');
    });

    Route::group('sektorBangunanKonstruksi', static function (): void {
        Route::get('', 'SektorBangunanKonstruksi@index');
        Route::get('form/{id?}', 'SektorBangunanKonstruksi@form');
        Route::get('show/{id}', 'SektorBangunanKonstruksi@show');
        Route::post('insert', 'SektorBangunanKonstruksi@insert');
        Route::post('update/{id}', 'SektorBangunanKonstruksi@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SektorBangunanKonstruksi@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SektorBangunanKonstruksi@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SektorBangunanKonstruksi@daftar');
    });

    Route::group('pembinaanPemerintahKabupatenKota', static function (): void {
        Route::get('', 'PembinaanPemerintahKabupatenKota@index');
        Route::get('form/{id?}', 'PembinaanPemerintahKabupatenKota@form');
        Route::get('show/{id}', 'PembinaanPemerintahKabupatenKota@show');
        Route::post('insert', 'PembinaanPemerintahKabupatenKota@insert');
        Route::post('update/{id}', 'PembinaanPemerintahKabupatenKota@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'PembinaanPemerintahKabupatenKota@delete');
        Route::get('dialog/{aksi?}/{o?}', 'PembinaanPemerintahKabupatenKota@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'PembinaanPemerintahKabupatenKota@daftar');
    });

    Route::group('kejahatanSeksual', static function (): void {
        Route::get('', 'KejahatanSeksual@index');
        Route::get('form/{id?}', 'KejahatanSeksual@form');
        Route::get('show/{id}', 'KejahatanSeksual@show');
        Route::post('insert', 'KejahatanSeksual@insert');
        Route::post('update/{id}', 'KejahatanSeksual@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'KejahatanSeksual@delete');
        Route::get('dialog/{aksi?}/{o?}', 'KejahatanSeksual@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'KejahatanSeksual@daftar');
    });

    Route::group('sikapDanMentalMasyarakat', static function (): void {
        Route::get('', 'SikapDanMentalMasyarakat@index');
        Route::get('form/{id?}', 'SikapDanMentalMasyarakat@form');
        Route::get('show/{id}', 'SikapDanMentalMasyarakat@show');
        Route::post('insert', 'SikapDanMentalMasyarakat@insert');
        Route::post('update/{id}', 'SikapDanMentalMasyarakat@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'SikapDanMentalMasyarakat@delete');
        Route::get('dialog/{aksi?}/{o?}', 'SikapDanMentalMasyarakat@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'SikapDanMentalMasyarakat@daftar');
      });

    Route::group('kekerasanDalamRumahTangga', static function (): void {
        Route::get('', 'KekerasanDalamRumahTangga@index');
        Route::get('form/{id?}', 'KekerasanDalamRumahTangga@form');
        Route::get('show/{id}', 'KekerasanDalamRumahTangga@show');
        Route::post('insert', 'KekerasanDalamRumahTangga@insert');
        Route::post('update/{id}', 'KekerasanDalamRumahTangga@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'KekerasanDalamRumahTangga@delete');
        Route::get('dialog/{aksi?}/{o?}', 'KekerasanDalamRumahTangga@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'KekerasanDalamRumahTangga@daftar');
    });

    Route::group('terorDanIntimidasi', static function (): void {
        Route::get('', 'TerorDanIntimidasi@index');
        Route::get('form/{id?}', 'TerorDanIntimidasi@form');
        Route::get('show/{id}', 'TerorDanIntimidasi@show');
        Route::post('insert', 'TerorDanIntimidasi@insert');
        Route::post('update/{id}', 'TerorDanIntimidasi@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'TerorDanIntimidasi@delete');
        Route::get('dialog/{aksi?}/{o?}', 'TerorDanIntimidasi@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'TerorDanIntimidasi@daftar');
    });

    Route::group('organisasiLembagaKemasyarakatan', static function (): void {
        Route::get('', 'OrganisasiLembagaKemasyarakatan@index');
        Route::get('form/{id?}', 'OrganisasiLembagaKemasyarakatan@form');
        Route::get('show/{id}', 'OrganisasiLembagaKemasyarakatan@show');
        Route::post('insert', 'OrganisasiLembagaKemasyarakatan@insert');
        Route::post('update/{id}', 'OrganisasiLembagaKemasyarakatan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'OrganisasiLembagaKemasyarakatan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'OrganisasiLembagaKemasyarakatan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'OrganisasiLembagaKemasyarakatan@daftar');
    });

    Route::group('adatIstiadat', static function (): void {
        Route::get('', 'AdatIstiadat@index');
        Route::get('form/{id?}', 'AdatIstiadat@form');
        Route::get('show/{id}', 'AdatIstiadat@show');
        Route::post('insert', 'AdatIstiadat@insert');
        Route::post('update/{id}', 'AdatIstiadat@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'AdatIstiadat@delete');
        Route::get('dialog/{aksi?}/{o?}', 'AdatIstiadat@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'AdatIstiadat@daftar');
    });

    Route::group('pelaksanaanDanPelestarianHasilPembangunan', static function (): void {
        Route::get('', 'PelaksanaanDanPelestarianHasilPembangunan@index');
        Route::get('form/{id?}', 'PelaksanaanDanPelestarianHasilPembangunan@form');
        Route::get('show/{id}', 'PelaksanaanDanPelestarianHasilPembangunan@show');
        Route::post('insert', 'PelaksanaanDanPelestarianHasilPembangunan@insert');
        Route::post('update/{id}', 'PelaksanaanDanPelestarianHasilPembangunan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'PelaksanaanDanPelestarianHasilPembangunan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'PelaksanaanDanPelestarianHasilPembangunan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'PelaksanaanDanPelestarianHasilPembangunan@daftar');
    });
    Route::group('kualitasPersalinan', static function (): void {
        Route::get('', 'KualitasPersalinan@index');
        Route::get('form/{id?}', 'KualitasPersalinan@form');
        Route::get('show/{id}', 'KualitasPersalinan@show');
        Route::post('insert', 'KualitasPersalinan@insert');
        Route::post('update/{id}', 'KualitasPersalinan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'KualitasPersalinan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'KualitasPersalinan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'KualitasPersalinan@daftar');
    });

    Route::group('pelembagaanSistemKeamanan', static function (): void {
        Route::get('', 'PelembagaanSistemKeamanan@index');
        Route::get('form/{id?}', 'PelembagaanSistemKeamanan@form');
        Route::get('show/{id}', 'PelembagaanSistemKeamanan@show');
        Route::post('insert', 'PelembagaanSistemKeamanan@insert');
        Route::post('update/{id}', 'PelembagaanSistemKeamanan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'PelembagaanSistemKeamanan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'PelembagaanSistemKeamanan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'PelembagaanSistemKeamanan@daftar');
    });

    Route::group('pasanganUsiaSuburDanKb', static function (): void {
        Route::get('', 'PasanganUsiaSuburDanKb@index');
        Route::get('form/{id?}', 'PasanganUsiaSuburDanKb@form');
        Route::get('show/{id}', 'PasanganUsiaSuburDanKb@show');
        Route::post('insert', 'PasanganUsiaSuburDanKb@insert');
        Route::post('update/{id}', 'PasanganUsiaSuburDanKb@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'PasanganUsiaSuburDanKb@delete');
        Route::get('dialog/{aksi?}/{o?}', 'PasanganUsiaSuburDanKb@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'PasanganUsiaSuburDanKb@daftar');
    });

    Route::group('perilakuHidupBersihDanSehat', static function (): void {
        Route::get('', 'PerilakuHidupBersihDanSehat@index');
        Route::get('form/{id?}', 'PerilakuHidupBersihDanSehat@form');
        Route::get('show/{id}', 'PerilakuHidupBersihDanSehat@show');
        Route::post('insert', 'PerilakuHidupBersihDanSehat@insert');
        Route::post('update/{id}', 'PerilakuHidupBersihDanSehat@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'PerilakuHidupBersihDanSehat@delete');
        Route::get('dialog/{aksi?}/{o?}', 'PerilakuHidupBersihDanSehat@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'PerilakuHidupBersihDanSehat@daftar');
    });

    Route::group('statusGiziBalita', static function (): void {
        Route::get('', 'StatusGiziBalita@index');
        Route::get('form/{id?}', 'StatusGiziBalita@form');
        Route::get('show/{id}', 'StatusGiziBalita@show');
        Route::post('insert', 'StatusGiziBalita@insert');
        Route::post('update/{id}', 'StatusGiziBalita@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'StatusGiziBalita@delete');
        Route::get('dialog/{aksi?}/{o?}', 'StatusGiziBalita@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'StatusGiziBalita@daftar');
    });

    Route::group('cakupanPemenuhanKebutuhanAirBersih', static function (): void {
        Route::get('', 'CakupanPemenuhanKebutuhanAirBersih@index');
        Route::get('form/{id?}', 'CakupanPemenuhanKebutuhanAirBersih@form');
        Route::get('show/{id}', 'CakupanPemenuhanKebutuhanAirBersih@show');
        Route::post('insert', 'CakupanPemenuhanKebutuhanAirBersih@insert');
        Route::post('update/{id}', 'CakupanPemenuhanKebutuhanAirBersih@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'CakupanPemenuhanKebutuhanAirBersih@delete');
        Route::get('dialog/{aksi?}/{o?}', 'CakupanPemenuhanKebutuhanAirBersih@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'CakupanPemenuhanKebutuhanAirBersih@daftar');
    });

    Route::group('cakupanImunisasi', static function (): void {
        Route::get('', 'CakupanImunisasi@index');
        Route::get('form/{id?}', 'CakupanImunisasi@form');
        Route::get('show/{id}', 'CakupanImunisasi@show');
        Route::post('insert', 'CakupanImunisasi@insert');
        Route::post('update/{id}', 'CakupanImunisasi@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'CakupanImunisasi@delete');
        Route::get('dialog/{aksi?}/{o?}', 'CakupanImunisasi@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'CakupanImunisasi@daftar');
    });

    Route::group('masalahKesejahteraanSosial', static function (): void {
        Route::get('', 'MasalahKesejahteraanSosial@index');
        Route::get('form/{id?}', 'MasalahKesejahteraanSosial@form');
        Route::get('show/{id}', 'MasalahKesejahteraanSosial@show');
        Route::post('insert', 'MasalahKesejahteraanSosial@insert');
        Route::post('update/{id}', 'MasalahKesejahteraanSosial@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'MasalahKesejahteraanSosial@delete');
        Route::get('dialog/{aksi?}/{o?}', 'MasalahKesejahteraanSosial@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'MasalahKesejahteraanSosial@daftar');
    });

    Route::group('perkembanganPartisipasiPolitik', static function (): void {
        Route::get('', 'PerkembanganPartisipasiPolitik@index');
        Route::get('form/{id?}', 'PerkembanganPartisipasiPolitik@form');
        Route::get('show/{id}', 'PerkembanganPartisipasiPolitik@show');
        Route::post('insert', 'PerkembanganPartisipasiPolitik@insert');
        Route::post('update/{id}', 'PerkembanganPartisipasiPolitik@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'PerkembanganPartisipasiPolitik@delete');
        Route::get('dialog/{aksi?}/{o?}', 'PerkembanganPartisipasiPolitik@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'PerkembanganPartisipasiPolitik@daftar');
    });

    Route::group('perkembanganSaranaDanPrasarana', static function (): void {
        Route::get('', 'PerkembanganSaranaDanPrasarana@index');
        Route::get('form/{id?}', 'PerkembanganSaranaDanPrasarana@form');
        Route::get('show/{id}', 'PerkembanganSaranaDanPrasarana@show');
        Route::post('insert', 'PerkembanganSaranaDanPrasarana@insert');
        Route::post('update/{id}', 'PerkembanganSaranaDanPrasarana@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'PerkembanganSaranaDanPrasarana@delete');
        Route::get('dialog/{aksi?}/{o?}', 'PerkembanganSaranaDanPrasarana@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'PerkembanganSaranaDanPrasarana@daftar');
    });

    Route::group('apbDesaDanAnggaranKelurahan', static function (): void {
        Route::get('', 'ApbDesaDanAnggaranKelurahan@index');
        Route::get('form/{id?}', 'ApbDesaDanAnggaranKelurahan@form');
        Route::get('show/{id}', 'ApbDesaDanAnggaranKelurahan@show');
        Route::post('insert', 'ApbDesaDanAnggaranKelurahan@insert');
        Route::post('update/{id}', 'ApbDesaDanAnggaranKelurahan@update');
        Route::match(['GET', 'POST'], 'delete/{id?}', 'ApbDesaDanAnggaranKelurahan@delete');
        Route::get('dialog/{aksi?}/{o?}', 'ApbDesaDanAnggaranKelurahan@dialog');
        Route::match(['GET', 'POST'], 'daftar/{aksi?}/{o?}', 'ApbDesaDanAnggaranKelurahan@daftar');
    });

    Route::group('rekapitulasi', static function (): void {
        Route::get('/', static fn () => redirect('prodeskel/rekapitulasi/profil'));
        Route::get('profil', 'Rekapitulasi@profil');
        Route::get('potensi', 'Rekapitulasi@potensi');
        Route::get('perkembangan', 'Rekapitulasi@perkembangan');
        Route::get('report/{aksi?}', 'Rekapitulasi@report');
    });

});
