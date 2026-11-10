@php
    use Modules\Prodeskel\Enums\DDKEnum;
    use Modules\Prodeskel\Services\ProdeskelDDKPilihanServices;
    use Modules\Prodeskel\Enums\DDKPilihanProduksiTahunIniEnum;
@endphp

<div class="tab-pane" id="tanaman-pangan">
    <div class="col-md-12" style="display: flow-root; overflow-x: scroll">
        <div class="col-lg-8 col-md-12">
            <div class="input-group input-group-sm">
                <select class="form-control input-sm select2" multiple style="width:100%;" id="pilihan_produksi_tahun_ini">
                    <option disabled selected value="">----- Cari dan Pilih (bisa pilih lebih dari 1) -----</option>
                    @foreach (ProdeskelDDKPilihanServices::produksiTahunIni($custom_value) as $optgroup => $komoditas_per_grup)
                        <optgroup label="{{ $optgroup }}">
                            @foreach ($komoditas_per_grup as $item)
                                <option value="{{ $item['kode'] }}" data-kategori="{{ $optgroup }}" data-satuan="{{ $item['satuan'] }}">{{ $item['komoditas'] }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
                <span class="input-group-btn">
                    <button type="button" class="btn btn-info" id="tambahkan_produksi_tahun_ini"><i class="fa fa-plus"></i>&nbsp;Tambahkan Produksi Tahun Ini</button>
                </span>
            </div>
        </div>
        <div style="margin: 3px 0;border: 0;" class="col-sm-12"></div>
        <table id="table_produksi_tahun_ini" class="col-xs-push-1 col-xs-11">
            <tr>
                <th>Kode</th>
                <th>Komoditas</th>
                <th>Jumlah Pohon</th>
                <th>Luas Panen (m<sup>2</sup>)</th>
                <th>Nilai Produksi</th>
                <th>Satuan</th>
                <th>Pemasaran Hasil</th>
            </tr>
            @foreach (ProdeskelDDKPilihanServices::produksiTahunIni($custom_value) as $kategori => $komoditas_per_grup)
                @foreach ($komoditas_per_grup as $item)
                    @php
                        $ddk_produksi_field = $item['kode'];
                        $produksi_tahun_ini = $item['komoditas'];
                        $is_jumlah_pohon = DDKPilihanProduksiTahunIniEnum::PENGATURAN[$kategori]['jumlah_pohon'];
                        $is_luas_panen = DDKPilihanProduksiTahunIniEnum::PENGATURAN[$kategori]['luas_panen'];
                        $ddk_produksi_data = $ddk->produksi ? $ddk->produksi->firstWhere('kode_komoditas', $ddk_produksi_field) : false;
                    @endphp
                    @if ($ddk_produksi_data)
                        <tr>
                            <td>{{ $ddk_produksi_field }}</td>
                            <td>{{ $produksi_tahun_ini }}</td>
                            <td>
                                @if ($is_jumlah_pohon)
                                    <input name="produksi_tahun_ini[{{ $ddk_produksi_field }}][jumlah_pohon]" maxlength="11" class="form-control input-sm bilangan_titik" type="text" value="{{ $ddk_produksi_data->jumlah_pohon }}">
                                @endif
                            </td>
                            <td>
                                @if ($is_luas_panen)
                                    <input name="produksi_tahun_ini[{{ $ddk_produksi_field }}][luas_panen]" maxlength="20" class="form-control input-sm bilangan_titik" type="text" value="{{ $ddk_produksi_data->luas_panen }}">
                                @endif
                            </td>
                            <td>
                                <input name="produksi_tahun_ini[{{ $ddk_produksi_field }}][nilai_produksi_per_satuan]" maxlength="20" class="form-control input-sm bilangan_titik" type="text" value="{{ $ddk_produksi_data->nilai_produksi_per_satuan }}">
                            </td>
                            <td>{{ $item['satuan'] }}</td>
                            <td>
                                <input name="produksi_tahun_ini[{{ $ddk_produksi_field }}][pemasaran_hasil]" maxlength="150" class="form-control input-sm alamat" type="text" value="{{ $ddk_produksi_data->pemasaran_hasil }}">
                            </td>
                        </tr>
                    @endif
                @endforeach
            @endforeach
        </table>
    </div>
</div>
