<table class="table table-responsive">
    <thead>
        <tr>
            <th><input type="checkbox" id="checkall"></th>
            <th>No. RTM</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Tempat Keanggotaan Adat</th>
            <th>Status Keanggotaan</th>
            <th>Frekwensi kegiatan Adat yang diikuti</th>
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
                <td>{{ $lembaga->get($data->kelompok_id) ?? '' }}</td>
                <td>{{ Modules\DataPresisi\Enums\StatusKeanggotaanEnum::valueOf($data->status_keanggotaan) }}
                <td>{{ Modules\DataPresisi\Enums\FrekwensiAktivitasAdatEnum::valueOf($data->frekwensi_mengikuti_kegiatan_setahun) }}
                </td>
                <td>{{ tgl_indo($data->tanggal_pengisian) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
