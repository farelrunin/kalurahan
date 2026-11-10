<table class="table table-responsive">
    <thead>
        <tr>
            <th><input type="checkbox" id="checkall"></th>
            <th>No. RTM</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Status Dasar Penduduk</th>
            <th>No. RTM Tercatat di Presisi</th>
            <th>No. RTM Seharusnya</th>
            <th>Jml Pakaian Yang Dimiliki</th>
            <th>Frekwensi Beli Pakaian Pertahun</th>
            <th>Jenis Pakaian</th>
            <th>Frekwensi Ganti Pakaian</th>
            <th>Tmpt Cuci Pakaian</th>
            <th>Jml Pakaian Seragam</th>
            <th>Jml Pakaian Sembahyang</th>
            <th>Jml Pakaian Kerja</th>
            <th>Tanggal<br>Pengisian</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataTidakSinkron as $data)
            <tr>
                <td><input type="checkbox" name="id_cb[]" value="{{ $data->uuid }}" /></td>
                <td>{{ $data->rtm->no_kk }}</td>
                <td>{{ $data->penduduk->nik }}</td>
                <td>{{ $data->penduduk->nama }}</td>
                <td>{{ App\Enums\StatusDasarEnum::valueOf($data->penduduk->status_dasar) }}</td>
                <td>{{ $data->rtm_aktif }}</td>
                <td>{{ $data->rtm_sebelumnya }}</td>
                <td>{{ $data->jml_pakaian_yg_dimiliki }} </td>
                <td>{{ $data->frekwensi_beli_pakaian_pertahun }} </td>
                <td>{{ $data->jenis_pakaian }} </td>
                <td>{{ $data->frekwensi_ganti_pakaian }} </td>
                <td>{{ $data->tmpt_cuci_pakaian }} </td>
                <td>{{ $data->jml_pakaian_seragam }} </td>
                <td>{{ $data->jml_pakaian_sembahyang }} </td>
                <td>{{ $data->jml_pakaian_kerja }} </td>
                <td>{{ tgl_indo($data->tanggal_pengisian) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
