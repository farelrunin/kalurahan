@php
    use Modules\Prodeskel\Enums\DDKEnum;
    use Modules\Prodeskel\Services\ProdeskelDDKPilihanServices;
@endphp

<div class="tab-pane" id="kerukunan">
    {{-- 1.26 Kerukunan --}}
    @include('prodeskel::ddk.components.pilihan_multiple', [
        'label' => '1.26 Kerukunan',
        'daftar_pilihan' => ProdeskelDDKPilihanServices::kerukunan($custom_value),
        'kode_unik_tabel' => DDKEnum::KODE_KERUKUNAN,
        'value_to_be_compared' => $ddk->detailKeluarga[DDKEnum::KODE_KERUKUNAN]->value ?? [],
    ])
    {{-- 1.27 Perkelahian --}}
    @include('prodeskel::ddk.components.pilihan_multiple', [
        'label' => '1.27 Perkelahian',
        'daftar_pilihan' => ProdeskelDDKPilihanServices::perkelahian($custom_value),
        'kode_unik_tabel' => DDKEnum::KODE_PERKELAHIAN,
        'value_to_be_compared' => $ddk->detailKeluarga[DDKEnum::KODE_PERKELAHIAN]->value ?? [],
    ])
    {{-- 1.28 Pencurian --}}
    @include('prodeskel::ddk.components.pilihan_multiple', [
        'label' => '1.28 Pencurian',
        'daftar_pilihan' => ProdeskelDDKPilihanServices::pencurian($custom_value),
        'kode_unik_tabel' => DDKEnum::KODE_PENCURIAN,
        'value_to_be_compared' => $ddk->detailKeluarga[DDKEnum::KODE_PENCURIAN]->value ?? [],
    ])
    {{-- 1.29 Penjarahan --}}
    @include('prodeskel::ddk.components.pilihan_multiple', [
        'label' => '1.29 Penjarahan',
        'daftar_pilihan' => ProdeskelDDKPilihanServices::penjarahan($custom_value),
        'kode_unik_tabel' => DDKEnum::KODE_PENJARAHAN,
        'value_to_be_compared' => $ddk->detailKeluarga[DDKEnum::KODE_PENJARAHAN]->value ?? [],
    ])
    {{-- 1.30 Perjudian --}}
    @include('prodeskel::ddk.components.pilihan_multiple', [
        'label' => '1.30 Perjudian',
        'daftar_pilihan' => ProdeskelDDKPilihanServices::perjudian($custom_value),
        'kode_unik_tabel' => DDKEnum::KODE_PERJUDIAN,
        'value_to_be_compared' => $ddk->detailKeluarga[DDKEnum::KODE_PERJUDIAN]->value ?? [],
    ])
</div>
