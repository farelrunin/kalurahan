@php
    use Modules\Prodeskel\Enums\DDKEnum;
    use Modules\Prodeskel\Services\ProdeskelDDKPilihanServices;
@endphp

<div class="tab-pane" id="jenis-ternak">
    {{-- 1.7 Kepemilikan Jenis Ternak Keluarga Tahun ini --}}
    @include('prodeskel::ddk.components.table_3_kolom_dan_jumlah', [
        'label' => '1.7 Kepemilikan Jenis Ternak Keluarga Tahun ini',
        'label_pilihan' => 'Kepemilikan Ternak',
        'daftar_pilihan' => ProdeskelDDKPilihanServices::kepemilikanJenisTernak($custom_value),
        'kode_unik_tabel' => DDKEnum::KODE_KEPEMILIKAN_JENIS_TERNAK_KELUARGA_TAHUN_INI,
        'td_judul_2' => 'Jenis Binatang Ternak',
        'td_judul_3' => 'Jumlah (ekor)',
    ])
</div>
