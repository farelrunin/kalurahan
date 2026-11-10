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
            <th>Jenis Seni Yang Dikuasai</th>
            <th>Jumlah Penghasilan Dari Seni</th>
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
                <td>{{ $data->jenis_seni_yang_dikuasai['jenis_seni_value'] }} - {{ $data->jenis_seni_yang_dikuasai['sub_jenis_seni'] }}</td>
                <td>{{ $data->jumlah_penghasilan_dari_seni }} </td>
                <td>{{ tgl_indo($data->tanggal_pengisian) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
