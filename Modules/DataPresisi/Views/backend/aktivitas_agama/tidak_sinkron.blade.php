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
            <th>Agama</th>
            <th>Frekwensi Mengikuti Kegiatan Keagamaan Dalam Setahun</th>
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
                <td>{{ $data->agama_id ? \App\Enums\AgamaEnum::valueOf($data->agama_id) : '-' }}</td>
                <td>{{ $data->frekwensi_mengikuti_kegiatan_setahun ? \Modules\DataPresisi\Enums\FrekwensiAktivitasKeagamaanEnum::valueOf($data->frekwensi_mengikuti_kegiatan_setahun) : '-' }}
                </td>
                <td>{{ $data->tanggal_pengisian ? tgl_indo($data->tanggal_pengisian) : '-' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
