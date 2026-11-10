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
            <th>Pendidikan Sedang Ditempuh</th>
            <th>Pendidikan Dalam KK</th>
            <th>Keikutsertaan KIP</th>
            <th>Pendidikan Kesetaraan</th>
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
                <td>{{ App\Enums\StatusDasarEnum::valueOf($data->penduduk->status_dasar ?? 1) }}</td>
                <td>{{ $data->rtm_aktif }}</td>
                <td>{{ $data->rtm_sebelumnya }}</td>
                <td>{{ $data->pendidikan_sedang_ditempuh ?? '-' }}</td>
                <td>{{ $data->pendidikan_dalam_kk ?? '-' }}</td>
                <td>{{ $data->keikutsertaan_kip ?? '-' }}</td>
                <td>{{ $data->jenis_pendidikan_kesetaraan_yg_diikuti ?? '-' }}</td>
                <td>{{ $data->tanggal_pengisian ? tgl_indo($data->tanggal_pengisian) : '-' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
