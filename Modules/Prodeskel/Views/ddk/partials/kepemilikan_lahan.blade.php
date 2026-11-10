@php
    use Modules\Prodeskel\Enums\DDKEnum;
    use Modules\Prodeskel\Services\ProdeskelDDKPilihanServices;
@endphp

<div class="tab-pane" id="kepemilikan-lahan">
    {{-- 1.5 Kepemilikan Lahan --}}
    <div class="col-md-12" style="display: flow-root">
        <div class="col-lg-8 col-md-12">
            <div class="input-group input-group-sm">
                @include('prodeskel::ddk.components.select_pilihan_prodeskel', ['class' => 'select2', 'attribut' => 'multiple id="pilihan_kepemilikan_lahan"', 'pilihan' => ProdeskelDDKPilihanServices::kepemilikanLahan($custom_value)])
                <span class="input-group-btn">
                    <button type="button" class="btn btn-info" id="tambahkan_kepemilikan_lahan"><i class="fa fa-plus"></i>&nbsp;Tambahkan Kepemilikan Lahan</button>
                </span>
            </div>
        </div>
        <div style="margin: 3px 0;border: 0;" class="col-sm-12"></div>
        <table id="table_kepemilikan_lahan" class="col-xs-push-1 col-md-7 col-sm-11 col-xs-11">
            <tr>
                <th>Kode</th>
                <th>Jenis Lahan</th>
                <th>Luas Lahan (ha)</th>
            </tr>
            @foreach (ProdeskelDDKPilihanServices::kepemilikanLahan($custom_value) as $ddk_field => $kepemilikan_lahan)
                @if (array_key_exists($ddk_field, $ddk->detailKeluarga[DDKEnum::KODE_KEPEMILIKAN_LAHAN]->value ?? []))
                    <tr>
                        <td>{{ $ddk_field }}</td>
                        <td>{{ $kepemilikan_lahan }}</td>
                        <td>
                            @include('prodeskel::ddk.components.select_pilihan_prodeskel', [
                                'class' => 'select2',
                                'attribut' => 'name="' . DDKEnum::KODE_KEPEMILIKAN_LAHAN . '[' . $ddk_field . ']"',
                                'pilihan' => DDKEnum::valuesOf(DDKEnum::KODE_KEPEMILIKAN_LAHAN_CHECKBOX),
                                'selected_value' => $ddk->detailKeluarga[DDKEnum::KODE_KEPEMILIKAN_LAHAN]->value[$ddk_field],
                            ])
                        </td>
                    </tr>
                @endif
            @endforeach
        </table>
    </div>
</div>
