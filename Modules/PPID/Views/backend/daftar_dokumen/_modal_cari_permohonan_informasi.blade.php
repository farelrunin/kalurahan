<div class="modal fade" id="permohonan-informasi-modal" tabindex="-1" aria-labelledby="permohonan-informasi-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="permohonan-informasi-modalLabel">Data Permohonan Informasi</h5>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Permohonan Informasi</th>
                            <th>Status</th>
                            <th>Tindak Lanjut Pada</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function pilihPermohonanInformasi(uuid, permohonan_informasi) {
            $('#permohonan_informasi_uuid').val(uuid);
            $('#permohonan_informasi_nama').val(permohonan_informasi);
            $('#permohonan-informasi-modal').modal('hide');
        }
        $(document).ready(function() {
            $('#cari-permohonan-informasi').on('click', function() {
                let btn = $(this);
                btn.prop('disabled', true).text('Loading...');
                $.ajax({
                    url: '{{ ci_route('ppid.daftar-dokumen.cari-permohonan-informasi') }}',
                    type: 'POST',
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 'success') {
                            $('#permohonan-informasi-modal').find('tbody').empty();
                            response.data.forEach(function(item) {
                                $('#permohonan-informasi-modal').find('tbody').append(
                                    `<tr><td>${item.informasi_yang_dibutuhkan}</td><td>${item.status}</td><td>${item.tindak_lanjut_pada}</td><td><button class="btn btn-primary" onclick="pilihPermohonanInformasi('${item.uuid}', '${item.informasi_yang_dibutuhkan}')">Pilih</button></td></tr>`
                                );
                            });
                            if (response.data.length == 0) {
                                $('#permohonan-informasi-modal').find('tbody').append(`<tr><td colspan="4" class="text-center">Tidak ada data permohonan informasi dengan status diproses</td></tr>`);
                            }

                            $('#permohonan-informasi-modal').modal('show');
                        }
                        btn.prop('disabled', false).text('Cari');
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Error: ' + xhr.responseText,
                            showConfirmButton: false
                        });
                        btn.prop('disabled', false).text('Cari');
                    }
                });
            });
        });
    </script>
@endpush
