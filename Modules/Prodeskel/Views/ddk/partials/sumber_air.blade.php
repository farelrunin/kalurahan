@php
    use Modules\Prodeskel\Enums\DDKEnum;
    use Modules\Prodeskel\Services\ProdeskelDDKPilihanServices;
@endphp

<div class="tab-pane" id="sumber-air">
    {{-- 1.4 Sumber Air Minum --}}
    <div class="col-md-12" style="display: flow-root">
        <label class="control-label col-lg-4 col-md-12" style="padding: 0">1.4 Sumber Air Minum yang digunakan anggota
            keluarga</label>
        <div class="col-lg-8 col-md-12">
            <div class="input-group input-group-sm">
                @include('prodeskel::ddk.components.select_pilihan_prodeskel', ['class' => 'select2', 'attribut' => 'multiple id="pilihan_sumber_air_minum"', 'pilihan' => ProdeskelDDKPilihanServices::sumberAirMinum($custom_value)])
                <span class="input-group-btn">
                    <button type="button" class="btn btn-info" id="tambahkan_sumber_air_minum"><i class="fa fa-plus"></i>&nbsp;Tambahkan Sumber Air Minum</button>
                </span>
            </div>
        </div>
        <div style="margin: 3px 0;border: 0;" class="col-sm-12"></div>
        <table id="table_sumber_air_minum" class="col-xs-push-1 col-md-7 col-sm-11 col-xs-11">
            <tr>
                <th>Kode</th>
                <th>Sumber Air Minum</th>
                <th>Kondisi Sumber Air Minum</th>
            </tr>
            @foreach (ProdeskelDDKPilihanServices::sumberAirMinum($custom_value) as $ddk_field => $sumber_air_minum)
                @if (array_key_exists($ddk_field, $ddk->detailKeluarga[DDKEnum::KODE_SUMBER_AIR_MINUM]->value ?? []))
                    <tr>
                        <td>{{ $ddk_field }}</td>
                        <td>{{ $sumber_air_minum }}</td>
                        <td>
                            @include('prodeskel::ddk.components.select_pilihan_prodeskel', [
                                'class' => 'select2',
                                'attribut' => 'name="' . DDKEnum::KODE_SUMBER_AIR_MINUM . '[' . $ddk_field . ']"',
                                'pilihan' => DDKEnum::valuesOf(DDKEnum::KODE_SUMBER_AIR_MINUM_CHECKBOX),
                                'selected_value' => $ddk->detailKeluarga[DDKEnum::KODE_SUMBER_AIR_MINUM]->value[$ddk_field],
                            ])
                        </td>
                    </tr>
                @endif
            @endforeach
        </table>
    </div>
</div>
