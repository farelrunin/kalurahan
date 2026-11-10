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
            <th>Jenis Pekerjaan</th>
            <th>Tempat Kerja</th>
            <th>Frekwensi Mengikuti Pelatihan</th>
            <th>Jenis Pelatihan</th>
            <th>Tanggal<br>Pengisian</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataTidakSinkron as $data)
            <tr>
                <td><input type="checkbox" name="id_cb[]" value="{{ $data->uuid }}" /></td>
                <td>{{ $data->rtm->no_kk ?? '-' }}</td>
                <td>{{ $data->penduduk->nik ?? '-' }}</td>
                <td>{{ $data->penduduk->nama ?? '-' }}</td>
                <td>{{ $data->penduduk ? App\Enums\StatusDasarEnum::valueOf($data->penduduk->status_dasar) : '-' }}</td>
                <td>{{ $data->rtm_aktif }}</td>
                <td>{{ $data->rtm_sebelumnya }}</td>
                <td>{{ $data->jenis_pekerjaan }}</td>
                <td>{{ $data->tempat_kerja }}
                </td>
                <td>{{ $data->frekwensi_mengikuti_pelatihan_setahun }}</td>
                <td>{{ $data->jenis_pelatihan_diikuti_setahun }}</td>
                <td>{{ $data->tanggal_pengisian ? tgl_indo($data->tanggal_pengisian) : '-' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
