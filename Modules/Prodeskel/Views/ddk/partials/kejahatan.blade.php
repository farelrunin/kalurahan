@php
    use Modules\Prodeskel\Enums\DDKEnum;
    use Modules\Prodeskel\Services\ProdeskelDDKPilihanServices;
@endphp

<div class="tab-pane" id="kejahatan">
    {{-- 1.31 Pemakaian Miras dan Narkoba --}}
    @include('prodeskel::ddk.components.pilihan_multiple', [
        'label' => '1.31 Pemakaian Miras dan Narkoba',
        'daftar_pilihan' => ProdeskelDDKPilihanServices::pemakaianMirasDanNarkoba($custom_value),
        'kode_unik_tabel' => DDKEnum::KODE_PEMAKAIAN_MIRAS_DAN_NARKOBA,
        'value_to_be_compared' => $ddk->detailKeluarga[DDKEnum::KODE_PEMAKAIAN_MIRAS_DAN_NARKOBA]->value ?? [],
    ])
    {{-- 1.32 Pembunuhan --}}
    @include('prodeskel::ddk.components.pilihan_multiple', [
        'label' => '1.32 Pembunuhan',
        'daftar_pilihan' => ProdeskelDDKPilihanServices::pembunuhan($custom_value),
        'kode_unik_tabel' => DDKEnum::KODE_PEMBUNUHAN,
        'value_to_be_compared' => $ddk->detailKeluarga[DDKEnum::KODE_PEMBUNUHAN]->value ?? [],
    ])
    {{-- 1.33 Penculikan --}}
    @include('prodeskel::ddk.components.pilihan_multiple', [
        'label' => '1.33 Penculikan',
        'daftar_pilihan' => ProdeskelDDKPilihanServices::penculikan($custom_value),
        'kode_unik_tabel' => DDKEnum::KODE_PENCULIKAN,
        'value_to_be_compared' => $ddk->detailKeluarga[DDKEnum::KODE_PENCULIKAN]->value ?? [],
    ])
    {{-- 1.34 Kejahatan seksual --}}
    @include('prodeskel::ddk.components.pilihan_multiple', [
        'label' => '1.34 Kejahatan seksual',
        'daftar_pilihan' => ProdeskelDDKPilihanServices::kejahatanSeksual($custom_value),
        'kode_unik_tabel' => DDKEnum::KODE_KEJAHATAN_SEKSUAL,
        'value_to_be_compared' => $ddk->detailKeluarga[DDKEnum::KODE_KEJAHATAN_SEKSUAL]->value ?? [],
    ])
    {{-- 1.35 Kekerasan Dalam Keluarga/Rumah Tangga --}}
    @include('prodeskel::ddk.components.pilihan_multiple', [
        'label' => '1.35 Kekerasan Dalam Keluarga/Rumah Tangga',
        'daftar_pilihan' => ProdeskelDDKPilihanServices::kekerasanDalamKeluargaAtauRumahTangga($custom_value),
        'kode_unik_tabel' => DDKEnum::KODE_KEKERASAN_DALAM_KELUARGA_ATAU_RUMAH_TANGGA,
        'value_to_be_compared' => $ddk->detailKeluarga[DDKEnum::KODE_KEKERASAN_DALAM_KELUARGA_ATAU_RUMAH_TANGGA]->value ?? [],
    ])
    {{-- 1.36 Masalah Kesejahteraan Keluarga --}}
    @include('prodeskel::ddk.components.pilihan_multiple', [
        'label' => '1.36 Masalah Kesejahteraan Keluarga {sync}',
        'daftar_pilihan' => ProdeskelDDKPilihanServices::masalahKesejahteraanKeluarga($custom_value),
        'kode_unik_tabel' => DDKEnum::KODE_MASALAH_KESEJAHTERAAN_KELUARGA,
        'value_to_be_compared' => $ddk->detailKeluarga[DDKEnum::KODE_MASALAH_KESEJAHTERAAN_KELUARGA]->value ?? [],
    ])
</div>
