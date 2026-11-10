@php
    use Modules\Prodeskel\Enums\DDKEnum;
    use Modules\Prodeskel\Services\ProdeskelDDKPilihanServices;
@endphp

<div class="tab-pane" id="fasilitas-umum">
    {{-- (Pertolongan Persalinan) 1.18 Kualitas Persalinan dalam Keluarga (jika ada/pernah ada) --}}
    @include('prodeskel::ddk.components.table_3_kolom_dan_jumlah', [
        'label' => '1.18.b Kualitas Pertolongan Persalinan dalam Keluarga (jika ada/pernah ada) ',
        'label_pilihan' => 'Kualitas Persalinan dalam Keluarga',
        'daftar_pilihan' => ProdeskelDDKPilihanServices::pilihanKualitasPertolonganPersalinan($custom_value),
        'kode_unik_tabel' => DDKEnum::KODE_KUALITAS_PERTOLONGAN_PERSALINAN,
        'td_judul_2' => 'Pertolongan Persalinan',
        'td_judul_3' => 'Jumlah',
    ])
    <hr style="margin: 3px 0 10px 0; width:100%">
    <hr style="margin: 3px 0 10px 0; width:100%">
    {{-- 1.9 Pemanfaatan Danau/Sungai/Waduk/situ/Mata Air oleh Keluarga --}}
    @include('prodeskel::ddk.components.pilihan_multiple', [
        'label' => '1.9 Pemanfaatan Danau/Sungai/Waduk/situ/Mata Air oleh Keluarga',
        'daftar_pilihan' => ProdeskelDDKPilihanServices::pemanfaatanDanauSungaiWadukSituMataAir($custom_value),
        'kode_unik_tabel' => DDKEnum::KODE_PEMANFAATAN_DANAU_SUNGAI_WADUK_SITU_MATA_AIR_OLEH_KELUARGA,
        'value_to_be_compared' => $ddk->detailKeluarga[DDKEnum::KODE_PEMANFAATAN_DANAU_SUNGAI_WADUK_SITU_MATA_AIR_OLEH_KELUARGA]->value ?? [],
    ])
    {{-- 1.10 Lembaga Pendidikan Yang Dimiliki Keluarga/Komunitas --}}
    @include('prodeskel::ddk.components.pilihan_multiple', [
        'label' => '1.10 Lembaga Pendidikan Yang Dimiliki Keluarga/Komunitas',
        'daftar_pilihan' => ProdeskelDDKPilihanServices::lembagaPendidikan($custom_value),
        'kode_unik_tabel' => DDKEnum::KODE_LEMBAGA_PENDIDIKAN_YANG_DIMILIKI_KELUARGA_KOMUNITAS,
        'value_to_be_compared' => $ddk->detailKeluarga[DDKEnum::KODE_LEMBAGA_PENDIDIKAN_YANG_DIMILIKI_KELUARGA_KOMUNITAS]->value ?? [],
    ])
    {{-- 1.12 Aset Sarana Transportasi Umum --}}
    @include('prodeskel::ddk.components.pilihan_multiple', [
        'label' => '1.12 Aset Sarana Transportasi Umum',
        'daftar_pilihan' => ProdeskelDDKPilihanServices::asetSaranaTransportasiUmum($custom_value),
        'kode_unik_tabel' => DDKEnum::KODE_ASET_SARANA_TRANSPORTASI_UMUM,
        'value_to_be_compared' => $ddk->detailKeluarga[DDKEnum::KODE_ASET_SARANA_TRANSPORTASI_UMUM]->value ?? [],
    ])
    {{-- 1.13 Aset Sarana Produksi --}}
    @include('prodeskel::ddk.components.pilihan_multiple', [
        'label' => '1.13 Aset Sarana Produksi',
        'daftar_pilihan' => ProdeskelDDKPilihanServices::asetSaranaProduksi($custom_value),
        'kode_unik_tabel' => DDKEnum::KODE_ASET_SARANA_PRODUKSI,
        'value_to_be_compared' => $ddk->detailKeluarga[DDKEnum::KODE_ASET_SARANA_PRODUKSI]->value ?? [],
    ])
</div>
