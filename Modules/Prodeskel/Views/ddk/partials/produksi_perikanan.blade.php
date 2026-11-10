@php
    use Modules\Prodeskel\Enums\DDKEnum;
    use Modules\Prodeskel\Services\ProdeskelDDKPilihanServices;
@endphp

<div class="tab-pane" id="produksi-perikanan">
    {{-- 1.8 Alat produksi budidaya ikan --}}
    @include('prodeskel::ddk.components.table_3_kolom_dan_jumlah', [
        'label' => '1.8 Alat produksi budidaya ikan',
        'label_pilihan' => 'Alat Produksi Budidaya Ikan',
        'daftar_pilihan' => ProdeskelDDKPilihanServices::alatProduksiBudidayaIkan($custom_value),
        'kode_unik_tabel' => DDKEnum::KODE_ALAT_PRODUKSI_BUDIDAYA_IKAN,
        'td_judul_2' => 'Nama Alat',
        'td_judul_3' => 'Jumlah',
    ])
</div>
