@include('admin.layouts.components.asset_datatables')
@include('admin.layouts.components.jquery_ui')

@extends('admin.layouts.index')

@section('title')
    <h1>
        Permohonan Informasi
    </h1>
@endsection

@section('breadcrumb')
    <li class="active">Permohonan Informasi</li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')
    @include('admin.layouts.components.konfirmasi_hapus')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <a href="#" data-tindak-lanjut="{{ Modules\PPID\Enums\TindakLanjutEnum::DITOLAK }}" title="Tolak Permohonan" onclick="deleteAllBox('mainform','{{ ci_route('ppid.permohonan-informasi.update-tindak-lanjut-all') . '/' . Modules\PPID\Enums\TindakLanjutEnum::DITOLAK }}')"
                        class="btn btn-social btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"
                    ><i class='fa fa-ban'></i> Tolak</a>

                    <a href="#" data-tindak-lanjut="{{ Modules\PPID\Enums\TindakLanjutEnum::DIPROSES }}" title="Proses Permohonan" onclick="deleteAllBox('mainform','{{ ci_route('ppid.permohonan-informasi.update-tindak-lanjut-all') . '/' . Modules\PPID\Enums\TindakLanjutEnum::DIPROSES }}')"
                        class="btn btn-social btn-primary btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"
                    ><i class='fa fa-arrow-right'></i> Proses</a>

                    <a href="#" data-tindak-lanjut="{{ Modules\PPID\Enums\TindakLanjutEnum::SELESAI }}" title="Permohonan Selesai" onclick="deleteAllBox('mainform','{{ ci_route('ppid.permohonan-informasi.update-tindak-lanjut-all') . '/' . Modules\PPID\Enums\TindakLanjutEnum::SELESAI }}')"
                        class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"
                    ><i class='fa fa-check'></i> Selesai</a>
                </div>
                <div class="box-body">
                    <div class="row mepet">
                        <div class="col-sm-2">
                            <select id="tindak_lanjut" class="form-control input-sm select2" name="tindak_lanjut">
                                <option value="">Semua</option>
                                @foreach ($tindak_lanjut_options as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
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
                                    <th class="">Telp/Email</th>
                                    <th class="">Pekerjaan</th>
                                    <th class="">Alamat</th>
                                    <th class="">Cara Memperoleh</th>
                                    <th class="">Cara Mendapatkan Salinan</th>
                                    <th class="">Tujuan Penggunaan</th>
                                    <th class="">Informasi yang Dibutuhkan</th>
                                </tr>
                            </thead>
                            <tbody id="dragable">
                            </tbody>
                        </table>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('ppid::backend.jenis_dokumen._form_modal')
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            const diproses = '{{ Modules\PPID\Enums\TindakLanjutEnum::DIPROSES }}';
            const ditolak = '{{ Modules\PPID\Enums\TindakLanjutEnum::DITOLAK }}';
            const selesai = '{{ Modules\PPID\Enums\TindakLanjutEnum::SELESAI }}';

            let TableData = $('#tabeldata').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ ci_route('ppid.permohonan-informasi.datatables') }}",
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
                        data: 'telp_email',
                        name: 'telp_email',
                        searchable: true,
                        orderable: true,
                    },
                    {
                        data: 'pekerjaan',
                        name: 'pekerjaan',
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
                        data: 'cara_memperoleh_informasi',
                        name: 'cara_memperoleh_informasi',
                        searchable: true,
                        orderable: true,
                    },
                    {
                        data: 'cara_mendapat_salinan_informasi',
                        name: 'cara_mendapat_salinan_informasi',
                        searchable: true,
                        orderable: true,
                    },
                    {
                        data: 'informasi_yang_dibutuhkan',
                        name: 'informasi_yang_dibutuhkan',
                        searchable: true,
                        orderable: true,
                    },
                    {
                        data: 'tujuan_penggunaan_informasi',
                        name: 'tujuan_penggunaan_informasi',
                        searchable: true,
                        orderable: true,
                    },
                ],
                order: [
                    [5, 'asc']
                ],
                createdRow: function(row, data, dataIndex) {
                    $(row).attr('data-id', data.uuid);
                }
            });

            if (hapus == 0) {
                TableData.column(1).visible(false);
            }

            if (ubah == 0) {
                TableData.column(0).visible(false);
                TableData.column(2).visible(false);
            }

            $('#tindak_lanjut').on('select2:select', function(e) {
                TableData.draw();
            });

            $(document).on('click', '.hapus-terpilih', function(e) {
                e.preventDefault();

                $('#confirm-delete #ok-delete').removeClass('btn-danger').removeClass('btn-primary').removeClass('btn-success');
                let tindak_lanjut = $(this).data('tindak-lanjut');
                if (tindak_lanjut == ditolak) {
                    $('#confirm-delete #ok-delete').html('<i class="fa fa-ban"></i> Tolak').addClass('btn-danger');
                    $('#confirm-delete .modal-body.btn-info').text('Apakah anda yakin ingin menolak permohonan ini?');
                } else if (tindak_lanjut == diproses) {
                    $('#confirm-delete #ok-delete').html('<i class="fa fa-arrow-right"></i> Proses').addClass('btn-primary');
                    $('#confirm-delete .modal-body.btn-info').text('Apakah anda yakin ingin memproses permohonan ini?');
                } else if (tindak_lanjut == selesai) {
                    $('#confirm-delete #ok-delete').html('<i class="fa fa-check"></i> Selesai').addClass('btn-success');
                    $('#confirm-delete .modal-body.btn-info').text('Apakah anda yakin ingin menyelesaikan permohonan ini?');
                }
            })

            // AJAX for lock and unlock
            $(document).on('click', '.process-btn, .reject-btn, .finish-btn', function(e) {
                e.preventDefault();
                let uuid = $(this).data('uuid');
                let tindak_lanjut = $(this).hasClass('process-btn') ? diproses : $(this).hasClass('reject-btn') ? ditolak : selesai;
                $.ajax({
                    url: "{{ ci_route('ppid.permohonan-informasi') }}/" + uuid,
                    type: 'PUT',
                    data: {
                        tindak_lanjut: tindak_lanjut
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
            });
        });
    </script>
@endpush
