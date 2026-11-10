@include('admin.layouts.components.asset_datatables')
@include('admin.layouts.components.jquery_ui')

@extends('admin.layouts.index')

@section('title')
    <h1>
        Permohonan Keberatan
    </h1>
@endsection

@section('breadcrumb')
    <li class="active">Permohonan Keberatan</li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')
    @include('admin.layouts.components.konfirmasi_hapus')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <a href="#" title="Tindak Lanjut Terpilih" class="btn btn-social btn-primary btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block tindak-lanjut-terpilih"><i class='fa fa-arrow-right'></i> Tindak Lanjut Terpilih</a>
                </div>
                <div class="box-body">
                    <div class="row mepet">
                        <div class="col-sm-2">
                            <select id="tindak_lanjut" class="form-control input-sm select2" name="tindak_lanjut">
                                <option value="">Semua</option>
                                <option value="0">Belum ada tindak lanjut</option>
                                <option value="1">Sudah ada tindak lanjut</option>
                            </select>
                        </div>
                    </div>
                    <hr class="batas">
                    {!! form_open(null, 'id="mainform" name="mainform"') !!}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover tabel-daftar" id="tabeldata">
                            <thead class="bg-gray">
                                <tr>
                                    <th class="padat"><input type="checkbox" id="checkall" /></th>
                                    <th class="padat">Aksi</th>
                                    <th class="">NIK</th>
                                    <th class="">Nama</th>
                                    <th class="padat">Tindak Lanjut</th>
                                    <th class="">Pekerjaan</th>
                                    <th class="">Telp/Email</th>
                                    <th class="">Alamat</th>
                                    <th class="">Alasan Keberatan</th>
                                    <th class="">Tujuan Penggunaan Informasi</th>
                                    <th class="" title="Kuasa Pemohon Nama">KP Nama</th>
                                    <th class="" title="Kuasa Pemohon Alamat">KP Alamat</th>
                                    <th class="" title="Kuasa Pemohon Pekerjaan">KP Pekerjaan</th>
                                    <th class="" title="Kuasa Pemohon Kasus Posisi">KP Kasus Posisi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            let TableData = $('#tabeldata').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ ci_route('ppid.permohonan-keberatan.datatables') }}",
                    data: function(req) {
                        req.tindak_lanjut = $('#tindak_lanjut').val();
                    }
                },
                columns: [{
                        data: 'ceklist',
                        class: 'padat',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'aksi',
                        class: 'aksi',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'nik',
                        name: 'nik',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'tindak_lanjut',
                        name: 'tindak_lanjut',
                        searchable: false,
                        orderable: false,
                        className: 'padat'
                    },
                    {
                        data: 'pekerjaan',
                        name: 'pekerjaan',
                        searchable: true,
                        orderable: true,
                    },
                    {
                        data: 'telp_email',
                        name: 'telp_email',
                        searchable: true,
                        orderable: true,
                    },
                    {
                        data: 'alamat',
                        name: 'alamat',
                        searchable: true,
                        orderable: true,
                    },
                    {
                        data: 'alasan_keberatan',
                        name: 'alasan_keberatan',
                        searchable: false,
                        orderable: false,
                    },
                    {
                        data: 'tujuan_penggunaan_informasi',
                        name: 'tujuan_penggunaan_informasi',
                        searchable: true,
                        orderable: true,
                    },
                    {
                        data: 'kuasa_nama',
                        name: 'kuasa_nama',
                        searchable: true,
                        orderable: true,
                    },
                    {
                        data: 'kuasa_alamat',
                        name: 'kuasa_alamat',
                        searchable: true,
                        orderable: true,
                    },
                    {
                        data: 'kuasa_pekerjaan',
                        name: 'kuasa_pekerjaan',
                        searchable: true,
                        orderable: true,
                    },
                    {
                        data: 'kuasa_kasus_posisi',
                        name: 'kuasa_kasus_posisi',
                        searchable: true,
                        orderable: true,
                    },
                ],
                order: [
                    [2, 'asc']
                ],
                createdRow: function(row, data, dataIndex) {
                    $(row).attr('data-id', data.uuid);
                }
            });

            $('#tindak_lanjut').on('select2:select', function(e) {
                TableData.draw();
            });

            $(document).on('click', '.tindak-lanjut-terpilih', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Masukkan tindak lanjut:',
                    input: 'text',
                    inputPlaceholder: 'Isi tindak lanjut...',
                    showCancelButton: true,
                    confirmButtonText: 'Simpan',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed && result.value) {
                        $('#mainform').attr('action', '{{ ci_route('ppid.permohonan-keberatan.update-tindak-lanjut-all') }}');
                        $('#mainform').append('<input type="hidden" name="tindak_lanjut" value="' + result.value + '">');
                        $('#mainform').submit();
                    }
                });
            })

            $(document).on('click', '.tindak-lanjut-btn', function(e) {
                e.preventDefault();
                let uuid = $(this).data('uuid');

                Swal.fire({
                    title: 'Masukkan tindak lanjut:',
                    input: 'text',
                    inputPlaceholder: 'Isi tindak lanjut...',
                    showCancelButton: true,
                    confirmButtonText: 'Simpan',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed && result.value) {
                        $.ajax({
                            url: "{{ ci_route('ppid.permohonan-keberatan') }}/" + uuid,
                            type: 'PUT',
                            data: {
                                tindak_lanjut: result.value
                            },
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil',
                                        text: response.message,
                                        timer: 2000,
                                    });
                                    TableData.draw(); // Refresh the table
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: response.message,
                                        timer: 2000,
                                    });
                                }
                            },
                            error: function(xhr) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Error: ' + xhr.responseText,
                                    timer: 2000,
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
