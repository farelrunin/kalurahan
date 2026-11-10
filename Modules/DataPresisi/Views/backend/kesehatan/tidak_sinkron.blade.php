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
            <th>Jenis Asuransi</th>
            <th>Alat Kontrasepsi</th>
            <th>Penyakit</th>
            <th>Frek. Kunjungan Faskes/Tahun</th>
            <th>Frek. Rawat Inap/Tahun</th>
            <th>Frek. Kunjungan Dokter/Tahun</th>
            <th>Kondisi Fisik</th>
            <th>Status Gizi Balita</th>
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
                <td>{{ $data->jns_ansuransi ?? '-' }}</td>
                <td>{{ $data->jns_penggunaan_alat_kontrasepsi ?? '-' }}</td>
                <td>{{ $data->jns_penyakit_diderita ?? '-' }}</td>
                <td>{{ $data->frekwensi_kunjungan_faskes_pertahun ?? '-' }}</td>
                <td>{{ $data->frekwensi_rawat_inap_pertahun ?? '-' }}</td>
                <td>{{ $data->frekwensi_kunjungan_dokter_pertahun ?? '-' }}</td>
                <td>{{ $data->kondisi_fisik_sejak_lahir ?? '-' }}</td>
                <td>{{ $data->status_gizi_balita ?? '-' }}</td>
                <td>{{ $data->tanggal_pengisian ? tgl_indo($data->tanggal_pengisian) : '-' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
