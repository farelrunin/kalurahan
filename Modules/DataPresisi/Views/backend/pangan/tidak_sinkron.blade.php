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
            <th>Jenis Lahan</th>
            <th>Luas Lahan</th>
            <th>Luas Tanam</th>
            <th>Status Lahan</th>
            <th>Komoditi Utama Tanaman Pangan </th>
            <th>Komoditi Tanaman Pangan Lainnya </th>
            <th>Jumlah Berdasarkan Jenis Komoditi </th>
            <th>Usia Komoditi </th>
            <th>Jenis Peternakan </th>
            <th>Jumlah Populasi </th>
            <th>Jenis Perikanan </th>
            <th>Frekwensi Makanan Perhari </th>
            <th>Frekwensi Konsumsi Sayur Perhari </th>
            <th>Frekwensi Konsumsi Buah Perhari </th>
            <th>Frekwensi Konsumsi Daging Perhari </th>
            <th>Tanggal<br>Pengisian</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataTidakSinkron as $data)
            <tr>
                <td><input type="checkbox" name="id_cb[]" value="{{ $data->uuid }}" /></td>
                <td>{{ $data->rtm->no_kk }}</td>
                <td>{{ $data->kepalaRumahTangga->nik }}</td>
                <td>{{ $data->kepalaRumahTangga->nama }}</td>
                <td>{{ App\Enums\StatusDasarEnum::valueOf($data->kepalaRumahTangga->status_dasar) }}</td>
                <td>{{ $data->rtm_aktif }}</td>
                <td>{{ $data->rtm_sebelumnya }}</td>
                <td>{{ $data->jenis_lahan }}</td>
                <td>{{ $data->luas_lahan }}</td>
                <td>{{ $data->luas_tanam }}</td>
                <td>{{ $data->status_lahan }}</td>
                <td>{{ $data->komoditi_utama_tanaman_pangan }}</td>
                <td>{{ $data->komoditi_tanaman_pangan_lainnya }}</td>
                <td>{{ $data->jumlah_berdasarkan_jenis_komoditi }}</td>
                <td>{{ $data->usia_komoditi }}</td>
                <td>{{ $data->jenis_peternakan }}</td>
                <td>{{ $data->jumlah_populasi }}</td>
                <td>{{ $data->jenis_perikanan }}</td>
                <td>{{ $data->Frekwensi_makanan_perhari }}</td>
                <td>{{ $data->Frekwensi_konsumsi_sayur_perhari }}</td>
                <td>{{ $data->Frekwensi_konsumsi_buah_perhari }}</td>
                <td>{{ $data->Frekwensi_konsumsi_daging_perhari }}</td>
                <td>{{ tgl_indo($data->tanggal_pengisian) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
