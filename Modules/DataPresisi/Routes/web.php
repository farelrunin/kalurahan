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
 * Hak Cipta 2016 - 2024 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
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
 * @copyright Hak Cipta 2016 - 2024 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
 * @license   http://www.gnu.org/licenses/gpl.html GPL V3
 * @link      https://github.com/OpenSID/OpenSID
 *
 */

//  BACKEND
Route::group('data_presisi', ['namespace' => 'DataPresisi/BackEnd'], static function (): void {
    // Papan
    Route::group('papan', static function (): void {
        Route::get('/', 'PapanController@index')->name('data-presisi.papan.index');
        Route::get('/{id}', 'PapanController@form')->name('data-presisi.papan.edit');
        Route::get('/show/{id}', 'PapanController@show')->name('data-presisi.papan.show');
        Route::post('/update/{id}', 'PapanController@update')->name('data-presisi.papan.update');
        Route::get('ajax_cetak/{aksi?}', 'PapanController@ajax_cetak')->name('data-presisi.papan.ajax-cetak');
        Route::post('cetak/{aksi?}/{privasi_nik?}', 'PapanController@cetak')->name('data-presisi.papan.cetak');
        Route::get('ajax_export/{aksi?}', 'PapanController@ajax_export')->name('data-presisi.papan.ajax-export');
        Route::post('export/{privasi_nik?}', 'PapanController@export')->name('data-presisi.papan.export');
        Route::get('periksa/{tahun}', 'PapanController@periksa')->name('data-presisi.papan.periksa');
        Route::post('deleteDataGanda', 'PapanController@deleteDataGanda')->name('data-presisi.papan.deleteDataGanda');
        Route::post('pindahkanRTM', 'PapanController@pindahkanRTM')->name('data-presisi.papan.pindahkanRTM');
    });
    
    // sandang
    Route::group('sandang', static function (): void {
        Route::get('/', 'SandangController@index')->name('data-presisi.sandang.index');
        Route::get('/{id}', 'SandangController@form')->name('data-presisi.sandang.edit');
        Route::get('/show/{id}', 'SandangController@show')->name('data-presisi.sandang.show');
        Route::post('/update/{id}', 'SandangController@update')->name('data_presisi.sandang.update');
        Route::get('ajax_cetak/{aksi?}', 'SandangController@ajax_cetak')->name('data-presisi.sandang.ajax-cetak');
        Route::post('cetak/{aksi?}/{privasi_nik?}', 'SandangController@cetak')->name('data-presisi.sandang.cetak');
        Route::get('ajax_export/{aksi?}', 'SandangController@ajax_export')->name('data-presisi.sandang.ajax-export');
        Route::post('export/{privasi_nik?}', 'SandangController@export')->name('data-presisi.sandang.export');
        Route::get('periksa/{tahun}', 'SandangController@periksa')->name('data-presisi.sandang.periksa');
        Route::post('deleteDataGanda', 'SandangController@deleteDataGanda')->name('data-presisi.sandang.deleteDataGanda');
        Route::post('pindahkanRTM', 'SandangController@pindahkanRTM')->name('data-presisi.sandang.pindahkanRTM');
    });

    // pangan
    Route::group('pangan', static function (): void {
        Route::get('/lahan-pangan', 'PanganController@lahanPanganAjax')->name('data-presisi.pangan.lahan-pangan');
        Route::get('/', 'PanganController@index')->name('data-presisi.pangan.index');
        Route::get('/form/{rtm_id?}/{id?}', 'PanganController@formTanah')->name('data-presisi.pangan.form_tanah');
        Route::get('/{id}', 'PanganController@form')->name('data-presisi.pangan.edit');
        Route::get('/show/{id}', 'PanganController@show')->name('data-presisi.pangan.show');
        Route::post('/update/{id?}', 'PanganController@update')->name('data_presisi.pangan.update');
        Route::post('/updateStatus/{id}', 'PanganController@updateStatus')->name('data_presisi.pangan.update-status');
        Route::get('ajax_cetak/{aksi?}', 'PanganController@ajax_cetak')->name('data-presisi.pangan.ajax-cetak');
        Route::post('cetak/{aksi?}/{privasi_nik?}', 'PanganController@cetak')->name('data-presisi.pangan.cetak');
        Route::get('ajax_export/{aksi?}', 'PanganController@ajax_export')->name('data-presisi.pangan.ajax-export');
        Route::post('export/{privasi_nik?}', 'PanganController@export')->name('data-presisi.pangan.export');
        Route::get('/delete/{rtm_id?}/{id?}', 'PanganController@delete')->name('data-presisi.pangan.delete');
        Route::post('/delete_all/{rtm_id?}', 'PanganController@delete_all')->name('data-presisi.pangan.delete_all');
        Route::get('periksa/{tahun}', 'PanganController@periksa')->name('data-presisi.pangan.periksa');
        Route::post('deleteDataGanda', 'PanganController@deleteDataGanda')->name('data-presisi.pangan.deleteDataGanda');
        Route::post('pindahkanRTM', 'PanganController@pindahkanRTM')->name('data-presisi.pangan.pindahkanRTM');
    });

    // kesehatan
    Route::group('kesehatan', static function (): void {
        Route::get('/', 'KesehatanController@index')->name('data-presisi.kesehatan.index');
        Route::get('/{id}', 'KesehatanController@form')->name('data-presisi.kesehatan.edit');
        Route::get('/show/{id}', 'KesehatanController@show')->name('data-presisi.kesehatan.show');
        Route::post('/update/{id}', 'KesehatanController@update')->name('data_presisi.kesehatan.update');
        Route::get('ajax_cetak/{aksi?}', 'KesehatanController@ajax_cetak')->name('data-presisi.kesehatan.ajax-cetak');
        Route::post('cetak/{aksi?}/{privasi_nik?}', 'KesehatanController@cetak')->name('data-presisi.kesehatan.cetak');
        Route::get('ajax_export/{aksi?}', 'KesehatanController@ajax_export')->name('data-presisi.kesehatan.ajax-export');
        Route::post('export/{privasi_nik?}', 'KesehatanController@export')->name('data-presisi.kesehatan.export');
        Route::get('periksa/{tahun}', 'KesehatanController@periksa')->name('data-presisi.kesehatan.periksa');
        Route::post('deleteDataGanda', 'KesehatanController@deleteDataGanda')->name('data-presisi.kesehatan.deleteDataGanda');
        Route::post('pindahkanRTM', 'KesehatanController@pindahkanRTM')->name('data-presisi.kesehatan.pindahkanRTM');
    });

    // Jaminan Sosial
    Route::group('jaminan-sosial', static function (): void {
        Route::get('/', 'JaminanSosialController@index')->name('data-presisi.jaminan-sosial.index');
        Route::get('/{id}', 'JaminanSosialController@form')->name('data-presisi.jaminan-sosial.edit');
        Route::get('/show/{id}', 'JaminanSosialController@show')->name('data-presisi.jaminan-sosial.show');
        Route::post('/update/{id}', 'JaminanSosialController@update')->name('data-presisi.jaminan-sosial.update');
        Route::get('ajax_cetak/{aksi?}', 'JaminanSosialController@ajax_cetak')->name('data-presisi.jaminan-sosial.ajax-cetak');
        Route::post('cetak/{aksi?}/{privasi_nik?}', 'JaminanSosialController@cetak')->name('data-presisi.jaminan-sosial.cetak');
        Route::get('ajax_export/{aksi?}', 'JaminanSosialController@ajax_export')->name('data-presisi.jaminan-sosial.ajax-export');
        Route::post('export/{privasi_nik?}', 'JaminanSosialController@export')->name('data-presisi.jaminan-sosial.export');
        Route::get('periksa/{tahun}', 'JaminanSosialController@periksa')->name('data-presisi.jaminan-sosial.periksa');
        Route::post('deleteDataGanda', 'JaminanSosialController@deleteDataGanda')->name('data-presisi.jaminan-sosial.deleteDataGanda');
        Route::post('pindahkanRTM', 'JaminanSosialController@pindahkanRTM')->name('data-presisi.jaminan-sosial.pindahkanRTM');
    });

    // pendidikan
    Route::group('pendidikan', static function (): void {
        Route::get('/', 'PendidikanController@index')->name('data-presisi.pendidikan.index');
        Route::get('/{id}', 'PendidikanController@form')->name('data-presisi.pendidikan.edit');
        Route::get('/show/{id}', 'PendidikanController@show')->name('data-presisi.pendidikan.show');
        Route::post('/update/{id}', 'PendidikanController@update')->name('data_presisi.pendidikan.update');
        Route::get('ajax_cetak/{aksi?}', 'PendidikanController@ajax_cetak')->name('data-presisi.pendidikan.ajax-cetak');
        Route::post('cetak/{aksi?}/{privasi_nik?}', 'PendidikanController@cetak')->name('data-presisi.pendidikan.cetak');
        Route::get('ajax_export/{aksi?}', 'PendidikanController@ajax_export')->name('data-presisi.pendidikan.ajax-export');
        Route::post('export/{privasi_nik?}', 'PendidikanController@export')->name('data-presisi.pendidikan.export');
        Route::get('periksa/{tahun}', 'PendidikanController@periksa')->name('data-presisi.pendidikan.periksa');
        Route::post('deleteDataGanda', 'PendidikanController@deleteDataGanda')->name('data-presisi.pendidikan.deleteDataGanda');
        Route::post('pindahkanRTM', 'PendidikanController@pindahkanRTM')->name('data-presisi.pendidikan.pindahkanRTM');
    });

    // ketenagakerjaan
    Route::group('ketenagakerjaan', static function (): void {
        Route::get('/', 'KetenagakerjaanController@index')->name('data-presisi.ketenagakerjaan.index');
        Route::get('/{id}', 'KetenagakerjaanController@form')->name('data-presisi.ketenagakerjaan.edit');
        Route::get('/show/{id}', 'KetenagakerjaanController@show')->name('data-presisi.ketenagakerjaan.show');
        Route::post('/update/{id}', 'KetenagakerjaanController@update')->name('data_presisi.ketenagakerjaan.update');
        Route::get('ajax_cetak/{aksi?}', 'KetenagakerjaanController@ajax_cetak')->name('data-presisi.ketenagakerjaan.ajax-cetak');
        Route::post('cetak/{aksi?}/{privasi_nik?}', 'KetenagakerjaanController@cetak')->name('data-presisi.ketenagakerjaan.cetak');
        Route::get('ajax_export/{aksi?}', 'KetenagakerjaanController@ajax_export')->name('data-presisi.ketenagakerjaan.ajax-export');
        Route::post('export/{privasi_nik?}', 'KetenagakerjaanController@export')->name('data-presisi.ketenagakerjaan.export');
        Route::get('periksa/{tahun}', 'KetenagakerjaanController@periksa')->name('data-presisi.ketenagakerjaan.periksa');
        Route::post('deleteDataGanda', 'KetenagakerjaanController@deleteDataGanda')->name('data-presisi.ketenagakerjaan.deleteDataGanda');
        Route::post('pindahkanRTM', 'KetenagakerjaanController@pindahkanRTM')->name('data-presisi.ketenagakerjaan.pindahkanRTM');
    });

    // seni budaya
    Route::group('seni_budaya', static function (): void {
        Route::get('/', 'SeniBudayaController@index')->name('data-presisi.seni-budaya.index');
        Route::get('/{id}', 'SeniBudayaController@form')->name('data-presisi.seni-budaya.edit');
        Route::get('/show/{id}', 'SeniBudayaController@show')->name('data-presisi.seni-budaya.show');
        Route::post('/update/{id}', 'SeniBudayaController@update')->name('data_presisi.seni-budaya.update');
        Route::get('ajax_cetak/{aksi?}', 'SeniBudayaController@ajax_cetak')->name('data-presisi.seni-budaya.ajax-cetak');
        Route::post('cetak/{aksi?}/{privasi_nik?}', 'SeniBudayaController@cetak')->name('data-presisi.seni-budaya.cetak');
        Route::get('ajax_export/{aksi?}', 'SeniBudayaController@ajax_export')->name('data-presisi.seni-budaya.ajax-export');
        Route::post('export/{privasi_nik?}', 'SeniBudayaController@export')->name('data-presisi.seni-budaya.export');
        Route::get('periksa/{tahun}', 'SeniBudayaController@periksa')->name('data-presisi.seni-budaya.periksa');
        Route::post('deleteDataGanda', 'SeniBudayaController@deleteDataGanda')->name('data-presisi.seni-budaya.deleteDataGanda');
        Route::post('pindahkanRTM', 'SeniBudayaController@pindahkanRTM')->name('data-presisi.seni-budaya.pindahkanRTM');
    });

    Route::group('pengaturan', static function (): void {
        Route::get('', 'PengaturanController@index')->name('data-presisi.pengaturan.index');        
        Route::get('delete/{id}', 'PengaturanController@delete')->name('data-presisi.pengaturan.delete');
        Route::get('lock/{id}', 'PengaturanController@lock')->name('data-presisi.pengaturan.lock');
        Route::get('salin/{id}', 'PengaturanController@salinForm')->name('data-presisi.pengaturan.salin-form');
        Route::post('salin/{id}', 'PengaturanController@salin')->name('data-presisi.pengaturan.salin');
    });

    // aktivitas keadatan
    Route::group('aktivitas-adat', static function (): void {
        Route::get('/', 'AktivitasAdatController@index')->name('data-presisi.aktivitas-adat.index');
        Route::get('/{id}', 'AktivitasAdatController@form')->name('data-presisi.aktivitas-adat.edit');
        Route::get('/show/{id}', 'AktivitasAdatController@show')->name('data-presisi.aktivitas-adat.show');
        Route::post('/update/{id}', 'AktivitasAdatController@update')->name('data_presisi.aktivitas-adat.update');
        Route::get('ajax_cetak/{aksi?}', 'AktivitasAdatController@ajax_cetak')->name('data-presisi.aktivitas-adat.ajax-cetak');
        Route::post('cetak/{aksi?}/{privasi_nik?}', 'AktivitasAdatController@cetak')->name('data-presisi.aktivitas-adat.cetak');
        Route::get('ajax_export/{aksi?}', 'AktivitasAdatController@ajax_export')->name('data-presisi.aktivitas-adat.ajax-export');
        Route::post('export/{privasi_nik?}', 'AktivitasAdatController@export')->name('data-presisi.aktivitas-adat.export');
        Route::get('periksa/{tahun}', 'AktivitasAdatController@periksa')->name('data-presisi.aktivitas-adat.periksa');
        Route::post('deleteDataGanda', 'AktivitasAdatController@deleteDataGanda')->name('data-presisi.aktivitas-adat.deleteDataGanda');
        Route::post('pindahkanRTM', 'AktivitasAdatController@pindahkanRTM')->name('data-presisi.aktivitas-adat.pindahkanRTM');
    });
    // aktivitas keagamaan
    Route::group('aktivitas-agama', static function (): void {
        Route::get('/', 'AktivitasAgamaController@index')->name('data-presisi.aktivitas-agama.index');
        Route::get('/{id}', 'AktivitasAgamaController@form')->name('data-presisi.aktivitas-agama.edit');
        Route::get('/show/{id}', 'AktivitasAgamaController@show')->name('data-presisi.aktivitas-agama.show');
        Route::post('/update/{id}', 'AktivitasAgamaController@update')->name('data_presisi.aktivitas-agama.update');
        Route::get('ajax_cetak/{aksi?}', 'AktivitasAgamaController@ajax_cetak')->name('data-presisi.aktivitas-agama.ajax-cetak');
        Route::post('cetak/{aksi?}/{privasi_nik?}', 'AktivitasAgamaController@cetak')->name('data-presisi.aktivitas-agama.cetak');
        Route::get('ajax_export/{aksi?}', 'AktivitasAgamaController@ajax_export')->name('data-presisi.aktivitas-agama.ajax-export');
        Route::post('export/{privasi_nik?}', 'AktivitasAgamaController@export')->name('data-presisi.aktivitas-agama.export');
        Route::get('periksa/{tahun}', 'AktivitasAgamaController@periksa')->name('data-presisi.aktivitas-agama.periksa');
        Route::post('deleteDataGanda', 'AktivitasAgamaController@deleteDataGanda')->name('data-presisi.aktivitas-agama.deleteDataGanda');
        Route::post('pindahkanRTM', 'AktivitasAgamaController@pindahkanRTM')->name('data-presisi.aktivitas-agama.pindahkanRTM');
    });

});

// FRONTEND
Route::group('data_presisi', ['namespace' => 'DataPresisi/FrontEnd'], static function (): void {
    // Papan
    Route::group('papan', static function (): void {
        // Route::get('/', 'PapanController@index')->name('data_presisi.papan.index');
    });
});
