@php
    use Modules\Prodeskel\Enums\DDKEnum;
    use Modules\Prodeskel\Services\ProdeskelDDKPilihanServices;
@endphp

<div class="tab-pane" id="kesehatan">
    {{-- 1.17 Kualitas Bayi dalam Keluarga (jika ada/pernah ada bayi) --}}
    @include('prodeskel::ddk.components.pilihan_multiple', [
        'label' => '1.17 Kualitas Bayi dalam Keluarga (jika ada/pernah ada bayi)',
        'daftar_pilihan' => ProdeskelDDKPilihanServices::kualitasBayi($custom_value),
        'kode_unik_tabel' => DDKEnum::KODE_KUALITAS_BAYI,
        'value_to_be_compared' => $ddk->detailKeluarga[DDKEnum::KODE_KUALITAS_BAYI]->value ?? [],
    ])
    {{-- (Tempat Persalinan) 1.18 Kualitas Persalinan dalam Keluarga (jika ada/pernah ada) --}}
    @include('prodeskel::ddk.components.pilihan_multiple', [
        'label' => '1.18.a Kualitas Tempat Persalinan dalam Keluarga (jika ada/pernah ada)',
        'daftar_pilihan' => ProdeskelDDKPilihanServices::pilihanKualitasTempatPersalinan($custom_value),
        'kode_unik_tabel' => DDKEnum::KODE_KUALITAS_TEMPAT_PERSALINAN,
        'value_to_be_compared' => $ddk->detailKeluarga[DDKEnum::KODE_KUALITAS_TEMPAT_PERSALINAN]->value ?? [],
    ])
    {{-- 1.19 Cakupan Imunisasi --}}
    @include('prodeskel::ddk.components.pilihan_multiple', [
        'label' => '1.19 Cakupan Imunisasi',
        'daftar_pilihan' => ProdeskelDDKPilihanServices::cakupanImunisasi($custom_value),
        'kode_unik_tabel' => DDKEnum::KODE_CAKUPAN_IMUNISASI,
        'value_to_be_compared' => $ddk->detailKeluarga[DDKEnum::KODE_CAKUPAN_IMUNISASI]->value ?? [],
    ])
    {{-- 1.20 Penderita Sakit dan Kelainan dalam Keluarga (jika ada/pernah) --}}
    @include('prodeskel::ddk.components.pilihan_multiple', [
        'label' => '1.20 Penderita Sakit dan Kelainan dalam Keluarga (jika ada/pernah)',
        'daftar_pilihan' => ProdeskelDDKPilihanServices::penderitaSakitKelainan($custom_value),
        'kode_unik_tabel' => DDKEnum::KODE_PENDERITA_SAKIT_DAN_KELAINAN,
        'value_to_be_compared' => $ddk->detailKeluarga[DDKEnum::KODE_PENDERITA_SAKIT_DAN_KELAINAN]->value ?? [],
    ])
    {{-- 1.25 Jenis Penyakit yang diderita Anggota Keluarga --}}
    @include('prodeskel::ddk.components.pilihan_multiple', [
        'label' => '1.25 Jenis Penyakit yang diderita Anggota Keluarga {sync}',
        'daftar_pilihan' => ProdeskelDDKPilihanServices::jenisPenyakitAnggotaKeluaga($custom_value),
        'kode_unik_tabel' => DDKEnum::KODE_JENIS_PENYAKIT_ANGGOTA_KELUARGA,
        'value_to_be_compared' => $ddk->detailKeluarga[DDKEnum::KODE_JENIS_PENYAKIT_ANGGOTA_KELUARGA]->value ?? [],
    ])
</div>
