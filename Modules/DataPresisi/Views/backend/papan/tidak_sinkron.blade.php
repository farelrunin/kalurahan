<table class="table table-responsive">
    <thead>
        <tr>
            <th><input type="checkbox" id="checkall"></th>
            <th>No. RTM</th>
            <th>NIK Kepala RTM</th>
            <th>Nama Kepala RTM</th>
            <th>Status Dasar Kepala RTM</th>
            <th>No. RTM Tercatat di Presisi</th>
            <th>No. RTM Seharusnya</th>
            <th>Status Bangunan</th>
            <th>Luas Lantai</th>
            <th>Jenis Lantai</th>
            <th>Jenis Dinding</th>
            <th>Jenis Atap</th>
            <th>Sumber Air Bersih</th>
            <th>Sumber Penerangan</th>
            <th>Tanggal<br>Pengisian</th>
        </tr>
    </thead>
    <tbody>
        @php
            $regsosek = pilihanBagianTanpaNomor(\App\Enums\Dtks\Regsosek2022kEnum::pilihanBagian3());
        @endphp
        @foreach ($dataTidakSinkron as $data)
            <tr>
                <td><input type="checkbox" name="id_cb[]" value="{{ $data->uuid }}" /></td>
                <td>{{ $data->rtm->no_kk ?? '-' }}</td>
                <td>{{ $data->rtm->kepalaKeluarga->nik ?? '-' }}</td>
                <td>{{ $data->rtm->kepalaKeluarga->nama ?? '-' }}</td>
                <td>{{ App\Enums\StatusDasarEnum::valueOf($data->status_kepala ?? 1) }}</td>
                <td>{{ $data->rtm_aktif }}</td>
                <td>{{ $data->rtm_sebelumnya }}</td>
                <td>{{ $regsosek['301a'][$data->kd_stat_bangunan_tinggal] ?? '-' }}</td>
                <td>{{ $data->luas_lantai ?? '-' }}</td>
                <td>{{ $regsosek['303'][$data->kd_jenis_lantai_terluas] ?? '-' }}</td>
                <td>{{ $regsosek['304'][$data->kd_jenis_dinding] ?? '-' }}</td>
                <td>{{ $regsosek['305'][$data->kd_jenis_atap] ?? '-' }}</td>
                <td>{{ $regsosek['306a'][$data->kd_sumber_air_minum] ?? '-' }}</td>
                <td>{{ $regsosek['307a'][$data->kd_sumber_penerangan_utama] ?? '-' }}</td>
                <td>{{ $data->tanggal_pengisian ? tgl_indo($data->tanggal_pengisian) : '-' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
