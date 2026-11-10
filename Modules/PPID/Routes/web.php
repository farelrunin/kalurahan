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

// FRONTEND
Route::group('ppid', ['namespace' => 'PPID/FrontEnd'], static function (): void {
    Route::get('/', 'PublikController@index')->name('ppid.index');
    Route::get('/single-page', 'PublikController@singlePage')->name('ppid.single-page');
    Route::get('/ambil-banner', 'PublikController@ambilBanner')->name('ppid.ambil-banner');
    Route::get('/form-keberatan', 'PermohonanKeberatanController@formKeberatan')->name('ppid.form-keberatan');
    Route::post('/simpan-keberatan', 'PermohonanKeberatanController@simpanKeberatan')->name('ppid.simpan-keberatan');
    Route::post('/daftar-keberatan', 'PermohonanKeberatanController@daftarKeberatan')->name('ppid.daftar-keberatan');
    Route::post('/cari-permohonan-informasi', 'PermohonanKeberatanController@cariPermohonanInformasi')->name('ppid.cari-permohonan-informasi');
    Route::get('/dokumen/{id}', 'PublikController@show')->name('dokumen.show');
    Route::get('/dokumen/{id}/download', 'PublikController@download')->name('ppid.download-dokumen');
    Route::get('/form-permohonan', 'PermohonanController@formPermohonan')->name('ppid.form-permohonan');
    Route::post('/simpan-permohonan', 'PermohonanController@simpanPermohonan')->name('ppid.simpan-permohonan');
    Route::post('/status-permohonan', 'PermohonanController@statusPermohonan')->name('ppid.status-permohonan');
    Route::get('page/{tipe}/{id}', 'PageController@index')->name('ppid.page.index');
});

// BACKEND
Route::group('ppid', ['namespace' => 'PPID/BackEnd'], static function (): void {

    // Daftar Dokumen
    Route::group('daftar-dokumen', static function (): void {
        Route::get('/', 'DaftarDokumenController@index')->name('ppid.daftar-dokumen');
        Route::get('/datatables', 'DaftarDokumenController@datatables')->name('ppid.daftar-dokumen.datatables');

        Route::post('/cari-permohonan-informasi', 'DaftarDokumenController@cariPermohonanInformasi')->name('ppid.daftar-dokumen.cari-permohonan-informasi');
        // Menambahkan route insert, edit dan detail
        Route::get('/form/{id?}/{readonly?}', 'DaftarDokumenController@form')->name('ppid.daftar-dokumen.form');

        // Menambahkan route store dan update
        Route::post('/store', 'DaftarDokumenController@store')->name('ppid.daftar-dokumen.store');
        Route::post('/update/{id}', 'DaftarDokumenController@update')->name('ppid.daftar-dokumen.update');

        // Route untuk delete dokumen
        Route::get('/delete/{id}', 'DaftarDokumenController@delete')->name('ppid.daftar-dokumen.delete');
        Route::post('/delete_all', 'DaftarDokumenController@delete_all')->name('ppid.daftar-dokumen.delete_all');
        Route::get('/soft-delete/{id}', 'DaftarDokumenController@softDelete')->name('ppid.daftar-dokumen.soft_delete'); // Soft delet

        // Route untuk menampilkan berkas
        Route::get('/tampilkan_berkas/{id}', 'DaftarDokumenController@tampilkanBerkas')->name('ppid.daftar-dokumen.tampilkan_berkas');
    });

    // Jenis Dokumen
    Route::group('jenis-dokumen', static function (): void {
        Route::get('/', 'JenisDokumenController@index');
    });

    // Pengaturan
    Route::group('pengaturan', static function (): void {
        Route::get('/', 'PengaturanController@index');
        Route::get('ambil-banner', 'PengaturanController@ambilBanner')->name('ppid.pengaturan.ambil-banner');
        Route::post('simpan-banner', 'PengaturanController@simpanBanner')->name('ppid.pengaturan.simpan-banner');
        Route::post('simpan-pengaturan', 'PengaturanController@simpanPengaturan')->name('ppid.pengaturan.simpan-pengaturan');
    });

    Route::group('jenis-dokumen', static function (): void {
        Route::get('/', 'JenisDokumenController@index')->name('ppid.jenis-dokumen.index');
        Route::get('datatables', 'JenisDokumenController@datatables')->name('ppid.jenis-dokumen.datatables');
        Route::get('edit/{id}', 'JenisDokumenController@edit')->name('ppid.jenis-dokumen.edit');
        Route::post('/', 'JenisDokumenController@store')->name('ppid.jenis-dokumen.store');
        Route::post('delete-all', 'JenisDokumenController@deleteAll')->name('ppid.jenis-dokumen.delete-all');
        Route::put('{id}', 'JenisDokumenController@update')->name('ppid.jenis-dokumen.update');
        Route::delete('{id}', 'JenisDokumenController@destroy')->name('ppid.jenis-dokumen.destroy');
        Route::get('/lock/{id}', 'JenisDokumenController@toggleLock')->name('ppid.jenis-dokumen.lock');
        Route::post('tukar', 'JenisDokumenController@tukar')->name('ppid.jenis-dokumen.tukar');

        // restore dan delete permanen
        Route::post('restore/{id}', 'JenisDokumenController@restore')->name('ppid.jenis-dokumen.restore');
        Route::delete('delete-permanen/{id}', 'JenisDokumenController@deletePermanen')->name('ppid.jenis-dokumen.delete-permanen');

    });

    // Permohonan Informasi
    Route::group('permohonan-informasi', static function (): void {
        Route::get('/', 'PermohonanInformasiController@index')->name('ppid.permohonan-informasi.index');
        Route::get('datatables', 'PermohonanInformasiController@datatables')->name('ppid.permohonan-informasi.datatables');
        Route::put('{uuid}', 'PermohonanInformasiController@update')->name('ppid.permohonan-informasi.update');
        Route::post('update-tindak-lanjut-all/{status}', 'PermohonanInformasiController@updateTindakLanjutAll')->name('ppid.permohonan-informasi.update-tindak-lanjut-all');
    });

    // Permohonan Keberatan
    Route::group('permohonan-keberatan', static function (): void {
        Route::get('/', 'PermohonanKeberatanController@index')->name('ppid.permohonan-keberatan.index');
        Route::get('datatables', 'PermohonanKeberatanController@datatables')->name('ppid.permohonan-keberatan.datatables');
        Route::put('{uuid}', 'PermohonanKeberatanController@update')->name('ppid.permohonan-keberatan.update');
        Route::post('update-tindak-lanjut-all', 'PermohonanKeberatanController@updateTindakLanjutAll')->name('ppid.permohonan-keberatan.update-tindak-lanjut-all');
    });

    Route::group('menu', static function (): void {
        Route::get('', 'MenuController@index')->name('ppid.menu.index');
        Route::get('index', 'MenuController@index')->name('ppid.menu.index-default');
        Route::get('datatables', 'MenuController@datatables')->name('ppid.menu.datatables');
        Route::get('ajax_menu/{parent}/{id?}', 'MenuController@ajax_menu')->name('ppid.menu.ajax_menu');
        Route::post('insert/{parent}', 'MenuController@insert')->name('ppid.menu.insert');
        Route::post('update/{parent}/{id}', 'MenuController@update')->name('ppid.menu.update');
        Route::match(['GET', 'POST'], 'delete/{parent}/{id?}', 'MenuController@delete')->name('ppid.menu.delete');
        Route::get('lock/{parent}/{id}', 'MenuController@lock')->name('ppid.menu.lock');
        Route::post('tukar', 'MenuController@tukar')->name('ppid.menu.tukar');
    });
});
