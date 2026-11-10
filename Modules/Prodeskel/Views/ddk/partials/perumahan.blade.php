@php
    use Modules\Prodeskel\Enums\DDKEnum;
    use Modules\Prodeskel\Services\ProdeskelDDKPilihanServices;
@endphp

<div class="tab-pane" id="perumahan">
    {{-- 1.14 Aset Perumahan (Dinding) --}}
    @include('prodeskel::ddk.components.pilihan_multiple', [
        'label' => '1.14 Aset Perumahan (Dinding)',
        'daftar_pilihan' => ProdeskelDDKPilihanServices::asetPerumahanDinding($custom_value),
        'kode_unik_tabel' => DDKEnum::KODE_ASET_PERUMAHAN_DINDING,
        'value_to_be_compared' => $ddk->detailKeluarga[DDKEnum::KODE_ASET_PERUMAHAN_DINDING]->value ?? [],
    ])
    {{-- 1.14 Aset Perumahan (Lantai) --}}
    @include('prodeskel::ddk.components.pilihan_multiple', [
        'label' => '1.14 Aset Perumahan (Lantai)',
        'daftar_pilihan' => ProdeskelDDKPilihanServices::asetPerumahanLantai($custom_value),
        'kode_unik_tabel' => DDKEnum::KODE_ASET_PERUMAHAN_LANTAI,
        'value_to_be_compared' => $ddk->detailKeluarga[DDKEnum::KODE_ASET_PERUMAHAN_LANTAI]->value ?? [],
    ])
    {{-- 1.14 Aset Perumahan (Atap) --}}
    @include('prodeskel::ddk.components.pilihan_multiple', [
        'label' => '1.14 Aset Perumahan (Atap)',
        'daftar_pilihan' => ProdeskelDDKPilihanServices::asetPerumahanAtap($custom_value),
        'kode_unik_tabel' => DDKEnum::KODE_ASET_PERUMAHAN_ATAP,
        'value_to_be_compared' => $ddk->detailKeluarga[DDKEnum::KODE_ASET_PERUMAHAN_ATAP]->value ?? [],
    ])
    {{-- 1.15 Aset Lainnya dalam Keluarga --}}
    @include('prodeskel::ddk.components.pilihan_multiple', [
        'label' => '1.15 Aset Lainnya dalam Keluarga',
        'daftar_pilihan' => ProdeskelDDKPilihanServices::asetLainnya($custom_value),
        'kode_unik_tabel' => DDKEnum::KODE_ASET_LAINNYA,
        'value_to_be_compared' => $ddk->detailKeluarga[DDKEnum::KODE_ASET_LAINNYA]->value ?? [],
    ])
    {{-- 1.16 Kualitas Ibu Hamil dalam Keluarga (jika ada/pernah ada ibu hamil/nifas) --}}
    @include('prodeskel::ddk.components.pilihan_multiple', [
        'label' => '1.16 Kualitas Ibu Hamil dalam Keluarga (jika ada/pernah ada ibu hamil/nifas)',
        'daftar_pilihan' => ProdeskelDDKPilihanServices::kualitasIbuHamil($custom_value),
        'kode_unik_tabel' => DDKEnum::KODE_KUALITAS_IBU_HAMIL,
        'value_to_be_compared' => $ddk->detailKeluarga[DDKEnum::KODE_KUALITAS_IBU_HAMIL]->value ?? [],
    ])
</div>
