@php
    use Modules\Prodeskel\Enums\DDKEnum;
    use Modules\Prodeskel\Services\ProdeskelDDKPilihanServices;
@endphp

<div class="tab-pane active" id="penghasilan-keluarga">
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label class="control-label" for="jumlah_penghasilan_perbulan">1.1 Jumlah Penghasilan Perbulan</label>
            <input name="jumlah_penghasilan_perbulan" maxlength="100" class="form-control input-sm bilangan_titik" type="text" value="{{ $ddk->jumlah_penghasilan_perbulan }}">
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label class="control-label" for="jumlah_pengeluaran_perbulan">1.2 Jumlah Pengeluaran Perbulan</label>
            <input name="jumlah_pengeluaran_perbulan" maxlength="100" class="form-control input-sm bilangan_titik" type="text" value="{{ $ddk->jumlah_pengeluaran_perbulan }}">
        </div>
    </div>
    {{-- 1.3 Status Kepemilikan Rumah --}}
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label class="control-label" for="status_kepemilikan_rumah">1.3 Status Kepemilikan Rumah</label>
            @include('prodeskel::ddk.components.select_pilihan_prodeskel', [
                'class' => 'select2',
                'attribut' => 'name="' . DDKEnum::KODE_STATUS_KEPEMILIKAN_RUMAH . '"',
                'pilihan' => ProdeskelDDKPilihanServices::statusKepemilikanRumah($custom_value),
                'selected_value' => $ddk->detailKeluarga[DDKEnum::KODE_STATUS_KEPEMILIKAN_RUMAH]->value ?? '',
            ])
        </div>
    </div>
    {{-- 1.11 Penguasaan Aset Tanah oleh Keluarga --}}
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label class="control-label" for="penguasaan_aset_tanah">1.11 Penguasaan Aset Tanah oleh Keluarga</label>
            @include('prodeskel::ddk.components.select_pilihan_prodeskel', [
                'class' => 'select2',
                'attribut' => 'name="' . DDKEnum::KODE_PENGUASAAN_ASET_TANAH_OLEH_KELUARGA . '"',
                'pilihan' => ProdeskelDDKPilihanServices::penguasaanAsetTanah($custom_value),
                'selected_value' => $ddk->detailKeluarga[DDKEnum::KODE_PENGUASAAN_ASET_TANAH_OLEH_KELUARGA]->value ?? '',
            ])
        </div>
    </div>
    {{-- 1.21 Perilaku hidup bersih dan sehat dalam Keluarga --}}
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label class="control-label" for="hidup_bersih_sehat">1.21 Perilaku hidup bersih dan sehat dalam
                Keluarga</label>
            @include('prodeskel::ddk.components.select_pilihan_prodeskel', [
                'class' => 'select2',
                'attribut' => 'name="' . DDKEnum::KODE_PERILAKU_HIDUP_BERSIH_SEHAT . '"',
                'pilihan' => ProdeskelDDKPilihanServices::perilakuHidupBersihSehat($custom_value),
                'selected_value' => $ddk->detailKeluarga[DDKEnum::KODE_PERILAKU_HIDUP_BERSIH_SEHAT]->value ?? '',
            ])
        </div>
    </div>
    {{-- 1.22 Pola makan Keluarga --}}
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label class="control-label" for="pola_makan_keluarga">1.22 Pola makan Keluarga</label>
            @include('prodeskel::ddk.components.select_pilihan_prodeskel', [
                'class' => 'select2',
                'attribut' => 'name="' . DDKEnum::KODE_POLA_MAKAN_KELUARGA . '"',
                'pilihan' => ProdeskelDDKPilihanServices::polaMakanKeluarga($custom_value),
                'selected_value' => $ddk->detailKeluarga[DDKEnum::KODE_POLA_MAKAN_KELUARGA]->value ?? '',
            ])
        </div>
    </div>
    {{-- 1.23 Kebiasaan berobat bila sakit dalam keluarga --}}
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label class="control-label" for="pengobatan_bila_sakit">1.23 Kebiasaan berobat bila sakit dalam
                keluarga</label>
            @include('prodeskel::ddk.components.select_pilihan_prodeskel', [
                'class' => 'select2',
                'attribut' => 'name="' . DDKEnum::KODE_KEBIASAAN_BEROBAT_BILA_SAKIT . '"',
                'pilihan' => ProdeskelDDKPilihanServices::kebiasaanBerobatBilaSakit($custom_value),
                'selected_value' => $ddk->detailKeluarga[DDKEnum::KODE_KEBIASAAN_BEROBAT_BILA_SAKIT]->value ?? '',
            ])
        </div>
    </div>
    {{-- 1.24 Status Gizi Balita dalam Keluarga --}}
    <div class="col-lg-4 col-md-6">
        <div class="form-group">
            <label class="control-label" for="status_gizi_balita">1.24 Status Gizi Balita dalam Keluarga</label>
            @include('prodeskel::ddk.components.select_pilihan_prodeskel', [
                'class' => 'select2',
                'attribut' => 'name="' . DDKEnum::KODE_STATUS_GIZI_BALITA . '"',
                'pilihan' => ProdeskelDDKPilihanServices::statusGiziBalita($custom_value),
                'selected_value' => $ddk->detailKeluarga[DDKEnum::KODE_STATUS_GIZI_BALITA]->value ?? '',
            ])
        </div>
    </div>
</div>
