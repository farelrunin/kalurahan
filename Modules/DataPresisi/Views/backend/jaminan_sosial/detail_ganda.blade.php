<table class="table table-responsive">
    <thead>
        <tr>
            <th><input type="checkbox" id="checkall"></th>
            <th>No. RTM</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Jenis Bantuan Sosial Yang Pernah Diterima</th>
            <th>Jenis Gangguan Mental Yang Diderita</th>
            <th>Jenis Penanganan Penderita Gangguan Mental</th>
            <th>Tanggal<br>Pengisian</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataGanda as $data)
            <tr>
                <td><input type="checkbox" name="id_cb[]" value="{{ $data->uuid }}" /></td>
                <td>{{ $data->rtm->no_kk }}</td>
                <td>{{ $data->penduduk->nik }}</td>
                <td>{{ $data->penduduk->nama }}</td>
                <td>{{ $data->jns_bantuan }}</td>
                <td>{{ $data->jns_gangguan_mental }}</td>
                <td>{{ $data->terapi_gangguan_mental }}</td>
                <td>{{ $data->tanggal_pengisian ? tgl_indo($data->tanggal_pengisian) : '-' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
