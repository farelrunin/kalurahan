<table class="table table-responsive">
    <thead>
        <tr>
            <th><input type="checkbox" id="checkall"></th>
            <th>No. RTM</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Agama</th>
            <th>Frekwensi Mengikuti Kegiatan Keagamaan Dalam Setahun</th>
            <th>Tanggal<br>Pengisian</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataGanda as $data)
            <tr>
                <td><input type="checkbox" name="id_cb[]" value="{{ $data->uuid }}" /></td>
                <td>{{ $data->rtm->no_kk ?? '-' }}</td>
                <td>{{ $data->penduduk->nik ?? '-' }}</td>
                <td>{{ $data->penduduk->nama ?? '-' }}</td>
                <td>{{ $data->agama ? \App\Enums\AgamaEnum::valueOf($data->agama_id) : '-' }}</td>
                <td>{{ $data->frekwensi_mengikuti_kegiatan_setahun ? \Modules\DataPresisi\Enums\FrekwensiAktivitasKeagamaanEnum::valueOf($data->frekwensi_mengikuti_kegiatan_setahun) : '-' }}
                </td>
                <td>{{ $data->tanggal_pengisian ? tgl_indo($data->tanggal_pengisian) : '-' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
